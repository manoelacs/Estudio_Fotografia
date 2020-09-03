@extends('layouts.app')
@section('title', 'Editar Álbum')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Editar Álbum</h1>
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
                {!! Form::open(['action' => ['AlbunsController@update', $album->id], 'method' => 'PATCH']) !!}
                <div class="row">
                    <div class="col-md-6 pr-4">
                        <div class="form-group">
                            <div class="form-group">
                                {{ Form::label('name', 'Nome:') }}
                                {{ Form::text('name', $album->name, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('description', 'Descrição:') }}
                            {{ Form::textarea('description', $album->description, [
                                                'class' => 'form-control',
                                                'id' => 'description_id',
                                                'placeholder' => 'Descreva seu álbum ...'
                                                ]
                             )}}
                        </div>
                    </div>
                    <div class="col-md-6 pl-4">

                        <div class="form-group">
                            {{ Form::label('user_id', 'Usuário:') }}
                            {{ Form::select('user_id', $users, $album->user_id, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">

                            <div>
                                {{ Form::hidden('status_id', 0) }}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('albuns.index') }}" class="btn btn-danger">Cancelar</a>
                        {{ Form::submit('Editar Álbum', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
