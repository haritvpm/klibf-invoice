<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;

class MembersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $members = Member::with(['memberInvoiceLists', 'memberInvoiceLists.invoiceListInvoiceItems'])
                ->get()->filter(function ($value) {
                    return $value->memberInvoiceLists()->count() > 0;
                });

        $report = [];
        $mla_index = 0;
        foreach($members as  $member) {
         
            $mla_index++;
            $mla_amount = 0;
            foreach($member->memberInvoiceLists()->get() as $index => $invoiceList){

                foreach($invoiceList->invoiceListInvoiceItems()->get() as $index => $invoice){
                //  dd($invoiceList);
                    $detail = array();
                    $detail['sl.'] = $index;
                    $detail['mla'] = $member->name;
                    $detail['constituency'] = $member->constituency;
                    $detail['school/college'] =  $invoiceList->institution_type == 'school' ||  $invoiceList->institution_type == 'college' ? $invoiceList->institution_name : '' ;
                    $detail['library'] =  $invoiceList->institution_type == 'library' ? $invoiceList->institution_name : '' ;
                    $detail['publisher'] =  $invoice->publisher->name ;
                    $detail['bill_number'] =  $invoice->bill_number ;
                    $detail['bill_date'] =  $invoice->bill_date ;
                    $detail['amount'] =  $invoice->amount ;

                    $mla_amount +=  $invoice->amount;
                                                        
                    array_push($report,$detail ) ;

                }
            }

            $detail = array();
            $detail['sl.'] = '(' . $mla_index . ')';
            $detail['mla'] = $member->name;
            $detail['constituency'] = $member->constituency;
            $detail['school/college'] = '';
            $detail['library'] =  '';
            $detail['publisher'] =  '';
            $detail['bill_number'] =  '';
            $detail['bill_date'] =  '';
            $detail['amount'] = number_format($mla_amount) ;
                                                                    
            array_push($report,$detail ) ;

          }

       //   dd($report);
        return Collect($report);
    }
}
