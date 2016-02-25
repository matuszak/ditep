<?php

namespace App\Models\Ditep;

use Illuminate\Database\Eloquent\Model;

class impressora extends Model
{
    protected $guarded = ['id'];

//regras de validação para impressoras;
    static $rules = [
      'modelo' => 'required|min:3|max:30',
    ];
}
