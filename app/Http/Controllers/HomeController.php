<?php

namespace App\Http\Controllers;

use App\Idea;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $users = User::get();
        $ideas = (Auth::check() && Auth::user()->isModerator()) ? Idea::orderBy('id')->get()->reverse() : Idea::published()->orderBy('id')->get()->reverse();
        if(Auth::check()){
            $reacts = Auth::user()->reacts();
            return view('home', compact('users', 'ideas', 'reacts'));
        }
        return view('home', compact('users', 'ideas'));
    }

    public function concept(){
        return view('concept');
    }

    public function search(Request $request){
        $query = $request->get('q');
        $ideas = Idea::where(function($q) use ($query) {
                $q->where('keyword1', 'LIKE', '%'.$query.'%')
                    ->orWhere('keyword2', 'LIKE', '%'.$query.'%')
                    ->orWhere('keyword3', 'LIKE', '%'.$query.'%');
            })->get();
        return view('search', compact('ideas', 'query'));
    }

}
