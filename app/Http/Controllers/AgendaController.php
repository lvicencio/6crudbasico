<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        //$nombre = $request->get('buscador');
        $buscar = $request->get('buscador');
        $tipo = $request->get('tipo');

        $urlvariables=$request->all();  //para mantener el n° de pagina en la paginación

        // $agenda = Agenda::all();
         // $agenda = Agenda::paginate(5);
         // $agenda = Agenda::where('nombres', 'like', "%$nombre%")->paginate(5);

        //busca por filtro por scope scopeNombres y scopeApellidos
       // $agenda = Agenda::nombres($nombre)->apellidos($apellido)->paginate(5);

        //buscar por scopeBuscarpor
        $agenda = Agenda::buscarpor($tipo, $buscar)->paginate(3)->appends($urlvariables);

        return view('agenda.index', compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agenda = new Agenda;

        $agenda->nombres = $request->nombres;
        $agenda->apellidos = $request->apellidos;
        $agenda->telefono = $request->telefono;
        $agenda->movil = $request->movil;
        $agenda->sexo = $request->sexo;
        $agenda->email = $request->email;
        $agenda->posicion = $request->posicion;
        $agenda->departamento = $request->departamento;
        $agenda->salario = $request->salario;
        $agenda->f_nacimiento = $request->f_nacimiento;

        $agenda->save();

        return redirect()->route('agenda.index')->with('datos','Guardado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $agenda= Agenda::findOrFail($id);

        return view('agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agenda= Agenda::findOrFail($id);

        return view('agenda.edit', compact('agenda'));
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
         $agenda= Agenda::findOrFail($id);

        $agenda->nombres = $request->nombres;
        $agenda->apellidos = $request->apellidos;
        $agenda->telefono = $request->telefono;
        $agenda->movil = $request->movil;
        $agenda->sexo = $request->sexo;
        $agenda->email = $request->email;
        $agenda->posicion = $request->posicion;
        $agenda->departamento = $request->departamento;
        $agenda->salario = $request->salario;
        $agenda->f_nacimiento = $request->f_nacimiento;

        $agenda->save();

        return redirect()->route('agenda.index')->with('datos','Editado con Exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Agenda $agenda)
    // {
    //     $agenda->delete();

    //      return redirect()->route('agenda.index')->with('datos','Eliminado con Exito');
    // }


    public function destroy($id)
    {
        $agenda= Agenda::findOrFail($id);

        $agenda->delete();

         return redirect()->route('agenda.index')->with('datos','Eliminado con Exito');
    }
}
