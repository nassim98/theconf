<?php

namespace App\Http\Controllers\Admin;

use App\Conference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ConferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $conferences = Conference::all();
        $params = [
            'title' => 'conferences Listing',
            'conferences' => $conferences,

        ];
        return view('admin.conferences.conferences_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $params = [
            'title' => 'Create conference',

        ];
        return view('admin.conferences.conferences_create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'theme' => 'required',

        ]);
        $conference = Conference::create([
            'name' => $request->input('name'),
            'theme' => $request->input('theme'),

        ]);
        return redirect()->route('conferences.index')->with('success', "The conference <strong>$conference->name</strong> has successfully been created.");
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
            $conference = Conference::findOrFail($id);
            $params = [
                'title' => 'Delete conference',
                'conference' => $conference,

            ];
            return view('admin.conferences.conferences_delete')->with($params);
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
            $conference = Conference::findOrFail($id);
            $params = [
                'title' => 'Edit conference',
                'conference' => $conference,

            ];
            return view('admin.conferences.conferences_edit')->with($params);
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
            $conference = Conference::findOrFail($id);
            $this->validate($request, [
                'name' => 'required',
                'theme' => 'required',
            ]);
            $conference->name = $request->input('name');
            $conference->theme = $request->input('theme');
            $conference->save();
            return redirect()->route('conferences.index')->with('success', "The conference <strong>$conference->name</strong> has successfully been updated.");
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
            $conference = Conference::findOrFail($id);
            $conference->delete();
            return redirect()->route('conferences.index')->with('success', "The conference <strong>$conference->name</strong> has successfully been archived.");
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