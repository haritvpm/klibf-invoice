<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithTitle;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\BookFest;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\SaleItem;
use App\Models\Sale;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class StallsExportSheetForInvoice implements FromCollection, WithTitle, WithHeadings, ShouldAutoSize
{
    private $title;
    private $bookfest_id;
    private $products;
   
    public function __construct($bookfest_id, $products, $title)
    {
        $this->title = $title;
        $this->bookfest_id = $bookfest_id;
        $this->products = $products;
       

    }

  

    public function All($sales)
    {
        $report = [];

          
        $index = 0;
        foreach($sales as $index => $sale) {
         
         
            $detail = array();
            $detail['sl.'] = $index+1 ;
           // return ["Publisher", "Product", "HSN","Quantity", 'PricePerUnit', 'CGST', 'SGST', 'InvoiceNumber', 'InvoiceDate', 'Amount'];
            $detail['Publisher'] = $sale->publisher->name ;

            $product = '';
            $hsn = '';
            $quantity = '';
            $price = '';
            $tax_cgst = '';
            $tax_sgst = '';
            $total = '';
            
            foreach($sale->invoiceNumberSaleItemsNonZero as $i =>  $stall){
                $product = $product . ($i+1) . '. ' . $stall->product->name . PHP_EOL ;
                $hsn = $hsn . $stall->product->hsn . "\r\n";
                $quantity = $quantity . $stall->quantity . "\r\n";
                $price = $price . $stall->product->price . "\r\n";
                $tax_cgsta = ($stall->quantity*$stall->product->price*$stall->product->taxpercent_cgst)/100 ;
                $tax_sgsta =($stall->quantity*$stall->product->price*$stall->product->taxpercent_sgst)/100 ;

                $tax_cgst = $tax_cgst .  $tax_cgsta . "\r\n";
                $tax_sgst = $tax_sgst .   $tax_sgsta . "\r\n";
                $total = $total . $stall->quantity*$stall->product->price +  $tax_sgsta +  $tax_cgsta. "\r\n";

            }
          
       
           $detail['product'] = $product;
           $detail['hsn'] = $hsn;
           $detail['Quantity'] = $quantity;
           $detail['PricePerUnit'] =$price;
         
           $detail['CGST'] = $tax_cgst;
           $detail['SGST'] = $tax_sgst;
           $detail['total'] =  $total;
           $detail['InvoiceNumber'] =$sale->invoice_number;
           $detail['InvoiceDate'] =$sale->invoice_date;
          
           $totalamountwithouttax = $stall->quantity * $stall->product->price;
           $totaltax_cgst = ($stall->quantity * $stall->product->price * $stall->product->taxpercent_cgst)/100;
           $totaltax_sgst = ($stall->quantity * $stall->product->price * $stall->product->taxpercent_sgst)/100;
           $totaltax = $totaltax_cgst + $totaltax_sgst;

           $detail['totalamountwithouttax'] = $totalamountwithouttax   ;
           $detail['totaltax'] = $totaltax ;
           $detail['TotalAmount'] = $totalamountwithouttax + $totaltax  ;
           $detail['TotalAmount(Words)'] = $totalamountwithouttax + $totaltax  ;


           array_push($report, $detail ) ;
        

          }

       //   dd($report);
        return Collect($report);

    }

   

    public function collection()
    {
        $bookfest_id = $this->bookfest_id;

        $sales = Sale::with(['bookfest', 'publisher', 'invoiceNumberSaleItemsNonZero'])->get();
     
        return $this->All($sales);
    }

    public function headings(): array
    {
      
        return ["Sl.", "Publisher", "Product", "HSN","Quantity", 'PricePerUnit', 'CGST', 'SGST','Total', 'InvoiceNumber', 'InvoiceDate', 'TotalTaxableAmount','TotalTax', 'TotalAmount','TotalAmount(Words)' ];
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }
}