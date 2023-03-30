<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\InvoicesPerMonthSheet;


class InvoicesExport implements WithMultipleSheets
{
    use Exportable;

    protected $bookfest_id;
    protected $memberFundId;
    
    public function __construct($bookfest_id,  $memberFundId)
    {
        $this->bookfest_id = $bookfest_id;
        $this->memberFundId = $memberFundId;

    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [ new InvoicesPerMonthSheet($this->bookfest_id, $this->memberFundId,'All'),
                    new InvoicesPerMonthSheet($this->bookfest_id, $this->memberFundId,'MLA-Amount'), 
                    new InvoicesPerMonthSheet($this->bookfest_id, $this->memberFundId,'MLA-Publisher'),
                    new InvoicesPerMonthSheet($this->bookfest_id, $this->memberFundId,'Publisher-Amount') ];
                
        return $sheets;
    }
}