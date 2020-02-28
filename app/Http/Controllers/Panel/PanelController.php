<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('panel');
    }

    public function index(){
        return 'PANEL';
    }

    public function stats(){
        return '3 visiteurs';
    }
}
