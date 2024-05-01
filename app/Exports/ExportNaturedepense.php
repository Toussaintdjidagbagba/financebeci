<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportNaturedepense implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(){
        return session('exportlbg');
    }
    public function  headings():array{
        return [
            "Code",
            "Description",
            "Compte Syshoada",
            "Commentaire",
            "Observations",
        ];
    }
}