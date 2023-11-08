<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocDocumentoRequest;
use App\Http\Requests\UpdateDocDocumentoRequest;
use App\Models\DocDocumento;
use App\Models\ProProceso;
use App\Models\TipTipoDoc;
use Illuminate\Support\Facades\Redirect;
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
        try {
            return Inertia::render('Document/Create', [
                'proProcesos' => ProProceso::get(),
                'tipTipoDoc' => TipTipoDoc::get(),
            ]);
        } catch (\Throwable $th) {
            throw $th;
            return redirect("/documento");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocDocumentoRequest $request)
    {
        $tipo = TipTipoDoc::find($request->doc_id_tipo);
        $proceso = ProProceso::find($request->doc_id_proceso);

        if (!$tipo || !$proceso) {
            return redirect()->back()->with('error', 'El tipo o proceso seleccionado no existe.');
        }

        $ultimoDocumento = DocDocumento::where('DOC_CODIGO', 'LIKE', "{$tipo->TIP_PREFIJO}-{$proceso->PRO_PREFIJO}-%")
                            ->orderBy('created_at', 'desc')
                            ->first();

        $consecutivo = 1;

        if ($ultimoDocumento) {
            $partes = explode('-', $ultimoDocumento->DOC_CODIGO);
            $consecutivo = intval(end($partes)) + 1;
        }

        $nuevoCodigo = "{$tipo->TIP_PREFIJO}-{$proceso->PRO_PREFIJO}-{$consecutivo}";

        $documento = new DocDocumento();
        $documento->DOC_NOMBRE = $request->doc_nombre;
        $documento->DOC_CODIGO = $nuevoCodigo;
        $documento->DOC_CONTENIDO = $request->doc_contenido;
        $documento->DOC_ID_TIPO = $request->doc_id_tipo;
        $documento->DOC_ID_PROCESO = $request->doc_id_proceso;
        $documento->save();

        return redirect()->route('documento.index')->with('success', __('Documento creado exitosamente.'));
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
    public function edit(DocDocumento $docDocumento, $id)
    {
        try {
            $docDocumentos = $docDocumento->find($id);
            return Inertia::render('Document/Update', [
                'proProcesos' => ProProceso::get(),
                'tipTipoDoc' => TipTipoDoc::get(),
                'documento' => $docDocumentos,
            ]);
        } catch (\Throwable $th) {
            throw $th;
            return redirect("/documento");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocDocumentoRequest $request, DocDocumento $docDocumento, $id)
    {
        $tipo = TipTipoDoc::find($request->doc_id_tipo);
        $proceso = ProProceso::find($request->doc_id_proceso);

        if (!$tipo || !$proceso) {
            return redirect()->back()->with('error', 'El tipo o proceso seleccionado no existe.');
        }
        $ultimoDocumento = DocDocumento::where('DOC_CODIGO', 'LIKE', "{$tipo->TIP_PREFIJO}-{$proceso->PRO_PREFIJO}-%")
                            ->orderBy('created_at', 'desc')
                            ->first();

        $consecutivo = 1;

        if ($ultimoDocumento) {
            $partes = explode('-', $ultimoDocumento->DOC_CODIGO);
            $consecutivo = intval(end($partes)) + 1;
        }

        $nuevoCodigo = "{$tipo->TIP_PREFIJO}-{$proceso->PRO_PREFIJO}-{$consecutivo}";

        $documento = $docDocumento->find($id);
        $documento->DOC_NOMBRE = $request->doc_nombre;
        $documento->DOC_CODIGO = $nuevoCodigo;
        $documento->DOC_CONTENIDO = $request->doc_contenido;
        $documento->DOC_ID_TIPO = $request->doc_id_tipo;
        $documento->DOC_ID_PROCESO = $request->doc_id_proceso;
        $documento->save();

        return redirect()->route('documento.index')->with('success', __('Documento actualizado exitosamente.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocDocumento $docDocumento)
    {
        try {
            $docDocumento = $docDocumento->get()[0];
            $docDocumento->delete();

            return Redirect::route('documento.index')->with('success', 'Documento eliminado con éxito.');
        } catch (\Exception $e) {
            return Redirect::back()->with(['error' => 'Error al eliminar el documento']);
        }
    }
}
