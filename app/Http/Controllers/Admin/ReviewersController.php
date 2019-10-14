<?php

namespace App\Http\Controllers\Admin;


use App\Reviewer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class ReviewersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviewers = Reviewer::all();
        $params = [
            'title' => 'Reviewers Listing',
            'reviewers' => $reviewers,
        ];
        return view('admin.reviewers.reviewers_list')->with($params);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Create Reviewer',
        ];
        return view('admin.reviewers.reviewers_create')->with($params);
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
            'email' => 'required|unique:reviewers',
            'password' => 'required',
        ]);
        $reviewer = Reviewer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('reviewers.index')->with('success', "The Reviewer <strong>$reviewer->name</strong> has successfully been created.");
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
            $reviewer = Reviewer::findOrFail($id);
            $params = [
                'title' => 'Delete Reviewer',
                'reviewer' => $reviewer,
            ];
            return view('admin.reviewers.reviewers_delete')->with($params);
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
            $reviewer = Reviewer::findOrFail($id);
            $params = [
                'title' => 'Edit Reviewer',
                'reviewer' => $reviewer,
            ];
            return view('admin.reviewers.reviewers_edit')->with($params);
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
            $reviewer = Reviewer::findOrFail($id);
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:reviewers,email,'.$id,
            ]);
            $reviewer->name = $request->input('name');
            $reviewer->email = $request->input('email');
            $reviewer->save();
            return redirect()->route('reviewers.index')->with('success', "The reviewer <strong>$reviewer->name</strong> has successfully been updated.");
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
            $reviewer = Reviewer::findOrFail($id);
            $reviewer->delete();
            return redirect()->route('reviewers.index')->with('success', "The reviewer <strong>$reviewer->name</strong> has successfully been archived.");
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