<?php

namespace App\Http\Controllers;

use App\Idea;
use App\React;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IdeaController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth', ['only' => ['react', 'create', 'edit', 'store', 'update', 'destroy']]);
    }

    public function index(){
        return Redirect::home();
    }

    public function react(Request $request, $id)
    {
        $idea = Idea::where('id', $id)->get()->first();
        $react = Auth::user()->reacts()->where('idea_id', $id)->first();
        if(!$react){
            $react = new React();
            $react->user_id = Auth::user()->id;
            $react->idea_id = $id;
            $react->save();
        }
        if(!$idea){
            abort(404);
        }
        $this->authorize('view', $idea);
        if(isset($request['like'])){
            $like = $request['like'] === 'true' ? true : false;
            if($react->like !== $like){
                $react->like = $like;
                $react->update();
            }
        }else if(isset($request['join'])){
            $join = $request['join'] === 'true' ? true : false;
            if($react->join !== $join){
                $react->join = $join;
                $react->update();
            }
        }
        return null;
    }

    public function create(){
        return view('idea.create');
    }

    public function store(Request $request){
        $request->validate([
            'keyword1' => ['required', 'string', 'min:3', 'max:15'],
            'keyword2' => ['required', 'string', 'min:3', 'max:15'],
            'keyword3' => ['required', 'string', 'min:3', 'max:15'],
            'preview' => ['required', 'string', 'min:15', 'max:180'],
            'content' => ['required', 'string', 'min:50']
        ]);
        $idea = new Idea();
        $idea->user_id = $request->user()->id;
        $idea->keyword1 = $request->get('keyword1');
        $idea->keyword2 = $request->get('keyword2');
        $idea->keyword3 = $request->get('keyword3');
        $idea->preview = $request->get('preview');
        $idea->content = $request->get('content');
        $idea->published = Auth::user()->isModerator();
        $idea->save();
        return redirect(route('idea.show', compact("idea")))->with('success', "Votre idée a bien été créé, elle doit maintenant être soumise à l'examen");
    }

    public function show($id){
        $idea = Idea::where('id', $id)->get()->first();
        if(!$idea){
            abort(404);
        }
        if(!$idea->isPublished()){
            $this->authorize('view', $idea);
        }
        return view('idea.show', compact('idea'));
    }

    public function edit($id){
        $idea = Idea::where('id', $id)->get()->first();
        $this->authorize('update', $idea);
        return 'edit page ' . $id;
    }

    public function update(Request $request, $id){
        $idea = Idea::where('id', $id)->get()->first();
        $this->authorize('update', $idea);
        if($request['setPublic'] === 'true'){
            $idea->published = true;
            $idea->acceptBy = Auth::user()->id;
            $idea->save();
        }
        return Redirect::back();
    }

    public function destroy($id){
        $idea = Idea::where('id', $id)->get()->first();
        $this->authorize('delete', $idea);
        $idea->reacts()->delete();
        Idea::destroy($idea->id);
        return Redirect::home();
    }
}
