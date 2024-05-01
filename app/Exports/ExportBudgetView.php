<?php

namespace App\Exports;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Budgetgeneral;

class ExportBudgetView implements FromView
{
    public function view(): View
    {
        return view('viewadmindste.export.expbudget', [
            'mode' => session('expbudgetmode'),
            'periode' => session('expbudgetperiode'),
            'list' => session('expbudgetlist')
        ]);
    }
}