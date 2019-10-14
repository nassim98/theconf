<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Conference;
use Illuminate\Support\Facades\File;
use Auth;

class AuteurController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // la fonction qui affiche la vue auteur avec les données des confs

    public function auteurHome (){
        $conferences = Conference::all();


        //$currentUser = \Auth::user()->name;


        return view('auteurHome')->with('Conference',$conferences);


    }

    public function auteurUpload(){
        return view('auteurUpload');
    }

    public function auteurAdd(Request $request){
        $parameters = $request-> except(['_token']);

        $conference = new Conference();
        $conference->titre = $parameters['titre'];
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
        return redirect()->route('auteurHome');

    }

    public function remove($id){
        $conference = Conference::find($id) ;
        $conference->delete();
        return redirect()->route('auteurHome');

    }
    public function maj($id){
        $conference = Conference::find($id);
        return view('maj')->with('Conference',$conference);
    }
    public function majAffectation(Request $request){
        $parameters=$request->all();
        $filename = $request->file->getClientOriginalName();
        $filesize= $request->file->getClientSize();
        $id=$parameters['id'];
        $oldConference = Conference::find($id);
        $oldConference->titre=$parameters['titre'];
        $oldConference->theme=$parameters['theme'];
        $oldConference->track=$parameters['track'];
        $oldConference->file_name=$filename;
        $oldConference->file_size=$filesize;
        $request->file->storeAs('/public/upload', $filename);
        $oldConference->save();
        return redirect()->route('auteurHome');
    }


}