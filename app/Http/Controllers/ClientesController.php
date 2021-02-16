<?php
    namespace App\Http\Controllers;
    use App\Cliente;
    use Illuminate\Http\Request;

    class ClientesController extends Controller {
        public function index(){
            return view("clientes.clientes_index",["clientes" => Cliente::all()]);
        }

        public function create(){
            return view("clientes.clientes_create");
        }

        public function store(REQUEST $request){
            (new Cliente($request->input()))->saveOrFail();
            return redirect()->route("clientes.index")->with("mensaje", "Cliente agregado");
        }

        public function show(Cliente $cliente){

        }

        public function edit(Cliente $cliente){
            return view("Clientes.clientes_edit",["cliente"=> $cliente]);
        }

        public function update(Request $request, Cliente $cliente)
        {
            $cliente->fill($request->input());
            $cliente->saveOrFail();
            return redirect()->route("clientes.index")->with("mensaje", "Cliente actualizado");
        }

        public function destroy(Cliente $cliente){
            $cliente->delete();
            return redirect()->route("clientes.index")->with("mensaje", "Cliente eliminado");
        }
    }
?>