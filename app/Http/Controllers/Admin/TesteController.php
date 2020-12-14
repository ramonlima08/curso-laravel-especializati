<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function home(){
        return "Function Home for Controller";
    }

    public function dashboard(){
        return "Function DashBoard for  Controller";
    }

    public function financeiro(){
        return "Function Financeiro for  Controller";
    }

    public function produtos(){
        return "Function Produtos for  Controller";
    }
}
