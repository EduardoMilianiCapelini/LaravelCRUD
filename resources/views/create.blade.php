@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($medico))Editar @else Cadastrar @endif</h1> <hr>
    
    <div class="col-8 m-auto">

            @if(isset($errors) && count($errors)>0)
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach($errors->all() as $erro)
                        {{$erro}}<br>
                    @endforeach
                </div>

            @endif

            @if(isset($medico))
                <form name="formEdit" id="formEdit" method="post" action="{{url("dr/$medico->id")}}">
                @method('PUT')
            @else
                <form name="formCad" id="formCad" method="post" action="{{url('dr')}}">
            @endif

        <form name="formCad" id="formCad" method="post" action="{{url('dr')}}">
            @csrf
            <input class="form-control" type="text" name="name" id="name" placeholder="Nome:" value="{{$medico->name ?? ''}}"><br>
            <select class="form-control"name="id_user" id="id_user">
                <option value="{{$medico->relUsers->id ?? ''}}">{{$medico->relUsers->name ?? 'Endereco'}}</option><br>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option> <br>
                @endforeach
            </select><br>
            <input class="form-control" type="text" name="activities" id="activities" placeholder="Profissao:" value="{{$medico->activities ?? ''}}"><br>
            <input class="form-control" type="text" name="price" id="price" placeholder="Preco da consulta:"  value="{{$medico->price ?? ''}}"><br>
            <input class="btn btn-primary mt-3" type="submit" value="@if(isset($medico))Editar @else Cadastrar @endif">
        </form>

    </div>
@endsection
