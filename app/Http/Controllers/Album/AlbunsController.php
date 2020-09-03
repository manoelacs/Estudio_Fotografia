<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class AlbunsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //list todos os albuns
      // $albuns = Album::all();
        if ($request->has('q')){
            $albuns = Album::where('name', 'LIKE', "%{$request->get('q')}%")
                ->orderBy('create_at')
                ->paginate(12);
        }
        else{
            $albuns = Album::orderBy('creat_at')->paginate(12);
        }
        Flash::success('Lista de Álbuns');
        return view('album.index', compact('albuns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->pluck('name', 'id');
        return view('albuns.create', compact('users'));
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
            $album = Album::create($inputs);
            Flash::success('Album criado com sucesso.');
            return redirect()->route('albuns.show', compact('album->id'));
        }
        catch (\Exception $exception){
            Flash::error($exception->getMessage());
            return redirect()->back();
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
        $album = Album::findOrFail($id);
        return view('albuns.show', compact('album'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('albuns.update', compact('album'));
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
        $inputs = $request->all();
        $album = Album::findOrFail($id);
        try {
            if($album->nome != $request['nome'] || $album->description != $request['description']){
                $album->update($inputs);
            }
            Flash::success('Álbum atualizado com sucesso.');
            return redirect()->route('albuns.index');

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
        $album = Album::findOrFail($id);

        try {
            $album->delete($id);

            Flash::success('Album excluído com sucesso.');

            return redirect()->back();
        } catch (\Exception $e) {
            Flash::error($e->getMessage());

            return redirect()->back();
        }
    }
}
