<?php

namespace App\Http\Controllers;

use App\Models\DocDocumento;
use App\Models\ProProceso;
use App\Models\TipTipoDoc;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tiposDocumentos = TipTipoDoc::select('TIP_ID', 'TIP_NOMBRE')->get();
        $proProcesos = ProProceso::select('PRO_ID', 'PRO_NOMBRE')->get();
        $documentos = DocDocumento::all();
        return view('home', compact('tiposDocumentos', 'proProcesos', 'documentos'));
    }
}
