<?php
/**
 * Created by PhpStorm.
 * User: Abdou
 * Date: 28-May-19
 * Time: 14:08
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Reviseur;
use App\Conference;


class ReviseurController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function reviseurForm(){

        return view('reviseurForm');
    }

    public function reviseurAdd(Request $request){
        $parameters = $request-> except(['_token']);

        $reviseur = new Reviseur();
        $reviseur->email = $parameters->email;
        $reviseur->theme = $parameters->theme;
        $reviseur->email = $parameters->email;
    }
    public function reviseurHome(){
        $conference = Conference::all();
        return view('reviseurHome')->with('Conference',$conference) ;
    }

}