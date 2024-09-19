<?php

namespace App\Exports;

use App\Models\Transfer;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReceivedTransfersExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    protected $office;

    public function __construct($office)
    {
        $this->office = $office;
    }

    public function query()
    {
        return Transfer::query()->where('receiver_id', $this->office);
    }

    public function headings(): array
    {
        return [
            'رقم الحوالة',
            'المكتب المرسل',
            'المكتب المستقبل',
            'المبلغ',
            'تاريخ التحويل',
            'الشخص المستلم',
        ];
    }

    public function map($transfer): array
    {
        return [
            $transfer->id,
            $transfer->sender->name,
            $transfer->receiver->name,
            $transfer->amount,
            $transfer->transfer_date,
            $transfer->person_receiving,
        ];
    }
}
