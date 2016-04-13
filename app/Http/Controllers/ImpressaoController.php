<?php

namespace App\Http\Controllers;

use App\Models\Ditep\Impressao;
use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Models\Ditep\Setor;
use App\Models\Ditep\Toner;
use App\Models\Ditep\Cliente;
use App\Models\Ditep\Impressora;
use Validator;

class ImpressaoController extends Controller
{
    public function getIndex()
    {
        $titulo = strtoupper("DITEP - GESTÃO DE IMPRESSÕES");
        $impressoes = Impressao::orderBy('id')->paginate(15);
        return view('ditep.impressao.index', compact('titulo', 'impressoes'));
    }
//add method
    public function getAdd()
    {
        $titulo = strtoupper('DITEP - GESTÃO DE impressÕes > adicionar');
        $toners = Toner::orderBy('dia_recarga')->lists('dia_recarga', 'id', 'id_impressora');
        $clientes = Cliente::orderBy('nome')->lists('nome', 'id');
        $impressoras = Impressora::get()->lists('modelo', 'id');
        return view('ditep.impressao.form', compact('titulo', 'clientes', 'toners', 'impressoras'));
    }
    public function postAdd(Request $request)
    {

    dd($dataForm = $request->all());
    //validação
        $validator = validator($dataForm, Impressao::$rules);
        if( $validator->fails() ){
            return redirect("ditep/impressoes/add")
                ->withErrors($validator)
                ->withInput();
        }
        Impressao::create($dataForm);
        return redirect ('ditep/impressoes');
    }

//edit method
    public function getEdt($acao, $id)
    {
        $titulo = strtoupper('DITEP - GESTÃO DE impressÕes > editar');
        $impressao = Impressao::find($id);
        $setores = Setor::lists('nome', 'id');
        return view('ditep.impressao.form', ['id' => $id, 'impressao' => $impressao], compact('titulo', 'acao', 'id', 'impressao', 'setores'));
    }
    public function postEdt(Request $request, $id)
    {
        $dataForm = $request->except('_token');
//validação
        $validator = validator($dataForm, Impressao::$rules);
        if( $validator->fails() ){
            return redirect("ditep/impressoes/edt/e/{$id}")
                ->withErrors($validator)
                ->withInput();
        }
        Impressao::where('id', $id)->update($dataForm);
        return redirect('ditep/impressoes');
    }

    //erase method
    public function getDel($acao, $id)
    {
        $titulo = strtoupper('DITEP - GESTÃO DE impressÕes > deletar/excluir');
        $impressao = Impressao::find($id);
        $setores = Setor::lists('nome', 'id');
        return view('ditep.impressao.form', ['id' => $id, 'impressao' => $impressao], compact('id', 'acao', 'impressao', 'setores', 'titulo'));
    }
    public function postDel(Request $request, $id)
    {
        $confirma = $request->only('confirma');
        if($confirma = true){
            $impressao = Impressao::find($id);
            $impressao->delete();
        }
        return redirect('ditep/impressoes');

    }
}
