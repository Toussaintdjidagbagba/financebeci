<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ErrorExportForExemplaireBudget implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(){
        return session('erroreforbg');
    }
    public function  headings():array{
        return [
            "Code",
            "NATURE DE DEPENSES",
            "Montant",
        ];
    }
}