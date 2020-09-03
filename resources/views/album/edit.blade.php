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
                <div class="row mt-5">
                    {!! Form::model($album, ['route' => ['AlbunsController@update', $album->id], 'class' => 'form']) !!}

                    <div class="col-md-12 text-right">
                        <a href="{{ route('album.index') }}" class="btn btn-danger">Cancelar</a>
                        {{ Form::submit('Editar Álbum', ['class' => 'btn btn-primary']) }}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
