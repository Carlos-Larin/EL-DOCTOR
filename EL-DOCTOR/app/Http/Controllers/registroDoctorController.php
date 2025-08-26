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
        return view('doctores.index', compact('doctores'));
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

        return redirect()->route('doctores.show', ['doctor' => $doctor->id])->with('success', 'Doctor registrado correctamente');
    }

    // MOSTRAR PERFIL ESPECÍFICO
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctores.show', compact('doctor'));
    }

    // EDITAR DOCTOR
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctores.edit', compact('doctor'));
    }

    // ACTUALIZAR DOCTOR
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:doctores,correo,' . $doctor->id,
            'telefono' => 'required',
            'especialidad' => 'required',
            'numero_colegiado' => 'required',
            'usuario' => 'required|unique:doctores,usuario,' . $doctor->id,
            'direccion_clinica' => 'required',
            'estado' => 'required',
        ]);

        $doctor->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'especialidad' => $request->especialidad,
            'numero_colegiado' => $request->numero_colegiado,
            'usuario' => $request->usuario,
            'direccion_clinica' => $request->direccion_clinica,
            'estado' => $request->estado,
        ]);

        return redirect()->route('doctores.show', ['doctor' => $doctor->id])->with('success', 'Doctor actualizado correctamente');
    }

    // ELIMINAR DOCTOR
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctores.index')->with('success', 'Doctor eliminado correctamente');
    }
}