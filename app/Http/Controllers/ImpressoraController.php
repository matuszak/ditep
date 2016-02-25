<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Ditep\Impressora;
use validator;


class ImpressoraController extends Controller
{

  public function getIndex()
  {
      $titulo = strtoupper("Impressoras Cadastradas");
      $impressoras = Impressora::paginate(15);
      return view('ditep.impressora.index', compact('titulo', 'impressoras'));
  }
//add method
  public function getAdd()
  {
      $titulo = strtoupper('Cadastro de impressora');
      return view('ditep.impressora.form', compact('titulo'));
  }
  public function postAdd(Request $request)
  {
      $dataForm = $request->all();
      $validator = validator($dataForm, $rules);
      if( $validator->fails() ){
        return redirect('ditep/impressoras/add')->withErrors($validator)->withInputs();
      }
      Impressora::create($dataForm);
      return redirect ('ditep/impressoras');
  }

//edit method
  public function getEdt($acao, $id)
  {
      $titulo = strtoupper("Editando impressora");
      $impressora = Impressora::find($id);
      return view('ditep.impressora.form', ['id' => $id, 'impressora' => $impressora], compact('titulo', 'acao', 'id', 'impressora'));
  }
  public function postEdt(Request $request, $id)
  {
      $dataForm = $request->except('_token');
      Impressora::where('id', $id)->update($dataForm);
      return redirect('ditep/impressoras');
  }

  //erase method
  public function getDel($acao, $id)
  {
      $impressora = Impressora::find($id);
      return view('ditep.impressora.form', ['id' => $id, 'impressora' => $impressora], compact('id', 'acao', 'impressora'));
  }
  public function postDel(Request $request, $id)
  {
      $confirma = $request->only('confirma');
      if($confirma = true){
        $impressora = Impressora::find($id);
        $impressora->delete();
      }
      return redirect('ditep/impressoras');

  }

}
