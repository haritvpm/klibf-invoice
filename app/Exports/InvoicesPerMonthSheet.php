<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\MemberFund;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\BookFest;

class InvoicesPerMonthSheet implements FromCollection, WithTitle, WithHeadings
{
    private $title;
    private $bookfest_id;
    public function __construct($bookfest_id, $title)
    {
        $this->title = $title;
        $this->bookfest_id = $bookfest_id;
    }

    /**
     * @return Builder
     */

    public function All($member_funds)
    {
        $report = [];

      
        foreach($member_funds as  $member_fund) {
         
            $inv_index = 0; 
         
            foreach($member_fund->memberFundInvoiceLists()->where('bookfest_id', $this->bookfest_id)->get() as $index => $invoiceList){
                
                foreach($invoiceList->invoiceListInvoiceItems()->get() as $invoice) {
                    $inv_index++;
                    $detail = array();
                    $detail['sl.'] = $inv_index;
                    $detail['mla'] = $member_fund->mla->name;
                    $detail['constituency'] = $member_fund->constituency->name;
                    $detail['govt school/college'] = $invoiceList->institution_type == 'gov_school' || $invoiceList->institution_type == 'gov_college' ? $invoiceList->institution_name : '' ;
                    $detail['aided school/college'] = $invoiceList->institution_type == 'aid_school' || $invoiceList->institution_type == 'aid_college' ? $invoiceList->institution_name : '' ;
                    $detail['library'] =  $invoiceList->institution_type == 'library' ? $invoiceList->institution_name : '' ;
                    $detail['publisher'] =  $invoice->publisher->name ;
                    $detail['bill_number'] =  $invoice->bill_number ;
                    $detail['bill_date'] =  $invoice->bill_date ;
                    $detail['gross'] =  $invoice->gross ;
                    $detail['discount'] =  $invoice->discount ;
                    $detail['amount'] =  $invoice->amount ;
                    $detail['discount_percent'] =  number_format(($invoice->discount * 100) / $invoice->gross,1);
                                                       
                    array_push($report,$detail ) ;

                }
            }

                                                                               
         

          }

       //   dd($report);
        return Collect($report);

    }
    public function MLAPublisher($member_funds)
    {
        $report = [];

      
        foreach($member_funds as  $member_fund) {
         
            $pub_amounts = array();
            
             foreach($member_fund->memberFundInvoiceLists()->where('bookfest_id', $this->bookfest_id)->get() as $index => $invoiceList){
                
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
                $detail['mla'] = $member_fund->mla->name;
                $detail['constituency'] = $member_fund->constituency->name;
                $detail['publisher'] =  $key ;
                $detail['amount'] =  $pub_amount;

                array_push($report,$detail ) ;

          }

        }

       //   dd($report);
        return Collect($report);

    }


    public function MLAAmount($member_funds)
    {
        $report = [];

           
        $mla_index = 0;
        foreach($member_funds as  $member_fund) {
         
            $mla_index++;
          
            $mla_amount = 0;
            foreach($member_fund->memberFundInvoiceLists()->where('bookfest_id', $this->bookfest_id)->get() as $index => $invoiceList){

             
                foreach($invoiceList->invoiceListInvoiceItems()->get() as $index => $invoice){
             
                    $mla_amount +=  $invoice->amount;
                 

                }
            }

            $detail = array();
          //  $detail['sl.'] = $mla_index ;
            $detail['mla'] = $member_fund->mla->name;
            $detail['constituency'] = $member_fund->constituency->name;
            $detail['sanctioned'] =  $member_fund->as_amount;
            $detail['amount'] = $mla_amount ;
            array_push($report,$detail ) ;

          }

       //   dd($report);
        return Collect($report);

    }

    public function PublisherAmount($member_funds)
    {
        $report = [];
        
        $pub_amounts = array();
        $pub_gross = array();
        $pub_discount = array();

        foreach($member_funds as  $member_fund) {
         
                        
             foreach($member_fund->memberFundInvoiceLists()->where('bookfest_id', $this->bookfest_id)->get() as $index => $invoiceList){
                
                foreach($invoiceList->invoiceListInvoiceItems()->get() as $index => $invoice){
              
                    if(array_key_exists( $invoice->publisher->name,$pub_amounts)){
                        $pub_amounts[ $invoice->publisher->name] += $invoice->amount;
                        $pub_gross[ $invoice->publisher->name] += $invoice->gross;
                        $pub_discount[ $invoice->publisher->name] += $invoice->discount;
                    } else {
                        $pub_amounts[ $invoice->publisher->name] =  $invoice->amount;
                        $pub_gross[ $invoice->publisher->name] = $invoice->gross;
                        $pub_discount[ $invoice->publisher->name] = $invoice->discount;
                    }
            
                }
                
            }
        }

        
        $index = 1;
        foreach($pub_amounts as $key => $pub_amount){
            
         //   $detail['sl.'] = $index++;
            $detail['publisher'] =  $key ;
            $detail['gross'] =  $pub_gross[$key];
            $detail['discount'] =  $pub_discount[$key];
            $detail['amount'] =  $pub_amount;

            array_push($report,$detail ) ;

      }

       //   dd($report);
        return Collect($report);

    }


    public function collection()
    {
        $bookfest_id = $this->bookfest_id;

        $member_funds = MemberFund::with(['memberFundInvoiceLists', 'memberFundInvoiceLists.invoiceListInvoiceItems'])
                ->wherehas('memberFundInvoiceLists', function($q) use ($bookfest_id) {
                    $q->where('bookfest_id',  $bookfest_id  );
                })
                ->get()->filter(function ($value) {
                    return $value->memberFundInvoiceLists()->count() > 0;
                });

            
        if($this->title == 'MLA-Amount') return $this->MLAAmount($member_funds);
        if($this->title == 'MLA-Publisher') return $this->MLAPublisher($member_funds);
        if($this->title == 'Publisher-Amount') return $this->PublisherAmount($member_funds);
        
        return$this->All($member_funds);
    }

    public function headings(): array
    {
        if($this->title == 'MLA-Amount')
            return [ "MLA", "Constituency", 'Sanctioned', 'Amount'];

        if($this->title == 'MLA-Publisher')  
            return ["Sl.No.", "MLA", "Constituency", 'Publisher', 'Amount'];

        if($this->title == 'Publisher-Amount')  
            return [ 'Publisher', 'Gross' , 'Discount', 'Amount'];
        
     
        return ["Sl.No.", "MLA", "Constituency",'Govt school/college', 'Aided school/college', 'Library', 'Publisher', 'Bill No.', 'Bill Date','Gross' , 'Discount', 'Amount', 'DiscountPercent'];
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }
}