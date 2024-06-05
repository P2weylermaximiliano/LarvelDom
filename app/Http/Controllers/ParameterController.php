<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parameter;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ParameterController extends Controller
{
    public function Ponerdias(Request $request){

        
       // dd($request);
       /*$id=1;
        $Parameter=Parameter::create([
            'id'=>$id,
            'dias'=>$request->valor,
            
        ]);*/
        //$Parameter=Parameter::create($request->all());
        $nuevodia=($request->dias);
        $Parameter = Parameter::find(1);
        $Parameter->dias = $nuevodia;
        $Parameter->save();
        return ("se colocaron los dias");
    }
}
