<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Historic extends Model
{
    //
    protected $fillable = ['type','amount','total_before','total_after','user_id_transaction','date'];



    // retornando a data no formato certo
    public function getDateAttribute($value)
    {
      $date = date_create($value);
      return $date->format('d-m-Y');
    }


    // lista todas as transações registradas no BD
    public function Transacoes()
    {
      return Historic::get(['amount','total_before','total_after','date','type']);
    }

    public function getTypeAttribute($value)
    {
      if ($this->attributes['type'] == 'I') {

        return "Depostito";

      }else if($this->attributes['type'] == 'O'){

        return "Saque";
      }else if($this->attributes['type'] == 'T'){

        return "Tranferência";
      }
    }
}
