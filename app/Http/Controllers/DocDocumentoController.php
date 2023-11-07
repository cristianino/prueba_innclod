<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocDocumentoRequest;
use App\Http\Requests\UpdateDocDocumentoRequest;
use App\Models\DocDocumento;
use Inertia\Inertia;

class DocDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $documents = DocDocumento::with(['tipoDoc', 'proceso'])->get();
            return Inertia::render('Document/Index', [
                'documents' => $documents
            ]);
        } catch (\Throwable $th) {
            throw $th;
            return redirect("/documento");
        }
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
    public function store(StoreDocDocumentoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DocDocumento $docDocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocDocumento $docDocumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocDocumentoRequest $request, DocDocumento $docDocumento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocDocumento $docDocumento)
    {
        //
    }
}
