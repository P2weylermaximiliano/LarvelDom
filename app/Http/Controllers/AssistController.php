<?php

namespace App\Http\Controllers;

use App\Models\Assist;
use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class AssistController extends Controller
{
    
    public function student(){
        return $this->belongsTo(student::class);
    }

    public function getassist($id){
        $student =student::find($id);
        $cant=$student->assists;
        //dd($cant);

        //return view('student.assists',compact( 'student','cant')); 
    }
    
    public function assiten(Request $request){
        //$id = $request->input('id');
        //dd($request->valor);
        $dni=($request->valor); 
        $estudiante = Student::where('dni', $dni)->first();
        return view('MostrarAsistencia', ['estudiante' => $estudiante]);
       /* $assistance = new Assist();
        $assistance->student_id = $request->id; 
        $assistance->save();*/

    }
    public function PonerAssistencia(Request $request){
        $assistance = new Assist();
        $assistance->student_id = $request->id; 
        $assistance->save();
        return ("La assistencia fue colocada");
    }
}
