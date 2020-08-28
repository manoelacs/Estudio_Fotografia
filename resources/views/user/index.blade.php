@extends('layouts.app')
@section('title', 'Usuários')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Usuários</h1>
                </div>

                <div class="col-md-6">
                    {{ Form::open(['action' => 'UsersController@index', 'method' => 'GET', 'class' => '']) }}
                    <div class="input-group">
                        {{ Form::text('q', app('request')->input('q'), ['class' => 'form-control', 'placeholder' => 'Pesquise pelo nome ou e-mail...']) }}
                        <span class="input-group-append">
                                {{ Form::button('<i class="fa fa-search"></i> Pesquisar', ['type' => 'submit', 'class' => 'btn btn-default']) }}
                            </span>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>

    <div class="content">
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-fw fa-user"></i></h3>
                <div class="card-tools">
                    @if(Auth::user()->isAdmin())
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Adicionar novo</a>
                    @endif
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (@isset($users) && !$users->isEmpty())
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ implode(",", $user->getRoleNames()->all()) }}</td>
                                <td>
                                    {!! $user->status ? '<span class="badge bg-success">Ativo</span>' : '<span class="badge bg-danger">Inativo</span>' !!}
                                </td>
                                <td>
                                    @hasanyrole('root|admin')
                                    <a href="{{ route('users.edit', $user->id) }}">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE', 'style="display: inline-block"', 'id' => 'delete-user-form-'.$user->id]) !!}
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Deseja continuar?')) { document.getElementById('delete-user-form-{{ $user->id }}').submit();}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    {!! Form::close() !!}
                                    @endhasanyrole
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
