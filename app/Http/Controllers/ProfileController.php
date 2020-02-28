<?php

namespace App\Http\Controllers;

use App\Idea;
use App\Policies\ProfilePolicy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return Redirect::back();
    }

    public function show(Request $request, $name){
        $user = User::where('name', $name)->get()->first();
        if(!$user OR !$request->user()->can('view', $user, User::class)){
            abort(404);
        }
        return view('profile.show', compact('user'));
    }

    public function edit(Request $request, $name){
        $user = User::where('name', $name)->get()->first();
        if(!$user OR !$request->user()->can('update', $user, User::class)){
            abort(404);
        }
        $request->old("pseudo", $user->name);
        $request->old("email", $user->email);
        return view('profile.edit', compact('user'));
    }

    public function updateAvatar(Request $request, $name){
        $user = User::where('name', $name)->get()->first();
        if(!$user OR !$request->user()->can('update', $user, User::class)){
            abort(404);
        }

        $request->validate([ 'avatarFile' => 'image|mimes:jpeg,png,jpg|max:2048']);

        if($request->avatarFile){
            $old_image = $user->avatar;
            $avatarName = $user->id.'00'.time().'.'.$request->avatarFile->getClientOriginalExtension();

            $request->avatarFile->storeAs('public/avatars', $avatarName);


            $user->avatar = $avatarName;
            $user->update();
            if($old_image !== "user.jpg") Storage::disk('public')->delete('avatars/'.$old_image);
            //return back()->with('success', $avatarName);
        }

        abort('403');
    }

    public function update(Request $request, $name){
        $user = User::where('name', $name)->get()->first();
        if(!$user OR !$request->user()->can('update', $user, User::class)){
            abort(404);
        }

        $request->validate([
            'name' => ['string', 'max:255', 'unique:users'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'oldPassword' => ['string', 'min:8'],
            'password' => ['string', 'min:8', 'confirmed']
        ]);

        if($request->name AND $request->name !== $user->name){
            $user->name = $request->name;
        }

        if($request->email AND $request->email !== $user->email){
            $user->email = $request->email;
        }

        if($request->password AND Hash::make($request->password) !== $user->password){
            if(Hash::make($request->oldPassword) === $user->password){
                $user->password = Hash::make($request->password);
                $user->setRememberToken(Str::random(60));
                $user->save();
                if($user->id === Auth::user()->id) Auth::guard()->login($user);
            }else{
                return back()->with('oldPassword',"Le mot de passe ne pas correspond à celui actuel");
            }
        }
        abort('404');
        return back()->with('success',"Vos modifications ont bien été enregistrées");
    }

    public function destroy($id){
        $idea = Idea::where('id', $id)->get()->first();
        $this->authorize('delete', $idea);
        return Redirect::back();
    }

}
