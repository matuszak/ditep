<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Ditep\Setor;
use Validator;

class SetorController extends Controller
{
    public function getIndex()
    {
        $titulo = strtoupper("DITEP - GESTÃO DE SETORES");
        $setores = setor::orderBy('id', 'desc')->paginate(15);
        return view('ditep.setor.index', compact('titulo', 'setores'));
    }
//add method
    public function getAdd()
    {
        $titulo = strtoupper('DITEP - GESTÃO DE SETORES > adicionar');
        return view('ditep.setor.form', compact('titulo'));
    }
    public function postAdd(Request $request)
    {
        $dataForm = $request->all();
//validação
        $validator = validator($dataForm, setor::$rules);
        if( $validator->fails() ){
            return redirect("ditep/setores/add")
                ->withErrors($validator)
                ->withInput();
        }
        setor::create($dataForm);
        return redirect ('ditep/setores');
    }

//edit method
    public function getEdt($acao, $id)
    {
        $titulo = strtoupper('DITEP - GESTÃO DE IMPRESSORAS > editar');
        $setor = setor::find($id);
        return view('ditep.setor.form', ['id' => $id, 'setor' => $setor], compact('titulo', 'acao', 'id', 'setor'));
    }
    public function postEdt(Request $request, $id)
    {
        $dataForm = $request->except('_token');
//validação
        $validator = validator($dataForm, setor::$rules);
        if( $validator->fails() ){
            return redirect("ditep/setores/edt/e/{$id}")
                ->withErrors($validator)
                ->withInput();
        }
        setor::where('id', $id)->update($dataForm);
        return redirect('ditep/setores');
    }

    //erase method
    public function getDel($acao, $id)
    {
        $titulo = strtoupper('DITEP - GESTÃO DE IMPRESSORAS > deletar/excluir');
        $setor = setor::find($id);
        return view('ditep.setor.form', ['id' => $id, 'setor' => $setor], compact('id', 'acao', 'setor', '$titulo'));
    }
    public function postDel(Request $request, $id)
    {
        $confirma = $request->only('confirma');
        if($confirma = true){
            $setor = setor::find($id);
            $setor->delete();
        }
        return redirect('ditep/setores');

    }
}
