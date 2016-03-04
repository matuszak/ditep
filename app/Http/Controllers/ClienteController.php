<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Ditep\Cliente;
use App\Models\Ditep\Setor;
use Validator;

class ClienteController extends Controller
{
  public function getIndex()
  {
      $titulo = strtoupper("Clientes Cadastrados");

      $clientes = Cliente::orderBy('nome')->paginate(15);

       return view('ditep.cliente.index', compact('titulo', 'clientes', 'setores'));
  }
//add method
  public function getAdd()
  {
      //$setores = Setor::orderBy('nome')->lists('nome', 'id');
      $setores = Setor::orderBy('nome')->get();
      $titulo = strtoupper('Cadastro de clientes');
      return view('ditep.cliente.form', compact('titulo', 'setores'));
  }
  public function postAdd(Request $request)
  {
      $dataForm = $request->all();
//validação
      $validator = validator($dataForm, Cliente::$rules);
      if( $validator->fails() ){
        return redirect("ditep/clientes/add")
                        ->withErrors($validator)
                        ->withInput();
      }
      Cliente::create($dataForm);
      return redirect ('ditep/clientes');
  }

//edit method
  public function getEdt($acao, $id)
  {
      $titulo = strtoupper("Editando clientes");
      $cliente = Cliente::find($id);
      $setorLoc = $cliente->id_setor;
      $setores = Setor::get();
      return view('ditep.cliente.form', ['id' => $id, 'cliente' => $cliente], compact('titulo', 'acao', 'id', 'cliente', 'setores'));
  }
  public function postEdt(Request $request, $id)
  {
      $dataForm = $request->except('_token');
//validação
      $validator = validator($dataForm, Cliente::$rules);
      if( $validator->fails() ){
        return redirect("ditep/clientes/edt/e/{$id}")
                        ->withErrors($validator)
                        ->withInput();
        }
      Cliente::where('id', $id)->update($dataForm);
      return redirect('ditep/clientes');
  }

  //erase method
  public function getDel($acao, $id)
  {
      $cliente = Cliente::find($id);
      return view('ditep.cliente.form', ['id' => $id, 'cliente' => $cliente], compact('id', 'acao', 'cliente'));
  }
  public function postDel(Request $request, $id)
  {
      $confirma = $request->only('confirma');
      if($confirma = true){
        $cliente = Cliente::find($id);
        $cliente->delete();
      }
      return redirect('ditep/clientes');

  }
}
