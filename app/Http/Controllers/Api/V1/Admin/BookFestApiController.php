<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookFestRequest;
use App\Http\Requests\UpdateBookFestRequest;
use App\Http\Resources\Admin\BookFestResource;
use App\Models\BookFest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookFestApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('book_fest_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BookFestResource(BookFest::all());
    }

    public function store(StoreBookFestRequest $request)
    {
        $bookFest = BookFest::create($request->all());

        return (new BookFestResource($bookFest))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BookFest $bookFest)
    {
        abort_if(Gate::denies('book_fest_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BookFestResource($bookFest);
    }

    public function update(UpdateBookFestRequest $request, BookFest $bookFest)
    {
        $bookFest->update($request->all());

        return (new BookFestResource($bookFest))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
