<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\IntegrantesComite;
use App\Models\AcreditacionComite;

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

    public function index()
    {
        $defaultYear = date('Y');
        $comitesAcreditados = AcreditacionComite::comitesAcreditados($defaultYear, 1)->first(); 
        $comitesNoAcreditados = AcreditacionComite::comitesAcreditados($defaultYear, 2)->first(); 
        $integrantesTotal = IntegrantesComite::IntegrantesTotal($defaultYear)->first();
        $comites = AcreditacionComite::Comites($defaultYear)->get();
        $contralores = IntegrantesComite::Contralores($defaultYear)->get();

        return view('home', compact('comitesAcreditados','comitesNoAcreditados','integrantesTotal','comites','contralores'));
    }
}
