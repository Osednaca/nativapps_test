<?php

namespace App\Http\Controllers\Api;

use App\Models\Patients;
use App\Models\DiagnosePatient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    public function index()
    {

        $patients = Patients::paginate(2);
        $index = 0;
        foreach($patients as $patient){
            $diagnoses_data = DB::table('diagnose_patients')
            ->join('diagnoses', 'diagnoses.id', '=', 'diagnose_patients.diagnose_id')
            ->where('patient_id', '=', $patient->id)
            ->get();
            $patients[$index]["diagnoses"] = $diagnoses_data;
            $index++;
        }

        return response()->json([
            'status' => true,
            'patients' => $patients
        ]);
    }

    public function store(PatientRequest $request)
    {
        $patients = Patients::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Patient Created successfully!",
            'patient' => $patients
        ], 200);
    }

    public function searchByData(Request $request)
    {
        $patients = DB::table('patients')
        ->where('first_name', '=', $request->first_name)
        ->orWhere('last_name', '=', $request->last_name)
        ->orWhere('document', '=', $request->document)
        ->get();

        return response()->json([
            'status' => true,
            'patients' => $patients
        ], 200);
    }

    public function update(PatientRequest $request, $id)
    {
        $patients = Patients::find($id);
        $patients->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Patient updated successfully!",
            'patient' => $patients
        ], 200);
    }

    public function destroy($id)
    {
        DiagnosePatient::where('patient_id', $id)->delete();
        Patients::destroy($id);
        return response()->json([
            'status' => true,
            'message' => "Patient deleted successfully!",
        ], 200);
    }
}
