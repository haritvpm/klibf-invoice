<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySanctionedAmountRequest;
use App\Http\Requests\StoreSanctionedAmountRequest;
use App\Http\Requests\UpdateSanctionedAmountRequest;
use App\Models\BookFest;
use App\Models\FinancialYear;
use App\Models\Member;
use App\Models\SanctionedAmount;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SanctionedAmountController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sanctioned_amount_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sanctionedAmounts = SanctionedAmount::with(['fin_year', 'member', 'book_fest', 'created_by'])->get();

        return view('admin.sanctionedAmounts.index', compact('sanctionedAmounts'));
    }

    public function create()
    {
        abort_if(Gate::denies('sanctioned_amount_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fin_years = FinancialYear::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $members = Member::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $book_fests = BookFest::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sanctionedAmounts.create', compact('book_fests', 'fin_years', 'members'));
    }

    public function store(StoreSanctionedAmountRequest $request)
    {
        $bookfest = BookFest::where('status', 'active')->latest()->first();
        if(!$bookfest){
            return  back()->withInput()->withErrors(['No active bookfest found']);;
        }
        
        $sanctionedAmount = SanctionedAmount::create($request->all());

        return redirect()->route('admin.sanctioned-amounts.index');
    }

    public function edit(SanctionedAmount $sanctionedAmount)
    {
        abort_if(Gate::denies('sanctioned_amount_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fin_years = FinancialYear::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $members = Member::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $book_fests = BookFest::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sanctionedAmount->load('fin_year', 'member', 'book_fest', 'created_by');

        return view('admin.sanctionedAmounts.edit', compact('book_fests', 'fin_years', 'members', 'sanctionedAmount'));
    }

    public function update(UpdateSanctionedAmountRequest $request, SanctionedAmount $sanctionedAmount)
    {
        $sanctionedAmount->update($request->all());

        return redirect()->route('admin.sanctioned-amounts.index');
    }

    public function show(SanctionedAmount $sanctionedAmount)
    {
        abort_if(Gate::denies('sanctioned_amount_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sanctionedAmount->load('fin_year', 'member', 'book_fest', 'created_by');

        return view('admin.sanctionedAmounts.show', compact('sanctionedAmount'));
    }

    public function destroy(SanctionedAmount $sanctionedAmount)
    {
        abort_if(Gate::denies('sanctioned_amount_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sanctionedAmount->delete();

        return back();
    }

    public function massDestroy(MassDestroySanctionedAmountRequest $request)
    {
        SanctionedAmount::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
