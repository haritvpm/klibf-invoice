<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMlaRequest;
use App\Http\Requests\StoreMlaRequest;
use App\Http\Requests\UpdateMlaRequest;
use App\Models\Mla;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MlaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('mla_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mlas = Mla::all();

        return view('admin.mlas.index', compact('mlas'));
    }

    public function create()
    {
        abort_if(Gate::denies('mla_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mlas.create');
    }

    public function store(StoreMlaRequest $request)
    {
        $mla = Mla::create($request->all());

        return redirect()->route('admin.mlas.index');
    }

    public function edit(Mla $mla)
    {
        abort_if(Gate::denies('mla_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mlas.edit', compact('mla'));
    }

    public function update(UpdateMlaRequest $request, Mla $mla)
    {
        $mla->update($request->all());

        return redirect()->route('admin.mlas.index');
    }

    public function show(Mla $mla)
    {
        abort_if(Gate::denies('mla_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mla->load('mlaMemberFunds');

        return view('admin.mlas.show', compact('mla'));
    }

    public function destroy(Mla $mla)
    {
        abort_if(Gate::denies('mla_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mla->delete();

        return back();
    }

    public function massDestroy(MassDestroyMlaRequest $request)
    {
        Mla::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
