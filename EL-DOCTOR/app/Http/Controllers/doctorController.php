<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Paciente;


class doctorController extends Controller
{
    public function index($id_doctor)
    {
        // Doctor::findOrFail($id) buscará en 'id_doctor'
        $doctor = Doctor::findOrFail($id_doctor);
        return view('mainDoctor', compact('doctor'));
    }

}
