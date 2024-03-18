<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\News;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $users = User::orderBy('created_at', 'desc')->paginate(3);


        if ($user->type == 'admin') {
            return view('admin.users.index', compact('users'));
        } elseif ($user->type == 'user') {
            $events = Event::all();
            $news = News::all();
            return view('users.advertisements.index', compact('events', 'news'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function chatify(Request $request)
    {
        $user = Auth::user();

        if ($user->type == 'admin') {
            return view('admin.chatify');
        } elseif ($user->type == 'user') {
            return view('user.chatify');
        } else {
            return view('welcome');
        }
    }
}
