<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();

        return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = hash::make($request->password);
        if($user->save()){
            $MailService = new \App\Service\MailService(
                "Usuário criado com Sucesso!", 
                1,
                $user->email
            );
            $MailService->toSend();

            return response()->json(["sucess" => "Usuário criado com sucesso"]);
        }else{
            return response()->json(["error" => "Erro ao criar usuário"]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);

        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
            $data = $request->only(['name', 'email']);
            $user = User::where('id', $id)->update($data);
    
            if($user){
                $MailService = new \App\Service\MailService(
                    "Usuário atualizado com Sucesso!", 
                    2,
                    $request->email
                );
                $MailService->toSend();
                return response()->json(["sucess" => "Usuário atualizado com sucesso"]);
            }else{
                return response()->json(["error" => "Erro ao atualizar usuário"]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);

        if( $user->delete() ) {
            $MailService = new \App\Service\MailService(
                "Usuário deletado com Sucesso!", 
                1,
                $user->email
            );
            $MailService->toSend();
            return response()->json(["sucess" => "Usuário deletado com sucesso"]);
        }else{
            return response()->json(["error" => "Erro ao deletar usuário"]);
        }
    }
}
