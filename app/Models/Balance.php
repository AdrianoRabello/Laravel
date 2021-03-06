<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;




class Balance extends Model
{
    //

    public $timestamps = false;

    protected $fillable = ['amount'];







    public function deposit(float $value): Array
    {
      //dd($value);

      //dd($value);
      DB::beginTransaction();
      // verifica se tem saldo, se não tover coloca 0 em tolaBefore
      $totalBefore = ($this->amount)? $this->amount: 0;
      $this->amount +=  number_format($value,2,'.','');
      $deposit = $this->save();

      $historic = auth()->user()->historics()->create([
                                          'type'          => 'I',
                                          'amount'        => $value,
                                          'total_before'  => $totalBefore,
                                          'total_after'   => $this->amount,
                                          'date'          => date('Ymd')
                                          ]);

      if ($deposit && $historic) {

        DB::commit();
        return [
          'success' => true,
          "message" => "Suceso ao recarregar"
        ];
      }

      DB::rollback();

      return [
        'success' => false,
        "message" => "Falha ao recarregar"
      ];
    }



    public function withdraw(float $value) : Array
    {

      if($this->amount < $value)
      {
          return [
            'success'  =>  false,
            'message'  => 'saldo insuficiente'
          ];


      }

      // começa uma transaçã no BD
      DB::beginTransaction();
      // verifica se tem saldo, se não tover coloca 0 em tolaBefore
      $totalBefore = ($this->amount)? $this->amount: 0;
      $this->amount -=  number_format($value,2,'.','');
      $withdraw = $this->save();

      $historic = auth()->user()->historics()->create([
                                            'type'          => 'O',
                                            'amount'        => $value,
                                            'total_before'  => $totalBefore,
                                            'total_after'   => $this->amount,
                                            'date'          => date('Ymd')
                                          ]);

      if ($withdraw && $historic) {

        DB::commit();
        return [
          'success' => true,
          "message" => "Suceso ao sacar"
        ];
      }

      DB::rollback();

      return [
        'success' => false,
        "message" => "Falha ao sacar"
      ];

    }

    // pega o valor do campo amount e adiciona mais 30
    public function getAmountAttribute($value)
    {
      return $value;

    }

    // atribui ao valor de amount o valor que vem em value
    public function setAmountAttribute($value)
    {
      $this->attributes['amount'] =+ $value;

    }


    




}
