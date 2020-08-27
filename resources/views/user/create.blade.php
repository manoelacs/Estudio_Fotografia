@extends('layouts.app')
@section('title', 'Adicionar Usuário')
@section('content')
    <section class="content-header">
        <div class="content-fluid">
            <div class=" row">
                <div class="col-md-6">
                    <h1>Adicionar Usuário</h1>
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
                {!! Form::open(['action' => 'UsersController@store']) !!}
                <div class="row">
                    <div class="col-md-6 pr-4">
                        <div class="form-group">
                            {{ Form::label('name', 'Nome:') }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'E-mail:') }}
                            {{ Form::text('email', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Senha:') }}
                            {{ Form::password('password', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-6 pl-4">
                        <div class="form-group">
                            {{ Form::label('phone', 'Telefone:') }}
                            {{ Form::text('phone', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label(false, 'Nível de acesso') }}
                            <div class="mt-2">
                                @foreach ($roles as $role_name => $role_label)
                                    <div class="form-check-inline">
                                        {{ Form::checkbox('roles[]', $role_name, false, ['class' => 'form-check-input', 'id' => $role_label.'_'.$role_name]) }}
                                        {{ Form::label($role_label.'_'.$role_name, $role_label, ['class' => 'form-check-label']) }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group pt-1">
                            {{ Form::label('password_confirmation', 'Confirmar Senha:') }}
                            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
                        {{ Form::submit('Adicionar usuário', ['class' => 'btn btn-primary']) }}
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
