@extends('templates.template')

@section('content')
    <h1 class="text-center">La Casa do Pastel</h1> <hr>

    <div class="col-8 m-auto">
        @csrf
        <table class="table text-center">
            <thead >
            <tr>
                <th scope="col">Numero</th>
                <th scope="col">Cliente</th>
                <th scope="col">Sabor</th>
                <th scope="col">Preço</th>
                <th scope="col">Quantidade</th>
                <th scope="col">O que deseja? </th>
            </tr>
            </thead>
            <tbody>

            @foreach($pedido as $pedidos)
                @php
                    $user=$pedidos->find($pedidos->id)->relUsers;
                @endphp
                <tr>
                    <th scope="row">{{$pedidos->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$pedidos->sabor}}</td>
                    <td>{{$pedidos->price}}</td>
                    <td>{{$pedidos->quantidade}}</td>
                    <td>
                        <a href="{{url("pedidos/$pedidos->id")}}">
                            <button class="btn btn-outline-success">Ver Pedido</button>
                        </a>

                        <a href="{{url("pedidos/$pedidos->id/edit")}}">
                            <button class="btn btn-outline-success">Alterar Pedido</button>
                        </a>

                        <a href="{{url("pedidos/$pedidos->id")}}" class="js-del">
                            <button class="btn btn-outline-danger">Cancelar Pedido</button>
                        </a>
                    </td>
                </tr>
                
            @endforeach
            </tbody>
           
        </table>
        <div class="text-center mt-3 mb-4">
            <a href="{{url('pedidos/create')}}">
                <button class="btn btn-success btn-block">Novo Pedido</button>
            </a>
        </div>
    </div>
@endsection

