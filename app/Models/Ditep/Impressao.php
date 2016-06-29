<?php

namespace App\Models\Ditep;

use Illuminate\Database\Eloquent\Model;

class Impressao extends Model
{
    protected $table = 'impressoes';
    protected $guarded = ['id'];

    static $rules = [];
}
