<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMemberRequest;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\BookFest;


class MemberController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $members = Member::with(['bookfest'])->get();

           
       

        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        abort_if(Gate::denies('member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookfests = BookFest::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.members.create', compact('bookfests'));
    }

    public function store(StoreMemberRequest $request)
    {
        $member = Member::create($request->all());

        return redirect()->route('admin.members.index');
    }

    public function edit(Member $member)
    {
        abort_if(Gate::denies('member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookfests = BookFest::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member->load('bookfest');

        return view('admin.members.edit', compact('bookfests', 'member'));
    }

    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->all());

        return redirect()->route('admin.members.index');
    }

    public function show(Member $member)
    {
        abort_if(Gate::denies('member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->load('bookfest', 'memberInvoiceLists', 'memberSanctionedAmounts');

        return view('admin.members.show', compact('member'));
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
