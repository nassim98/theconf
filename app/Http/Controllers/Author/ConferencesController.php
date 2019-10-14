<?php

namespace App\Http\Controllers\author;

use App\Conference;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ConferencesController extends Controller
{
   // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $conferences = Conference::all();
        /*$params = [
            'title' => 'conferences Listing',
            'conferences' => $conferences,

        ];*/
        return view('author.conferences.conferences_list')->with('Conference',$conferences);
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
        return view('author.conferences.conferences_create')->with($params);
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
      /* $this->validate($request, [
            'name' => 'required',
            'theme' => 'required',
            'track' => 'required',



        ]);*/
      $parameters = $request-> except(['_token']);

        $conference = new Conference();
        $conference->name = $parameters['name'];
        $conference->theme = $parameters['theme'];
        $conference->track = $parameters['track'];
        //upload file into database
        if($request->hasFile('file')){
            $filename = $request->file->getClientOriginalName();
            $filesize= $request->file->getClientSize();

            $conference->file_name = $filename;
            $conference->file_size = $filesize;

            $request->file->storeAs('/public/upload', $filename);



        }

        $conference->save();
      /*$file= $request->file('file_name');
      $new_name= rand() . '.pdf' . $file->getClientOriginalExtension();
      $file->move(public_path('storage'),$new_name);
      $form_data= array(
          'name' => $request->name,
          'theme' => $request->theme,
          'track' => $request->track,
          'file_name' => $new_name
      );
      Conference::create($form_data);*/

        return redirect()->route('conferencess.index')->with('success', "The conference has successfully been created.");
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
            return view('author.conferences.conferences_delete')->with($params);
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
            return view('author.conferences.conferences_edit')->with($params);
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
                'track' => 'required',
                'file' => 'required',
            ]);
            $conference->name = $request->input('name');
            $conference->theme = $request->input('theme');
            $conference->track = $request->input('track');
            $conference->file = $request->input('file');
            $conference->save();
            return redirect()->route('conferencess.index')->with('success', "The Conference <strong>$conference->theme</strong> has successfully been updated.");
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
            return redirect()->route('conferencess.index')->with('success', "The conference <strong>$conference->name</strong> has successfully been archived.");
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