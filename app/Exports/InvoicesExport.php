<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\InvoicesPerMonthSheet;


class InvoicesExport implements WithMultipleSheets
{
    use Exportable;

    protected $bookfest_id;
    
    public function __construct($bookfest_id)
    {
        $this->bookfest_id = $bookfest_id;

    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [ new InvoicesPerMonthSheet($this->bookfest_id, 'All'),
                    new InvoicesPerMonthSheet($this->bookfest_id, 'MLA-Amount'), 
                    new InvoicesPerMonthSheet($this->bookfest_id,'MLA-Publisher'),
                    new InvoicesPerMonthSheet($this->bookfest_id,'Publisher-Amount') ];
                
        return $sheets;
    }
}