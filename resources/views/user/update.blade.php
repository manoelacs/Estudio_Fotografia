@extends('layouts.app')
@section('title', 'Editar usuário')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Editar Usuário</h1>
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
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Voltar à Lista</a>
                </div>
            </div>
            <div class="card-body">
                {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'PATCH']) !!}
                <div class="row">
                    <div class="col-md-6 pr-4">
                        <div class="form-group">
                            {{ Form::label('name', 'Nome:') }}
                            {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'E-mail:') }}
                            {{ Form::text('email', $user->email, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Nova senha:') }}
                            {{ Form::password('password', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-6 pl-4">
                        <div class="form-group">
                            {{ Form::label('phone', 'Telefone:') }}
                            {{ Form::text('phone', $user->phone, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label(false, 'Nível de acesso') }}
                            <div class="mt-2">
                                <label>
                                    {!! Form::radio('role_id', '1', false) !!}
                                    Admnistrador
                                </label>
                                <label>
                                    {!! Form::radio('role_id', '2', true) !!}
                                    Usuário
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
                        {{ Form::submit('Atualizar usuário', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#phone').mask('(00) 00000-0000');
        });
    </script>
@endpush
