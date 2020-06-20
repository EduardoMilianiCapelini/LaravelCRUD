@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1> <hr>
    
    <div class="col-8 m-auto">
    @php
        $user=$medico->find($medico->id)->relUsers;
    @endphp
        Nome: {{$medico->name}}<br>
        Profissao: {{$medico->activities}}<br>
        Preço: R${{$medico->price}}<br>
        Endereço: {{$user->name}} <br>
    </div>
@endsection
