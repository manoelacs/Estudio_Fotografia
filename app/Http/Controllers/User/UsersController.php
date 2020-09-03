<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Flash;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('q')){
            $users = User::where('name', 'LIKE', "%{ $request->get('q')}%")
                ->orWhere('email', 'LIKE', "%{$request->get('q')}%")
                ->orderBy('create_at', 'DESC')
                ->paginate(12);
        }
        else{
            $users = User::orderBy('create_at', 'DESC')->paginate(12);
        }
        #$mensagem = $request->session()->get( 'Lista de Clientes');
        Flash::success('Lista de Clientes');
        return view('user.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $inputs = $request->all();
        try {
            $inputs['password'] = Hash::make($request['password']);
            $inputs['phone'] = preg_replace('/[^0-9]/', '', (string)$request['phone']);
            $user = User::create($inputs);
            Flash::success('Usuário criado com sucesso.');
            return redirect()->route('users.index');
        }
        catch (\Exception $exception){
            Flash::error($exception->getMessage());
            redirect()->back();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $inputs = $request->all();
        $user =  User::findOrFail($id);
        try {
            if($inputs->password){
                $user->password = Hash::make($request->password);
            }
            $user->update($inputs);
            Flash::success('Usuário atualizado com sucesso.');
            return redirect()->route('users.index');
        }
        catch (\Exception $exception){
            Flash::error($exception->getMessage());
            return redirect()->back();

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
        try {
            $user = User::findOrFail($id);
            $user->delete($id);
            Flash::sucess("Usuário removido com sucesso.");
            return redirect()->back();
        }
        catch (\Exception $exception){
            Flash::error($exception->getMessage());
            return redirect()->back();
        }
    }
}
