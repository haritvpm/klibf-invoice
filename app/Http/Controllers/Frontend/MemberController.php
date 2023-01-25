<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMemberRequest;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\BookFest;
use App\Models\Constituency;
use App\Models\Member;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;


class MemberController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $bookfest = BookFest::where('status', 'active')->latest()->first();

        $user_constituencies =  User::find( auth()->user()->id )->constituencies()->pluck('id');
        $members = Member::whereIn('constituency_id', $user_constituencies)
        ->where('bookfest_id', $bookfest->id)->get();

        return view('frontend.members.index', compact('members'));
    }

    public function create()
    {
        abort_if(Gate::denies('member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookfests = BookFest::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $constituencies = Constituency::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.members.create', compact('bookfests', 'constituencies'));
    }

    public function store(StoreMemberRequest $request)
    {
        $member = Member::create($request->all());

        return redirect()->route('frontend.members.index');
    }

    public function edit(Member $member)
    {
        abort_if(Gate::denies('member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookfests = BookFest::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $constituencies = Constituency::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member->load('bookfest', 'constituency');

        return view('frontend.members.edit', compact('bookfests', 'constituencies', 'member'));
    }

    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->all());

        return redirect()->route('frontend.members.index');
    }

    public function show(Member $member)
    {
        abort_if(Gate::denies('member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->load('bookfest', 'constituency', 'memberInvoiceLists');

        return view('frontend.members.show', compact('member'));
    }

    public function destroy(Member $member)
    {
        abort_if(Gate::denies('member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->delete();

        return back();
    }

    public function massDestroy(MassDestroyMemberRequest $request)
    {
        Member::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function export() 
    {
        $bookfest = BookFest::where('status', 'active')->latest()->first();
        if(!$bookfest){
            return  back()->withErrors(['No active bookfest found']);;
        }

       // return Excel::download(new MembersExport, 'klibf.xlsx');
        return (new InvoicesExport($bookfest->id))->download('klibf' . $bookfest->title . '.xlsx');
    }
}
