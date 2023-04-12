<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Confirmation;

class UsersController extends Controller
{
    public function index()
    {
        $confirmations = Confirmation::all();
        $users = Users::paginate(15);

        return view('userstable', compact('users', 'confirmations'));
    }
}


