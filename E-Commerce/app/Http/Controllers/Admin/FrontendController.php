<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // cette fonction a pour pbjectif d retourener la page index du tableau de bord
    function index() {
        return view('admin.index');
    }
}
