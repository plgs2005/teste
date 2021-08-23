<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth')->except([
            'index'
        ]);
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model, Request $request)
    {
       
        $users = User::all();
        $auth  = Auth::check();
      
       
        $uId= Auth()->user();


        return view('users.index', compact('users', 'auth', 'uId'));
    }

    public function show(Request $request, $id)
    {
        $user = User::where('id' , '=', $id)->firstOrFail();
        return view('users.edit', compact('user'));
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge([
            'picture' => $request->photo ? $request->photo->store('profile', 'public') : null,
            'password' => Hash::make($request->get('password'))
        ])->all());

        return redirect()->route('user.index')->withStatus(__('usuario criado com sucesso!'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
    
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge([
                'picture' => $request->photo ? $request->photo->store('profile', 'public') : $user->picture,
                'password' => Hash::make($request->get('password'))
            ])->except([$hasPassword ? '' : 'password'])
        );
        return redirect()->route('user.index')->withStatus(__('Usuario Atualizado com sucesso!'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
     
        $user->delete($user->id);
        return redirect()->route('users.index')->withStatus(__('Usuário excluido com sucesso! '));
        
    }
}
