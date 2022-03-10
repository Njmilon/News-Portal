<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function RoleCreateIndex(){

        return view('backend.contents.user_role.create');
    }
}
