<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;

use Illuminate\Http\Request;


class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
       
        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
           
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/avatar'), $imageName);
            //for update in table
            auth()->user()->update(['picture' => '/img/avatar/'.$imageName]);
            return back()->withStatus(__('Imagem Perfil atualizado com sucesso!'));
          
            
        }else{
           
            return back()->withStatus(__('Imagem do Perfil não atualizado !'));
        }

        auth()->user()->update($request->all());

        return back()->withStatus(__('Perfil atualizado com sucesso!'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Senha atualizada com sucesso'));
    }
}
