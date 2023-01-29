<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMlaRequest;
use App\Http\Requests\UpdateMlaRequest;
use App\Http\Resources\Admin\MlaResource;
use App\Models\Mla;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MlaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mla_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MlaResource(Mla::all());
    }

    public function store(StoreMlaRequest $request)
    {
        $mla = Mla::create($request->all());

        return (new MlaResource($mla))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Mla $mla)
    {
        abort_if(Gate::denies('mla_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MlaResource($mla);
    }

    public function update(UpdateMlaRequest $request, Mla $mla)
    {
        $mla->update($request->all());

        return (new MlaResource($mla))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Mla $mla)
    {
        abort_if(Gate::denies('mla_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mla->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
