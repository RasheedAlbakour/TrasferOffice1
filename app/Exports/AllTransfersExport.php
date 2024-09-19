<?php

namespace App\Exports;

use App\Models\Transfer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AllTransfersExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    public function collection()
    {
        return Transfer::all();
    }

    public function headings(): array
    {
        return [
            'رقم الحوالة',
            'المكتب المرسل',
            'المكتب المستقبل',
            'الشخص المستلم',
            'الحالة',
            'المبلغ',
            'تاريخ التحويل',
        ];
    }

    public function map($transfer): array
    {
        return [
            $transfer->id,
            $transfer->sender->name,
            $transfer->receiver->name,
            $transfer->person_receiving,
            $transfer->status,
            $transfer->amount,
            $transfer->transfer_date,
        ];
    }
}
