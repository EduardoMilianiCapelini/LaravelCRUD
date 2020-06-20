@extends('templates.template')

@section('content')
    <h1 class="text-center">Profissionais da saúde</h1> <hr>
    <h3 class="text-center"> Procure, cadastre e divulgue aqui os profissionais da saúde que você conhece</h3>
    <div class="text-center mt-3 mb-4">
        <a href="{{url("dr/create")}}">
          <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>
    <div class="col-10 m-auto">
        @csrf
        <table class="table text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Profissão</th>
      <th scope="col">Endereco</th>
      <th scope="col">Preço da consulta (R$)</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
    @foreach($medico as $medicos)
    @php
        $user=$medicos->find($medicos->id)->relUsers;
    @endphp
    <tr>
      <th scope="row">{{$medicos->id}}</th>
      <td>{{$medicos->name}}</td>
      <td>{{$medicos->activities}}</td>
      <td>{{$user->name}}</td>
      <td>{{$medicos->price}}</td>
      <td>
        <a href="{{url("dr/$medicos->id")}}">
          <button class="btn btn-primary">Visualizar</button>
        </a>
        <a href="{{url("dr/$medicos->id/edit")}}">
          <button class="btn btn-dark">Editar</button>
        </a>
        <a href="{{url("dr/$medicos->id")}}" class="js-del">
          <button class="btn btn-danger">Deletar</button>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$medico->links()}}
    </div>
@endsection
