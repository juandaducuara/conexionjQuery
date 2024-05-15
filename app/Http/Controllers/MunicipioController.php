<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio; // Asegúrate de importar el modelo de Municipio si ya lo has creado

class MunicipioController extends Controller
{
    /**
     * Obtiene los municipios de un departamento específico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getMunicipios(Request $request)
    {
        // Valida que el departamento_id esté presente en la solicitud
        $request->validate([
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        // Obtiene el ID del departamento de la solicitud
        $departamentoId = $request->input('departamento_id');

        // Busca los municipios que pertenecen al departamento especificado
        $municipios = Municipio::where('departamento_id', $departamentoId)->get();

        // Retorna los municipios como respuesta JSON
        return response()->json($municipios);
    }
    /**
     * Muestra una lista de municipios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtiene todos los municipios y los pasa a la vista
        $municipios = Municipio::all();
        return view('municipios.index', compact('municipios'));
    }

    /**
     * Muestra el formulario para crear un nuevo municipio.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('municipios.create');
    }

    /**
     * Almacena un nuevo municipio en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            // Agrega aquí más validaciones según tus necesidades
        ]);

        // Crea un nuevo municipio con los datos del formulario
        Municipio::create($request->all());

        // Redirige a la página de inicio o a donde lo necesites
        return redirect()->route('municipios.index')
                         ->with('success', 'Municipio creado correctamente.');
    }

    // Puedes agregar más métodos según tus necesidades, como show(), edit(), update(), destroy(), etc.
}
