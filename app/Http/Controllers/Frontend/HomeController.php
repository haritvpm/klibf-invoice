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

                      
        $memberFunds->transform(function ($memberFund, $key) {
            $total = 0;
           
            foreach ($memberFund->memberFundInvoiceLists as $key => $invoicelist) {
               
                $total += $invoicelist->invoiceListInvoiceItems->sum( 'amount');
            }
          
            return  $total;
        } );
        
       
     

        return view('frontend.home', compact('constituencies', 'memberFunds'));
    }
}
