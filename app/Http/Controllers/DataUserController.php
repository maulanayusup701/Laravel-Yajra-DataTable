<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    public function index(Request $request)
    {   
        if ($request->ajax()) return (new User())->getDatatables()->make(true);
        
        return view('index', [
            'title' => 'Laravel Yajra Data-tables'
        ]);
    }
}
