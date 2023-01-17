<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPublisherRequest;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Models\Publisher;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PublisherController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('publisher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publishers = Publisher::all();

        return view('admin.publishers.index', compact('publishers'));
    }

    public function create()
    {
        abort_if(Gate::denies('publisher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.publishers.create');
    }

    public function store(StorePublisherRequest $request)
    {
        $publisher = Publisher::create($request->all());

        return redirect()->route('admin.publishers.index');
    }

    public function edit(Publisher $publisher)
    {
        abort_if(Gate::denies('publisher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.publishers.edit', compact('publisher'));
    }

    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $publisher->update($request->all());

        return redirect()->route('admin.publishers.index');
    }

    public function show(Publisher $publisher)
    {
        abort_if(Gate::denies('publisher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publisher->load('publisherInvoiceItems');

        return view('admin.publishers.show', compact('publisher'));
    }

    public function destroy(Publisher $publisher)
    {
        abort_if(Gate::denies('publisher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publisher->delete();

        return back();
    }

    public function massDestroy(MassDestroyPublisherRequest $request)
    {
        Publisher::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
