<?php

namespace App\Http\Controllers\Api;

use App\Models\Diagnoses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DiagnosesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Diagnoses $diagnoses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diagnoses $diagnoses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diagnoses $diagnoses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diagnoses $diagnoses)
    {
        //
    }

    public function get5CommonDiagnoses()
    {
        $diagnoses = DB::table('diagnose_patients')
        ->join('diagnoses', 'diagnoses.id', '=', 'diagnose_patients.diagnose_id')
        ->selectRaw('count(diagnose_patients.diagnose_id) as numdiag, diagnoses.name')
        ->where('diagnose_patients.created_at','>=', Carbon::now()->subMonth(5)->toDateTimeString())
        ->groupBy('diagnose_patients.diagnose_id', 'diagnoses.name')
        ->orderBy('numdiag','desc')
        ->limit(5)
        ->get();

        return response()->json([
            'status' => true,
            'diagnoses' => $diagnoses
        ], 200);
    }
}
