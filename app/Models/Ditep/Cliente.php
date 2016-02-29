<?php

namespace App\Models\Ditep;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    //
    protected $guarded = ['id'];

    static $rules = [
      'nome' => 'required|min:10|max:40',
      'setor' => 'required|min:6|max:25',
      'materia' => 'required|max:25',
      'email' => 'required|min:8|max:50',
      'fone' => 'required|min:8|max:15', //min sem ddd, max +55(69)
      'fone2'
    ];
}
