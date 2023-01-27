<?php

namespace App\Http\Controllers\Frontend;
// use App\Models\BookFest;
use App\Http\Controllers\Controller;
use App\Models\BookFest;
use App\Models\MemberFund;
use App\Models\User;
use DB;


class HomeController extends Controller
{
    public function index()
    {
        
        $bookfest = BookFest::where('status', 'active')->latest()->first();
      
        $memberFunds = MemberFund::with(['bookfest', 'constituency', 'memberFundInvoiceLists'])
                        ->where('bookfest_id', $bookfest->id)
                        ->orderby('constituency_id')
                        ->get();
        
        //$constituencies = $memberFunds->pluck('constituency.name');
        $constituencies = [];

        $billcount = [];

        $constituency_user = DB::table('constituency_user')->get();
        $cons_to_user = $constituency_user->pluck('user_id', 'constituency_id');
        $users = User::wherein( 'id', $constituency_user->pluck('user_id'))->get()->pluck( 'name', 'id' );
        //dd($users);

        $memberFunds->transform(function ($memberFund, $key) use (&$billcount, &$constituencies,$users,$cons_to_user){
                   
            $total = 0;
            $bill_count_for_constituency = 0;
            foreach ($memberFund->memberFundInvoiceLists as $key => $invoicelist) {
               
                $total += $invoicelist->invoiceListInvoiceItems->sum( 'amount');

                $bill_count_for_constituency += $invoicelist->invoiceListInvoiceItems->count();
            }
            
           array_push($billcount, $bill_count_for_constituency) ;
           
           
           $user_id = $cons_to_user->get( $memberFund->constituency->id );
           $username = $users->get($user_id);
           array_push($constituencies, $memberFund->constituency->name  . ' - ' .  $username  ) ;
           
     
            return  $total ;
        } );
        
       
     
       

        return view('frontend.home', compact('constituencies', 'memberFunds' , 'billcount'));
    }
}
