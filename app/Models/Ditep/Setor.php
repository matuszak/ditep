<?php

namespace App\Models\Ditep;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'setores';
    protected $guarded = ['id'];


//regras de validação para impressoras;
    static $rules = [
        'nome' => 'string|unique:setores,nome|required|min:3|max:30',
    ];
}
