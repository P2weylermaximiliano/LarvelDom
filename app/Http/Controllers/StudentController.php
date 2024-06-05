<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\student;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\Logueo;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function logueo(){
        //$rols=Rol::all();
        //$logs=Logueo::all();
        //$student=Student::all();
        //dd($rols);
        $user = Auth::user();
        //dd($user);
        if ($user->role->nombre == 'admin') {
            $logs=Logueo::all();
            return view('logueo', ['logs' => $logs]);
        } else {
            return redirect('/students')->with('error', 'No tienes permiso para acceder a esta página.');
        }
        /*return view('logueo', [
            'logs' => $logs,
            'rols'=>$rols,
        ]);*/
    }

    public function filtrar(Request $request){
        //dd($request);
        //$this->middleware('log.request');
        $año=$request->year;
        if ($año && $año !== 'todos') {
            /*$query = Student::query();
            $query->orderBy('año', 'asc');
            $students = $query->paginate(8);*/
            $students = Student::orderByRaw("CASE WHEN año = ? THEN 0 ELSE 1 END, año", [$año])->paginate(8);
        } else {
            
            $students = Student::paginate(8);
        }
        
    return view('students.index', [
        'students' => $students,
    ]);
    } 

    public function crearPDF(){
        $student=Student::all();
        $html='<h1> Informacion de los estudiantes</h1>';
        foreach($student as $students){
            $html .='<p>dni:'.$students->dni . '</p>';
            $html .='<p>Nombre:'.$students->nombre . '</p>';
            $html .='<p>Apellido:'.$students->apellido . '</p>';
            $html .='<p>fecha_nacimiento:'.$students->fecha_nacimiento . '</p>';
            $html .='<p>año:'.$students->año .'</p>';
            $html .='<hr>';
        }
        $dompdf = new Dompdf;
        $dompdf->loadHtml($html);
        $dompdf->render();
        return $dompdf->stream("studiantes.pdf");

    }
   
   
     public function index() : View
    {
        
        $hoy = Carbon::today()->toDateString();
        $students = Student::with('assists')->latest()->paginate(8);
        
        return view('students.index', [
            'students' => $students,
            'hoy'=>$hoy,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request) 
    {
        $log = new Logueo();
        $log-> accion = 'alta';
        $log-> ip = $request->ip();
        $log-> navegador = $request->header('User-Agent');
        $log-> nombre = Auth::user()->email;
        $log-> created_at = now();
        $log->save();
        
        //return redirect()->route('students.index')->with('success', 'Student created successfully.');
        //$this->middleware('logueo.request');
        $hoy = Carbon::today()->toDateString();
        //dd($request);
        $fechaNacimiento = Carbon::parse($request->fechaNacimiento);
        $edad = $fechaNacimiento->diffInYears($hoy);
        
        if($edad>=18){
        Student::create($request->all());
        return redirect()->route('students.index')
                ->withSuccess('New product is added successfully.');
        }else{
            //return redirect()->route('students.index');
            return ('el alumno es menor de 18');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student) : View
    {
        return view('students.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Student $student) 
    {
        $log = new Logueo();
        $log-> accion = 'modificacion';
        $log-> ip = $request->ip();
        $log-> navegador = $request->header('User-Agent');
        $log-> nombre = Auth::user()->email;
        $log-> created_at = now();
        $log->save();
        return view('students.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student) : RedirectResponse
    {
        $student->update($request->all());
        return redirect()->back()
                ->withSuccess('Student is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,Student $student)  
    {
        $log = new Logueo();
        $log-> accion = 'baja';
        $log-> ip = $request->ip();
        $log-> navegador = $request->header('User-Agent');
        $log-> nombre = Auth::user()->email;
        $log-> created_at = now();
        $log->save();
        $student->delete();
        return redirect()->route('students.index')
                ->withSuccess('Student is deleted successfully.');
    }

    
    
}