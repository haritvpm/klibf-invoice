<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvoicesPerMonthSheet implements FromCollection, WithTitle, WithHeadings
{
    private $title;
 
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @return Builder
     */

    public function All($members)
    {
        $report = [];

      
        foreach($members as  $member) {
         
            $inv_index = 0; 
         
            foreach($member->memberInvoiceLists()->get() as $index => $invoiceList){
                
                foreach($invoiceList->invoiceListInvoiceItems()->get() as $invoice) {
                    $inv_index++;
                    $detail = array();
                    $detail['sl.'] = $inv_index;
                    $detail['mla'] = $member->name;
                    $detail['constituency'] = $member->constituency;
                    $detail['school/college'] =  $invoiceList->institution_type == 'school' ||  $invoiceList->institution_type == 'college' ? $invoiceList->institution_name : '' ;
                    $detail['library'] =  $invoiceList->institution_type == 'library' ? $invoiceList->institution_name : '' ;
                    $detail['publisher'] =  $invoice->publisher->name ;
                    $detail['bill_number'] =  $invoice->bill_number ;
                    $detail['bill_date'] =  $invoice->bill_date ;
                    $detail['amount'] =  $invoice->amount ;
                                                       
                    array_push($report,$detail ) ;

                }
            }

                                                                               
         

          }

       //   dd($report);
        return Collect($report);

    }
    public function MLAPublisher($members)
    {
        $report = [];

      
        foreach($members as  $member) {
         
            $pub_amounts = array();
            
             foreach($member->memberInvoiceLists()->get() as $index => $invoiceList){
                
                foreach($invoiceList->invoiceListInvoiceItems()->get() as $index => $invoice){
              
                    if(array_key_exists( $invoice->publisher->name,$pub_amounts)){
                        $pub_amounts[ $invoice->publisher->name] += $invoice->amount;
                    } else {
                        $pub_amounts[ $invoice->publisher->name] =  $invoice->amount;
                    }
            
                }
                
            }

            $index = 1;
            foreach($pub_amounts as $key => $pub_amount){
                
                $detail['sl.'] = $index++;
                $detail['mla'] = $member->name;
                $detail['constituency'] = $member->constituency;
                $detail['publisher'] =  $key ;
                $detail['amount'] =  $pub_amount;

                array_push($report,$detail ) ;

          }

        }

       //   dd($report);
        return Collect($report);

    }


    public function MLAAmount($members)
    {
        $report = [];

           
        $mla_index = 0;
        foreach($members as  $member) {
         
            $mla_index++;
            $mla_amount = 0;
            foreach($member->memberInvoiceLists()->get() as $index => $invoiceList){

                foreach($invoiceList->invoiceListInvoiceItems()->get() as $index => $invoice){
             
                    $mla_amount +=  $invoice->amount;
                 

                }
            }

            $detail = array();
          //  $detail['sl.'] = $mla_index ;
            $detail['mla'] = $member->name;
            $detail['constituency'] = $member->constituency;
            $detail['amount'] = $mla_amount ;
            array_push($report,$detail ) ;

          }

       //   dd($report);
        return Collect($report);

    }

    public function PublisherAmount($members)
    {
        $report = [];
        
        $pub_amounts = array();

        foreach($members as  $member) {
         
                        
             foreach($member->memberInvoiceLists()->get() as $index => $invoiceList){
                
                foreach($invoiceList->invoiceListInvoiceItems()->get() as $index => $invoice){
              
                    if(array_key_exists( $invoice->publisher->name,$pub_amounts)){
                        $pub_amounts[ $invoice->publisher->name] += $invoice->amount;
                    } else {
                        $pub_amounts[ $invoice->publisher->name] =  $invoice->amount;
                    }
            
                }
                
            }
        }

        
        $index = 1;
        foreach($pub_amounts as $key => $pub_amount){
            
         //   $detail['sl.'] = $index++;
            $detail['publisher'] =  $key ;
            $detail['amount'] =  $pub_amount;

            array_push($report,$detail ) ;

      }

       //   dd($report);
        return Collect($report);

    }


    public function collection()
    {
        $members = Member::with(['memberInvoiceLists', 'memberInvoiceLists.invoiceListInvoiceItems'])
                ->get()->filter(function ($value) {
                    return $value->memberInvoiceLists()->count() > 0;
                });

            
        if($this->title == 'MLA-Amount') return $this->MLAAmount($members);
        if($this->title == 'MLA-Publisher') return $this->MLAPublisher($members);
        if($this->title == 'Publisher-Amount') return $this->PublisherAmount($members);
        
        return$this->All($members);
    }

    public function headings(): array
    {
        if($this->title == 'MLA-Amount')
            return [ "MLA", "Constituency", 'Amount'];

        if($this->title == 'MLA-Publisher')  
            return ["Sl.No.", "MLA", "Constituency", 'Publisher', 'Amount'];

        if($this->title == 'Publisher-Amount')  
            return [ 'Publisher',  'Amount'];
        
     
        return ["Sl.No.", "MLA", "Constituency",'School/College',  'Library', 'Publisher', 'Bill No.', 'Bill Date', 'Amount'];
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }
}