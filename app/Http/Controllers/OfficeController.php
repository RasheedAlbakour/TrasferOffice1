<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use App\Models\Office;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    
    public function index()
    {
        $offices = Office::all();

        return view('offices.index', compact('offices'));
    }

    public function create()
    {
        $users = User::where('roles_name', 'owner')->doesntHave('HisOffice')->get();

        return view('offices.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'current_balance' => 'required|numeric',
        ]);

        Office::create($request->all());

        return redirect()->route('offices.index')
            ->with('success', 'تم إنشاء المكتب بنجاح.');
    }

    public function show(Office $office)
    {
        $user = Auth::user();

        if ($user->hasRole('owner') && $user->HisOffice()->exists() && $user->HisOffice->id == $office->id) {
            return view('offices.show', compact('office'));
        }

        return redirect('/')->with('error', 'ليس لديك صلاحية الوصول إلى هذه الصفحة');
    }

    public function edit(Office $office)
    {
        return view('offices.edit', compact('office'));
    }

    public function update(Request $request, Office $office)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $office->update($request->all());

        return redirect()->route('offices.index')
            ->with('success', 'تم تحديث المكتب بنجاح.');
    }

    public function destroy(Office $office)
    {
        $office->delete();

        return redirect()->route('offices.index')
            ->with('success', 'تم حذف المكتب بنجاح.');
    }

    public function showTransfers(Office $office)
    {
        if (Auth::user()->HisOffice->id !== $office->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('offices.transfers', compact('office'));
    }
}
