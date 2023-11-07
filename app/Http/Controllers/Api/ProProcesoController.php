<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProProceso;
use Illuminate\Http\Request;

class ProProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pro_procesos = new ProProceso();
            return response()->json($pro_procesos->get());
        } catch (\Throwable $th) {
            throw $th;
            return response("",500);
        }
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
    public function show(string $id)
    {
        try {
            $pro_procesos = new ProProceso();
            return response()->json($pro_procesos->find($id));
        } catch (\Throwable $th) {
            throw $th;
            return response("",500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
