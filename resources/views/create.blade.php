@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($pedido))Alterar Pedido @else Novo Pedido @endif</h1> <hr>

    <div class="col-8 m-auto ">
        
        @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $erro)
               {{$erro}}  
            @endforeach
        
        </div>
        @endif
        
        @if(isset($pedido))
            <form name="formEdit" id="formEdit" method="post" action="{{url("pedidos/$pedido->id")}}">
            @method("PUT")
        @else
            <form name="formCad" id="formCad" method="post" action="{{url("pedidos" )}}">
        @endif

        
        @csrf
        <input  class="form-control" type="text" name="sabor" id="sabor" placeholder="Sabor" value="{{$pedido->sabor ?? ''}}" required> <br>
        <select class="form-control" name="id_user" id="id_user" required>
            <option value="{{$pedido->relUsers->id ?? ''}}">{{$pedido->relUsers->name ?? 'Cliente'}}</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select> <br>
        <input  class="form-control" type="text" name="quantidade" id="quantidade" placeholder="Quantidade" value="{{$pedido->pages ?? ''}}" required> <br>
        <input  class="form-control" type="text" name="price" id="price" placeholder="Preço" value="{{$pedido->price ?? ''}}" required> <br>
        <input class="btn btn-outline-success btn-block" type="submit" value="@if(isset($pedido))Alterar Pedido @else Efetuar Pedido @endif" > 

        </form>
    </div>
@endsection
