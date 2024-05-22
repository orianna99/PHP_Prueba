<?php

namespace App\Http\Controllers;

use App\Models\DocDocumento;
use App\Models\ProProceso;
use App\Models\TipTipoDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocumentoController extends Controller
{
    public function create(Request $request)
    {
        try {
            $documento = new DocDocumento();
            $documento->DOC_NOMBRE = $request->nombre;
            $documento->DOC_CONTENIDO = $request->contenido;
            $documento->DOC_ID_TIPO = $request->tipoDocumento;
            $documento->DOC_ID_PROCESO = $request->procesos;

            // Obtener el prefijo del tipo de documento
            $tipoDocumento = TipTipoDoc::find($request->tipoDocumento);
            $tipPrefijo = $tipoDocumento->TIP_PREFIJO;

            // Obtener el prefijo del proceso
            $proceso = ProProceso::find($request->procesos);
            $proPrefijo = $proceso->PRO_PREFIJO;

            // Generar un número único para DOC_ID
            $ultimoDocumento = DocDocumento::latest()->first();
            $ultimoId = $ultimoDocumento ? $ultimoDocumento->DOC_ID : 0;
            $nuevoId = $ultimoId + 1;

            // Generar el código del documento
            $docCodigo = $tipPrefijo . "-" . $proPrefijo . "-" . $nuevoId;
            $documento->DOC_CODIGO = $docCodigo;

            $documento->save();
            return redirect()->route('home')->with('success', 'Documento creado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al crear el documento: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al crear el documento. Por favor, inténtalo de nuevo más tarde.');
        }
    }

    public function delete($id)
    {
        $documento = DocDocumento::find($id);
        if ($documento) {
            $documento->delete();
            return redirect()->route('home')->with('success', 'Documento eliminado correctamente.');
        } else {
            return redirect()->route('home')->with('error', 'Documento no encontrado.');
        }
    }

    public function document($id)
    {
        $tiposDocumentos = TipTipoDoc::select('TIP_ID', 'TIP_NOMBRE')->get();
        $proProcesos = ProProceso::select('PRO_ID', 'PRO_NOMBRE')->get();
        $documento = DocDocumento::find($id);
        $data = [
            'documento' => $documento,
            'tiposDocumentos' => $tiposDocumentos,
            'proProcesos' => $proProcesos
        ];

        return response()->json($data);
    }

    public function update(Request $request)
    {
        $documento = DocDocumento::find($request->id_documento);

        if ($documento) {
            $documento->DOC_NOMBRE = $request->nombre_documento;
            $documento->DOC_CONTENIDO = $request->contenido_documento;
            $documento->DOC_ID_TIPO = $request->tipo_documento;
            $documento->DOC_ID_PROCESO = $request->proceso_documento;

            // Obtener el prefijo del tipo de documento
            $tipoDocumento = TipTipoDoc::find($request->tipo_documento);
            $tipPrefijo = $tipoDocumento->TIP_PREFIJO;

            // Obtener el prefijo del proceso
            $proceso = ProProceso::find($request->proceso_documento);
            $proPrefijo = $proceso->PRO_PREFIJO;

            // Generar el código del documento
            $docCodigo = $tipPrefijo . "-" . $proPrefijo . "-" . $documento->DOC_ID;
            $documento->DOC_CODIGO = $docCodigo;

            $documento->save();
            return redirect()->route('home')->with('success', 'Documento actualizado exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Documento no encontrado.');
        }
    }
}
