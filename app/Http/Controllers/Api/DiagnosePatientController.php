<?php

namespace App\Http\Controllers\Api;

use App\Models\DiagnosePatient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DiagnoseRequest;

class DiagnosePatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiagnoseRequest $request)
    {
        $diagnose = DiagnosePatient::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Diagnose Created successfully!",
            'diagnose' => $diagnose
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(DiagnosePatient $diagnosePatient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DiagnosePatient $diagnosePatient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiagnosePatient $diagnosePatient)
    {
        //
    }
}
