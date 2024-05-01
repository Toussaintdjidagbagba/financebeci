<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportErrorNaturedepense implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(){
        return session('errorlbg');
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