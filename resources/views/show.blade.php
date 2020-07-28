@extends('templates.template')

@section('content') 
    <h1 class="text-center">Pedido</h1> <hr>

    <div class="col-8 m-auto card" style="width: 20rem;">

    @php
        $user=$pedido->find($pedido->id)->relUsers;
    @endphp

        Sabor: {{$pedido->sabor}} <br>
        Quantidade: {{$pedido->quantidade}} <br>
        Preço: R$ {{$pedido->price}} <br>
        Cliente: {{$user->name}} <br>
        Email: {{$user->email}} <br>
        
    </div>
@endsection