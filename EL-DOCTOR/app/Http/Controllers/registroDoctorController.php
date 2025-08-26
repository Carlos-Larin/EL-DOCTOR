<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;

class registroDoctorController extends Controller
{
    public function index()
    {
        $doctores = Doctor::all();
        return view('mainDoctor', compact('doctores'));
    }
    

    public function create()
    {
        return view('registroDoctor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:doctores,correo',
            'telefono' => 'required',
            'especialidad' => 'required',
            'numero_colegiado' => 'required',
            'usuario' => 'required|unique:doctores,usuario',
            'password' => 'required',
            'direccion_clinica' => 'required',
            'estado' => 'required',
        ]);

        // Guardar el doctor y obtener el ID
        $doctor = Doctor::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'especialidad' => $request->especialidad,
            'numero_colegiado' => $request->numero_colegiado,
            'usuario' => $request->usuario,
            'password_hash' => Hash::make($request->password),
            'direccion_clinica' => $request->direccion_clinica,
            'estado' => $request->estado,
            'fecha_creacion' => now(),
            'ultimo_login' => null,
        ]);

        // Redireccionar AL DOCTOR RECIÉN CREADO con su ID
        return redirect()->route('mainDoctor', ['id_doctor' => $doctor->id])->with('success', 'Doctor registrado correctamente');
    }

    // Métodos para editar, actualizar y eliminar puedes agregarlos después
}
