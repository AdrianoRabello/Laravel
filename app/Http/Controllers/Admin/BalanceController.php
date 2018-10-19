<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;

class BalanceController extends Controller
{
    //

    public function index()
    {
      //  pega os dados do usuario
      //dd(auth()->user());,
      //dd(auth()->user()->balance());
      $balance = auth()->user()->balance;

      $amount = $balance? $balance->amount : 0;
      return view('admin.balance.index',compact('amount'));
    }

    public function deposit()
    {
      return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request)
    {
      //return dd($request->all());
      //$data = $request->only(['amount']);

      $balance =  auth()->user()->balance()->firstOrCreate([]);

      //passa para o metodo deposit o valor do campo amount que veio do request

       $response = $balance->deposit($request->amount);


       // se a responta for success como true ele encaminha para rota com success true e com a mensagem que definimos
       if ($response['success']) {
         return redirect()->route('admin.balance')
                          ->with('success',$response['message']);
       }else{

         return redirect()->back()->with('error',$response['message']);
       }


    }

    public function withdraw()
    {
      return view('admin.balance.withdraw');
    }



    // meotdo para realizar retirada
    public function withdrawStore(MoneyValidationFormRequest $request)
    {
      //return "teste";
      //return dd($request->all());
      //$data = $request->only(['amount']);

      $balance = auth()->user()->balance()->firstOrCreate([]);

      //passa para o metodo deposit o valor do campo amount que veio do request

      $response = $balance->withdraw($request->amount);


       // se a responta for success como true ele encaminha para rota com success true e com a mensagem que definimos
       if ($response['success']) {
         return redirect()->route('admin.balance')
                          ->with('success',$response['message']);
       }else{

         return redirect()->back()->with('error',$response['message']);
       }
    }

    public function transfer()
    {
      return view('admin.balance.transfer');
    }


    public function confirmTransfer(Request $request)
    {

      return dd($request->sender);
    }
}
