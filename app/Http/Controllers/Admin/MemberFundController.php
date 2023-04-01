<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMemberFundRequest;
use App\Http\Requests\StoreMemberFundRequest;
use App\Http\Requests\UpdateMemberFundRequest;
use App\Models\BookFest;
use App\Models\Constituency;
use App\Models\MemberFund;
use App\Models\Mla;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;


class MemberFundController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('member_fund_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookfest = BookFest::where('status', 'active')->latest()->first();

        $memberFunds = MemberFund::with(['bookfest', 'constituency', 'mla'])
                ->where('bookfest_id',$bookfest?->id )
                ->get();

    $curyear = Carbon::now();
    $lastyear = Carbon::now()->subYear();
    $nextyear = Carbon::now()->addYear();
    $lastlastyear = Carbon::now()->subYears(2);

    $finyears = [];
    $finyears[] = $lastyear->format('Y') . '-' .$curyear->format('y');
    $finyears[] = $lastlastyear->format('Y') . '-' .$lastyear->format('y');
    $finyears[] = $curyear->format('Y') . '-' .$nextyear->format('y');

        return view('admin.memberFunds.index', compact('memberFunds','finyears'));
    }

    public function create()
    {
        abort_if(Gate::denies('member_fund_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookfests = BookFest::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $constituencies = Constituency::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mlas = Mla::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $curyear = Carbon::now();
        $lastyear = Carbon::now()->subYear();
        $nextyear = Carbon::now()->addYear();
       
        $finyears = [];
        $finyears[] = $lastyear->format('Y') . '-' .$curyear->format('y');
        $finyears[] = $curyear->format('Y') . '-' .$nextyear->format('y');
      

        return view('admin.memberFunds.create', compact('bookfests', 'constituencies', 'mlas','finyears' ));
    }

    public function store(StoreMemberFundRequest $request)
    {
        $memberFund = MemberFund::create($request->all());

        return redirect()->route('admin.member-funds.index');
    }

    public function edit(MemberFund $memberFund)
    {
        abort_if(Gate::denies('member_fund_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookfests = BookFest::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $constituencies = Constituency::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mlas = Mla::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $memberFund->load('bookfest', 'constituency', 'mla');

        $curyear = Carbon::now();
        $lastyear = Carbon::now()->subYear();
        $nextyear = Carbon::now()->addYear();
       
        $finyears = [];
        $finyears[] = $lastyear->format('Y') . '-' .$curyear->format('y');
        $finyears[] = $curyear->format('Y') . '-' .$nextyear->format('y');

        return view('admin.memberFunds.edit', compact('bookfests', 'constituencies', 'memberFund', 'mlas', 'finyears'));
    }

    public function update(UpdateMemberFundRequest $request, MemberFund $memberFund)
    {
        $memberFund->update($request->all());

        return redirect()->route('admin.member-funds.index');
    }

    public function show(MemberFund $memberFund)
    {
        abort_if(Gate::denies('member_fund_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $memberFund->load('bookfest', 'constituency', 'mla', 'memberFundInvoiceLists');

        return view('admin.memberFunds.show', compact('memberFund'));
    }

    public function destroy(MemberFund $memberFund)
    {
        abort_if(Gate::denies('member_fund_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $memberFund->delete();

        return back();
    }

    public function massDestroy(MassDestroyMemberFundRequest $request)
    {
        MemberFund::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function export() 
    {
        $bookfest = BookFest::where('status', 'active')->latest()->first();
        if(!$bookfest){
            return  back()->withErrors(['No active bookfest found']);;
        }

       // return Excel::download(new MembersExport, 'klibf.xlsx');
       $date = Carbon::now()->toDateTimeString();

       return (new InvoicesExport($bookfest->id))->download('klibf' . $bookfest->title. '_'. $date . '.xlsx');
    }
}
