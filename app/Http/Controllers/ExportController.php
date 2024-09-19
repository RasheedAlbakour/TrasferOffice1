<?php

namespace App\Http\Controllers;

use App\Exports\SentTransfersExport;
use App\Exports\ReceivedTransfersExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportSentTransfers($office)
    {
        return Excel::download(new SentTransfersExport($office), 'sent_transfers.xlsx');
    }

    public function exportReceivedTransfers($office)
    {
        return Excel::download(new ReceivedTransfersExport($office), 'received_transfers.xlsx');
    }
}
