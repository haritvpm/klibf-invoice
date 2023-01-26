<?php

namespace App\Http\Controllers\Frontend;
// use App\Models\BookFest;
use App\Http\Controllers\Controller;
use App\Models\BookFest;
use App\Models\MemberFund;

class HomeController extends Controller
{
    public function index()
    {
        
        $bookfest = BookFest::where('status', 'active')->latest()->first();
      
        $memberFunds = MemberFund::with(['bookfest', 'constituency', 'memberFundInvoiceLists'])
                        ->where('bookfest_id', $bookfest->id)
                        ->orderby('constituency_id')
                        ->get();
        
        $constituencies = $memberFunds->pluck('constituency.name');

        $billcount = [];
        $memberFunds->transform(function ($memberFund, $key) use (&$billcount){
            $total = 0;
            $bill_count_for_constituency = 0;
            foreach ($memberFund->memberFundInvoiceLists as $key => $invoicelist) {
               
                $total += $invoicelist->invoiceListInvoiceItems->sum( 'amount');

                $bill_count_for_constituency += $invoicelist->invoiceListInvoiceItems->count();
            }
            array_push($billcount, $bill_count_for_constituency) ;
            return  $total ;
        } );
        
       
     

        return view('frontend.home', compact('constituencies', 'memberFunds' , 'billcount'));
    }
}
