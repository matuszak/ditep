<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DitepController extends Controller
{
    public function index() {
        return view('ditep.index');
    }

    public function visual() {
        return view('layouts.ditep.blank');
    }
    public function labs(){
        return view('ditep.lab1');
    }
}
