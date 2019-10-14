<?php

namespace App\Http\Controllers\Admin;


use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $authors = Author::all();
        $params = [
            'title' => 'Authors Listing',
            'authors' => $authors,

        ];
        return view('admin.authors.authors_list')->with($params);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Create author',

        ];
        return view('admin.authors.authors_create')->with($params);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:authors',
            'password' => 'required',
        ]);
        $author = Author::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('authors.index')->with('success', "The Author <strong>$author->name</strong> has successfully been created.");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $author = Author::findOrFail($id);
            $params = [
                'title' => 'Delete author',
                'author' => $author,

            ];
            return view('admin.authors.authors_delete')->with($params);
        }
        catch (ModelNotFoundException $ex)
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $author = Author::findOrFail($id);
            $params = [
                'title' => 'Edit Author',
                'author' => $author,

            ];
            return view('admin.authors.authors_edit')->with($params);
        }
        catch (ModelNotFoundException $ex)
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $author = Author::findOrFail($id);
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:authors,email,'.$id,
            ]);
            $author->name = $request->input('name');
            $author->email = $request->input('email');
            $author->save();
            return redirect()->route('authors.index')->with('success', "The author <strong>$author->name</strong> has successfully been updated.");
        }
        catch (ModelNotFoundException $ex)
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $author = Author::findOrFail($id);
            $author->delete();
            return redirect()->route('authors.index')->with('success', "The Author <strong>$author->name</strong> has successfully been archived.");
        }
        catch (ModelNotFoundException $ex)
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
}