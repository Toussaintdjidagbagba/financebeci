<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportForExemplaireBudgetAnterieur implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(){
        return session('eforbg');
    }
    public function  headings():array{
        return [
            "Code",
            "NATURE DE DEPENSES",
            "MONTANT",
        ];
    }
}