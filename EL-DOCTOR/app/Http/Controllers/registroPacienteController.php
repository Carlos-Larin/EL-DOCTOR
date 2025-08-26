<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Paciente;

class registroPacienteController extends Controller
{
     public function index()
    {
        $paciente = Paciente::all();
        return view('mainPaciente', compact('paciente'));
    }

    public function create()
    {
        return view('registroPaciente');
    }

   public function store(Request $request)
    {
        // Debug: ver qué datos llegan
        //dd($request->all());
        
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido'  => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|max:10',
            'correo' => 'required|email|unique:pacientes,correo',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:255',
            'usuario' => 'required|string|max:50|unique:pacientes,usuario',
            'password' => 'required|string|min:6',   
        ]);

        Paciente::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'sexo' => $request->sexo,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'usuario' => $request->usuario,
            'password_hash' => Hash::make($request->password),
            'fecha_creacion' => now(),
        ]);

        return redirect()->route('paciente.create')->with('success', 'Paciente registrado correctamente');
    }

    // Métodos para editar, actualizar y eliminar puedes agregarlos después

}
