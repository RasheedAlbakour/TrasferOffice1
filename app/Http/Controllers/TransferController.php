<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Models\Office;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exports\AllTransfersExport;
use Maatwebsite\Excel\Facades\Excel;

use Spatie\Permission\Models\Permission;

class TransferController extends Controller
{
    
    public function exportAllTransfers()
    {
        return Excel::download(new AllTransfersExport(), 'all_transfers.xlsx');
    }

    
    public function index()
    {
        $transfers = Transfer::with('sender', 'receiver')->get();

        return view('transfers.index', compact('transfers'));
    }

    
    public function create(Request $request)
    {
        $officeId = $request->input('office_id');
        $offices = Office::all();

        return view('transfers.create', compact('offices', 'officeId'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|exists:offices,id',
            'receiver_id' => 'required|exists:offices,id',
            'amount' => 'required|numeric|min:0.01',
            'transfer_date' => 'required|date',
            'person_receiving' => 'required|string',
        ]);

        // استرجاع مكتب المرسل والمكتب المستقبل
        $sender = Office::findOrFail($request->input('sender_id'));
        $receiver = Office::findOrFail($request->input('receiver_id'));

        // التحقق مما إذا كان لدى المرسل رصيد كافٍ للحوالة
        if ($sender->current_balance >= $request->input('amount')) {
            // خصم 5٪ من مبلغ الحوالة
            $discountedAmount = $request->input('amount') * 0.95;

            // خصم المبلغ من رصيد المرسل
            $sender->decrement('current_balance', $discountedAmount);

            // إنشاء سجل الحوالة بحالة "قيد الانتظار" ورمز الحوالة
            $transfer = Transfer::create([
                'sender_id' => $request->input('sender_id'),
                'receiver_id' => $request->input('receiver_id'),
                'amount' => $discountedAmount,
                'transfer_date' => $request->input('transfer_date'),
                'person_receiving' => $request->input('person_receiving'),
                'status' => 'pending',
                'transfer_code' => 'TR-' . uniqid(), // إنشاء رمز فريد للحوالة
            ]);

            // إعادة توجيه الى صفحة مكتب المرسل مع رسالة نجاح
            return redirect()->route('offices.show', $sender->id)
                ->with('success', 'تمت عملية الحوالة بنجاح.');
        } else {
            // إعادة توجيه الى صفحة مكتب المرسل مع رسالة خطأ
            return redirect()->route('offices.show', $sender->id)
                ->with('danger', 'رصيد المكتب ' . $sender->name . ' غير كافٍ لتنفيذ عملية الحوالة.');
        }
    }

    /**
     * وضع علامة على الحوالة كمستلمة.
     */
    public function markReceived(Request $request, Transfer $transfer)
    {
        $this->authorize('transfer-delete', $transfer);

        $request->validate([
            'transfer_code' => 'required|string', 
        ]);

        // القيام بتحديث الحوالة داخل معاملة
        DB::transaction(function () use ($transfer, $request) {
            // التحقق مما إذا كانت حالة الحوالة لا تزال "قيد الانتظار" ورمز الحوالة صحيح
            if ($transfer->status === 'pending' && $transfer->transfer_code === $request->input('transfer_code')) {
                // إضافة المبلغ إلى رصيد المستقبل
                $transfer->receiver->increment('current_balance', $transfer->amount);

                // تحديث حالة الحوالة إلى "تم الاستلام"
                $transfer->status = 'received';
                $transfer->save();
            } else {
                
                return redirect()->back()->with('error', 'تحقق من رقم الحوالة وحالتها قبل التأكيد.');
            }
        });

        // إعادة التوجيه إلى صفحة حوالات مكتب المستخدم مع رسالة نجاح
        return redirect()->route('offices.transfers', ['office' => Auth::user()->HisOffice->id])
            ->with('success', 'تم تحديث حالة الحوالة إلى "تم الاستلام".');
    }

   
    public function show(Transfer $transfer)
    {
        $this->authorize('transfer-show');

        return view('transfers.show', compact('transfer'));
    }

  
    public function edit(Transfer $transfer)
    {
        $this->authorize('transfer-edit');

        return view('transfers.edit', compact('transfer'));
    }

   
    public function update(Request $request, Transfer $transfer)
    {
        $this->authorize('transfer-edit');

        $request->validate([
            'sender_id' => 'required|exists:offices,id',
            'receiver_id' => 'required|exists:offices,id',
            'amount' => 'required|numeric',
            'transfer_date' => 'required|date',
        ]);

        $transfer->update($request->all());

        return redirect()->route('transfers.index')
            ->with('success', 'تم تحديث الحوالة بنجاح.');
    }

   
    public function destroy(Transfer $transfer)
    {
        $this->authorize('transfer-delete');

        $sender = $transfer->sender;
        $amount = $transfer->amount;

        DB::transaction(function () use ($sender, $amount, $transfer) {
            // إعادة المبلغ إلى رصيد المرسل
            $sender->increment('current_balance', $amount);

            
            $transfer->delete();
        });

        return redirect()->route('offices.show', ['office' => Auth::user()->HisOffice->id])
            ->with('success', 'تم حذف الحوالة واسترجاع الرصيد بنجاح.');
    }
}
