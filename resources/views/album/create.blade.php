@extends('layouts.app')
@section('title', 'Adicionar album')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Adicionar Álbum</h1>
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
                    <a href="{{ route('album.index') }}" class="btn btn-primary">Voltar à Lista</a>
                </div>
            </div>
            <div class="card-body">
                {!! Form::open(['action' => 'AlbunsController@store' ]) !!}
                <div class="row">
                    <div class="col-md-6 pr-4">
                        <div class="form-group">
                            <div class="form-group">
                                {{ Form::label('name', 'Nome:') }}
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('description', 'Descrição:') }}
                            {{ Form::textarea('description', null, [
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
                            {{ Form::select('user_id', $users, null, ['class' => 'form-control', 'placeholder' => 'Selecione...']) }}
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
                        <a href="{{ route('album.index') }}" class="btn btn-danger">Cancelar</a>
                        {{ Form::submit('Adicionar Álbum', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#preco').mask('000.000.000.000.000,00', {reverse: true});
            $('#premium_price').mask('000.000.000.000.000,00', {reverse: true});
        });
    </script>
@endpush
