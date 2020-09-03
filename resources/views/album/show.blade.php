@extends('layouts.app')
@section('title', 'Visualizar Álbum')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Álbum: {{$album->name}}</h1>
                </div>

                <div class="col-md-6">
                </div>
            </div>
        </div>
    </section>
    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <a href="{{ route('albuns.index') }}" class="btn btn-primary">Voltar à Lista</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 pr-4">
                        <div class="form-group">
                            <div class="form-group">
                                 'Nome: {{$album->name}}
                            </div>
                        </div>
                        <div class="form-group">
                            Descrição: {{$album->description}}

                        </div>
                    </div>
                    <div class="col-md-6 pl-4">

                        <div class="form-group">
                            Usuário: {{$album->user_id}}
                        </div>
                        <div class="form-group">
                            <div>
                                Status: {{$album->statusName()}}
                            </div>
                            <div>
                                {!! Form::open([
                                        'action' => ['Photos@Controller.create', $album->id],
                                        'onsubmit' =>"return confirm('Tem certeza que deseja remover {{ addslashes( $album->name )}}?')",
                                        'method' => 'GET'])
                                 !!}
                                <button class="btn btn-info btn-sm mr-1">
                                    <i class="fas fa-edit">Adicionar Fotos</i>
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 text-right">

                        {!! Form::open([
                                       'action' => ['AlbunsController@edit', $album->id],
                                       'onsubmit' =>"return confirm('Tem certeza que deseja remover {{ addslashes( $album->name )}}?')",
                                       'method' => 'PITCH'])
                        !!}
                        <button class="btn btn-info btn-sm mr-1">
                            <i class="fas fa-edit">Editar Álbum</i>
                        </button>
                        {!! Form::close() !!}

                        {!! Form::open([
                                        'action' => ['AlbunsController@destroy', $album->id],
                                        'onsubmit' =>"return confirm('Tem certeza que deseja remover {{ addslashes( $album->name )}}?')",
                                        'method' => 'DELETE'])
                         !!}
                        <button class="btn btn-danger">
                            <i class="fas fa-trash-alt">Deletar Álbum</i>
                        </button>
                        {!! Form::close() !!}

                        <a href="{{ route('album.index') }}" class="btn btn-danger">Cancelar</a>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
