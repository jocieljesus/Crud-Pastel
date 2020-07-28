<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoRequest;
use App\Models\ModelPedido;
use App\User;

class PedidoController extends Controller
{      
        private $objUser;
        private $objPedido;

        public function __construct(){
            $this->objUser = new User();
            $this->objPedido = new ModelPedido();
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {   
            $pedido=$this->objPedido->all();
            return view('index', compact('pedido'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=$this->objUser->all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoRequest $request)
    {
       $cad=$this->objPedido->create([
            'sabor'=>$request->sabor,
            'quantidade'=>$request->quantidade,
            'price'=>$request->price,
            'id_user'=>$request->id_user
        ]);
        if($cad){
            return redirect('pedidos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido=$this->objPedido->find($id);
        return view('show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido=$this->objPedido->find($id);
        $users=$this->objUser->all();
        return view('create', compact('pedido', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PedidoRequest $request, $id)
    {
        $this->objPedido->where(['id'=>$id])->update([
            'sabor'=>$request->sabor,
            'quantidade'=>$request->quantidade,
            'price'=>$request->price,
            'id_user'=>$request->id_user
        ]);
        return redirect('pedidos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del= $this->objPedido->destroy($id);
        return ($del)? "sim": "não";
    }
}
