<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $this->data['title'] = "RML Management";
        $this->data['active'] = "dashboard";
        return view('dashboard',$this->data);
    }
}
