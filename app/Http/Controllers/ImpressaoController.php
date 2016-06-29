<?php

namespace App\Http\Controllers;

use App\Models\Ditep\Impressao;
use App\Models\Ditep\Setor;
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
    protected $cliente, $impressora, $toner, $setor, $impressao;
    public function __construct(Impressao $impressao, Cliente $cliente, Toner $toner, Setor $setor, Impressora $impressora)
    {
        $this->impressao    = $impressao;
        $this->impressora   = $impressora;
        $this->cliente      = $cliente;
        $this->setor        = $setor;
        $this->toner        = $toner;
    }

    public function getIndex()
    {
        $titulo = strtoupper("DITEP - GESTÃO DE IMPRESSÕES");
        $impressoes = $this->impressao->orderBy('id')->paginate(15);
        return view('ditep.impressao.index', compact('titulo', 'impressoes'));
    }
//add method
    public function getAdd()
    {
        $titulo = strtoupper('DITEP - GESTÃO DE impressÕes > adicionar');
        $toners = $this->toner->orderBy('dia_recarga')->lists('dia_recarga', 'id', 'id_impressora');
        $clientes = $this->cliente->orderBy('nome')->lists('nome', 'id');
        $impressoras = $this->impressora->get()->lists('modelo', 'id');

        $impres = $this->impressora->get();
        $tons   =   $this->toner->orderBy('dia_recarga', 'desc')->get();
        return view('ditep.impressao.form', compact('titulo', 'clientes', 'toners', 'impressoras', 'impres', 'tons'));
    }
    public function postAdd(Request $request)
    {

    $dataForm = $request->all();
    //validação
        $validator = validator($dataForm, Impressao::$rules);
        if( $validator->fails() ){
            return redirect("ditep/impressoes/add")
                ->withErrors($validator)
                ->withInput();
        }
        dd($dataForm->rel());
        dd($this->impressao->create($dataForm));
        return redirect ('ditep/impressoes');
    }

//edit method
    public function getEdt($acao, $id)
    {
        $titulo = strtoupper('DITEP - GESTÃO DE impressÕes > editar');
        $impressao = $this->impressao->find($id);
        $setores = $this->setor->lists('nome', 'id');
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
        $this->impressao->where('id', $id)->update($dataForm);
        return redirect('ditep/impressoes');
    }

    //erase method
    public function getDel($acao, $id)
    {
        $titulo = strtoupper('DITEP - GESTÃO DE impressÕes > deletar/excluir');
        $impressao = $this->impressao->find($id);
        $setores = $this->setor->lists('nome', 'id');
        return view('ditep.impressao.form', ['id' => $id, 'impressao' => $impressao], compact('id', 'acao', 'impressao', 'setores', 'titulo'));
    }
    public function postDel(Request $request, $id)
    {
        $confirma = $request->only('confirma');
        if($confirma = true){
            $impressao = $this->impressao->find($id);
            $impressao->delete();
        }
        return redirect('ditep/impressoes');

    }
}
