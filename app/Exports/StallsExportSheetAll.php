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


class StallsExportSheetAll implements FromCollection, WithTitle, WithHeadings, ShouldAutoSize
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

          
    

        foreach($sales as $sl => $sale) {
         
            $detail = array();
            $detail['sl.'] =  $sl+1;           
            $detail['Publisher'] = $sale->publisher->name ;
        
            $product = '';

            $totalamountwithouttax =0;
            $totaltax =0;

            foreach($sale->invoiceNumberSaleItems as $index => $stall){
                $detail['Product'.$index] = $stall->quantity;
            }
            foreach($sale->invoiceNumberSaleItems as $index => $stall){
                $tax_cgst = ($stall->product->price * $stall->product->taxpercent_cgst)/100;
                $tax_sgst = ($stall->product->price * $stall->product->taxpercent_sgst)/100;
                $detail['Price'.$index] = $stall->product->price + $tax_cgst + $tax_sgst;

              
     
            }

            foreach($sale->invoiceNumberSaleItems as $index => $stall){
                $amount = $stall->quantity * $stall->product->price;
                $tax_cgst = ($stall->quantity * $stall->product->price * $stall->product->taxpercent_cgst)/100;
                $tax_sgst = ($stall->quantity * $stall->product->price * $stall->product->taxpercent_sgst)/100;
                $tax =  $tax_cgst + $tax_sgst;
                $detail['Amount'.$index] = $amount + $tax;

                $totalamountwithouttax +=  $amount;
                $totaltax +=  $tax;
            }

        
           $detail['Amount'] = $totalamountwithouttax + $totaltax  ;


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
        $headings  = ["Sl.", "Publisher"];
        foreach($this->products as  $p){
            $headings[]  = $p->name;
        }
        foreach($this->products as  $p){
            $headings[]  = 'Price-'.$p->name;
        }
        foreach($this->products as  $p){
            $headings[]  = 'Amount-'.$p->name;
        }
        $headings[]  = 'Total';

        return $headings;
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }
}