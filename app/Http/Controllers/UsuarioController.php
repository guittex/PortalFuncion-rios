<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {
        $validatedData =  array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
        );

        $validator = Validator::make($request->all(), $validatedData);   

        if ($validator->fails()){

            \Session::flash('flash_message',[
                "msg" => "Existem campos vazio ou o email já existe",
                "class" => "alert-danger"
            ]);

            //Retorna para view
            return redirect()->route('dashboard');
        }else{
            
            User::create($request->all());

            \Session::flash('flash_message',[
                'msg' => 'Criado com sucesso',
                'class' => 'alert-success'
            ]);

            return redirect()->route('dashboard');
        }

    }
    public function update(Request $request, $id)
    {
        $validatedData =  array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        );

        $validator = Validator::make($request->all(), $validatedData);   

        if ($validator->fails()){

            \Session::flash('flash_message',[
                "msg" => "Existem campos vazio",
                "class" => "alert-danger"
            ]);

            //Retorna para view
            return redirect()->route('dashboard');
        }else{

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->password != null){
                $user->password = bcrypt($request->password);
            }
            $user->save();

            \Session::flash('flash_message',[
                'msg' => 'Atualizado com sucesso',
                'class' => 'alert-success'
            ]);

            return redirect()->route('dashboard');
        }
        }

    
}
