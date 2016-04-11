<?php

namespace App\Models\Ditep;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Toner extends Model
{
    protected $guarded = ['id'];

    static $rules = [];


//resgatar nome do modelo da impressora
    public function getImpressoraModelo()
    {
        return Impressora::where('id', $this->id_impressora)->first()->modelo;
    }
//resgatar nome do Usuário do sistema
    public function getUserNome()
    {
        return User::where('id', $this->id_user)->first()->name;
    }
}
