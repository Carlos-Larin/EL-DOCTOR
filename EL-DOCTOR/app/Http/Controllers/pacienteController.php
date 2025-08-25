<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Paciente;


class pacienteController extends Controller
{
    public function index($id_paciente)
    {
        $paciente = Paciente::findOrFail($id_paciente);
        return view('mainPaciente', compact('paciente'));
    }

}
