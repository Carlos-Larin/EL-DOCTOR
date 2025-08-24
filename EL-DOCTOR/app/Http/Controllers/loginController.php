<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Paciente;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $email = trim($request->email);

        // Buscar en doctores
        $doctor = Doctor::where('correo', $email)->first();
        if ($doctor && Hash::check($request->password, $doctor->password_hash)) {
            Auth::login($doctor);
            return redirect()->route('mainDoctor', ['id_doctor' => $doctor->id_doctor])
                             ->with('success', 'Bienvenido Dr. ' . $doctor->nombre);
        }

        // Buscar en pacientes
        $paciente = Paciente::where('correo', $email)->first();
        if ($paciente && Hash::check($request->password, $paciente->password_hash)) {
            Auth::login($paciente);
            return redirect()->route('mainPaciente', ['id_paciente' => $paciente->id_paciente])
                             ->with('success', 'Bienvenido ' . $paciente->nombre);
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Has cerrado sesión');
    }
}
