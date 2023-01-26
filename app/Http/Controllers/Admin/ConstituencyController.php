<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyConstituencyRequest;
use App\Http\Requests\StoreConstituencyRequest;
use App\Http\Requests\UpdateConstituencyRequest;
use App\Models\Constituency;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConstituencyController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('constituency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $constituencies = Constituency::all();

        return view('admin.constituencies.index', compact('constituencies'));
    }

    public function create()
    {
        abort_if(Gate::denies('constituency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.constituencies.create');
    }

    public function store(StoreConstituencyRequest $request)
    {
        $constituency = Constituency::create($request->all());

        return redirect()->route('admin.constituencies.index');
    }

    public function edit(Constituency $constituency)
    {
        abort_if(Gate::denies('constituency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.constituencies.edit', compact('constituency'));
    }

    public function update(UpdateConstituencyRequest $request, Constituency $constituency)
    {
        $constituency->update($request->all());

        return redirect()->route('admin.constituencies.index');
    }

    public function show(Constituency $constituency)
    {
        abort_if(Gate::denies('constituency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    
        return view('admin.constituencies.show', compact('constituency'));
    }

    public function destroy(Constituency $constituency)
    {
        abort_if(Gate::denies('constituency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $constituency->delete();

        return back();
    }

    public function massDestroy(MassDestroyConstituencyRequest $request)
    {
        Constituency::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
