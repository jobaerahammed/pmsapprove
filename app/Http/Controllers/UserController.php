<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $xyz=User::whereNull('approved_at')->with('course')->get();
        // $courses=Course::all();
        // $users = User::whereNull('approved_at')
        // ->join('courses', 'courses.nsu_id', '=', 'users.nsu_id')
        // ->select('users.*','courses.*' )
        // ->get();

        return view('users', compact('xyz'));
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        return redirect()->route('admin.users.index')->withMessage('User approved successfully');
    }
}
