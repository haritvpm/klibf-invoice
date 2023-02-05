<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\StallsExportSheetAll;
use App\Exports\StallsExportSheetForInvoice;


class StallsExport implements WithMultipleSheets
{
    use Exportable;

    protected $bookfest_id;
    protected $products;
    public function __construct($bookfest_id, $products)
    {
        $this->bookfest_id = $bookfest_id;
        $this->products = $products;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [ new StallsExportSheetAll($this->bookfest_id,$this->products, 'All'),
                    new StallsExportSheetForInvoice($this->bookfest_id,$this->products, 'Invoice'),
                 
                 ];
                
        return $sheets;
    }
}