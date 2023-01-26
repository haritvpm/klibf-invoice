<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookFestRequest;
use App\Http\Requests\UpdateBookFestRequest;
use App\Models\BookFest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookFestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('book_fest_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookFests = BookFest::all();

        return view('admin.bookFests.index', compact('bookFests'));
    }

    public function create()
    {
        abort_if(Gate::denies('book_fest_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bookFests.create');
    }

    public function store(StoreBookFestRequest $request)
    {
        if( $request->input('status') ==  'active'){
           
            //deactivate others
            BookFest::query()->update(['status' =>'inactive']);
/*
            $activebookfests = BookFest::where('status', 'active')->count();
            if($activebookfests > 0){
                return  back()->withInput()->withErrors(['Deactivate currently active bookfest first']);
            }*/
        }

        $bookFest = BookFest::create($request->all());

        return redirect()->route('admin.book-fests.index');
    }

    public function edit(BookFest $bookFest)
    {
        abort_if(Gate::denies('book_fest_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bookFests.edit', compact('bookFest'));
    }

    public function update(UpdateBookFestRequest $request, BookFest $bookFest)
    {
      
        if( $request->input('status') ==  'active'){

            BookFest::query()->update(['status' =>'inactive']);

           /* $activebookfests = BookFest::where('id','<>',$bookFest->id)
                ->where('status', 'active')->count();

            if($activebookfests > 0){
                return  back()->withInput()->withErrors(['Deactivate currently active bookfest first']);
            }
            */
        }

        $bookFest->update($request->all());

        return redirect()->route('admin.book-fests.index');
    }

    public function show(BookFest $bookFest)
    {
        abort_if(Gate::denies('book_fest_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookFest->load('bookfestMemberFunds');

        return view('admin.bookFests.show', compact('bookFest'));
    }
}
