<?php

namespace App\Models\Ditep;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $guarded = ['id'];

    static $rules = [
      'nome' => 'required|min:3|max:40',
      'id_setor' => 'required|integer',
      'materia' => 'max:25',
      'email' => 'required|min:8|max:50',
      'fone' => 'required|min:8|max:15', //min sem ddd, max +55(69)
      'fone2'
    ];


    public function getNomeSetor(){
        return Setor::where('id', $this->id_setor)->first()->nome;
    }

    /*

    public function setor(){
        return $this->belongsTo('App\Models\Ditep\Setor');
    }
    */
}
