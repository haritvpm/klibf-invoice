<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\InvoicesPerMonthSheet;


class InvoicesExport implements WithMultipleSheets
{
    use Exportable;

    public function __construct()
    {
       
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [ new InvoicesPerMonthSheet('All'), new InvoicesPerMonthSheet('MLA-Amount'), 
        new InvoicesPerMonthSheet('MLA-Publisher'), new InvoicesPerMonthSheet('Publisher-Amount') ];
       
        return $sheets;
    }
}