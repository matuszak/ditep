<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Ditep\Toner;
use App\Models\Ditep\Impressora;
use App\User;
use Validator;

class TonerController extends Controller
{
    protected $toner;
    public function __construct(Toner $toner)
    {
        $this->toner = $toner;
    }

    public function getIndex()
    {
        $titulo = strtoupper("DITEP - GESTÃO DE toners");
        $toners = $this->toner->orderBy('id', 'desc')->paginate(15);
        return view('ditep.toner.index', compact('titulo', 'toners'));
    }

//add method
    public function getAdd()
    {
        $titulo = strtoupper('DITEP - GESTÃO DE toners > adicionar');
        //$setores = Setor::orderBy('nome')->lists('nome', 'id');
        $impressoras = Impressora::orderBy('modelo')->lists('modelo', 'id');
        return view('ditep.toner.form', compact('titulo', 'impressoras'));
    }

    public function postAdd(Request $request)
    {
        $dataForm = $request->all();
//validação
        $validator = validator($dataForm, Toner::$rules);
        if ($validator->fails()) {
            return redirect("ditep/toners/add")
                ->withErrors($validator)
                ->withInput();
        }
        $this->toner->create($dataForm);
        return redirect('ditep/toners');
    }

//edit method
    public function getEdt($acao, $id)
    {
        $titulo = strtoupper('DITEP - GESTÃO DE toners > editar');
        $toner = $this->toner->find($id);
        $impressoras = Impressora::lists('modelo', 'id');
        return view('ditep.toner.form', ['id' => $id, 'toner' => $toner], compact('titulo', 'acao', 'id', 'toner', 'impressoras'));
    }

    public function postEdt(Request $request, $id)
    {
        $dataForm = $request->except('_token');
//validação
        $validator = validator($dataForm, Toner::$rules);
        if ($validator->fails()) {
            return redirect("ditep/toners/edt/e/{$id}")
                ->withErrors($validator)
                ->withInput();
        }
        $this->toner->where('id', $id)->update($dataForm);
        return redirect('ditep/toners');
    }

    //erase method
    public function getDel($acao, $id)
    {
        $titulo = strtoupper('DITEP - GESTÃO DE toners > deletar/excluir');
        $toner = $this->toner->find($id);
        $impressoras = Impressora::lists('modelo', 'id');
        return view('ditep.toner.form', ['id' => $id, 'toner' => $toner], compact('id', 'acao', 'toner', 'impressoras', 'titulo'));
    }

    public function postDel(Request $request, $id)
    {
        $confirma = $request->only('confirma');
        if ($confirma = true) {
            $toner = $this->toner->find($id);
            $toner->delete();
        }
        return redirect('ditep/toners');

    }
}
