<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
Use App\User;

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


    public function teste()
    {
      return view('admin.balance.teste');
    }


    public function confirmTransfer(Request $request, User $user)
    {
      //procura o usuario pelo email ou nome
      $sender = $user->getSender($request->sender);
      if (!$sender) {
        return redirect()
               ->back()
               ->with('error','Usuario não encontrado');
      }

      if ($sender->id === auth()->user()->id) {
        return redirect()
               ->back()
               ->with('error','Não pode transferir para você mesmo');
      }

      $balance = auth()->user()->balance;

      return view('admin.balance.transfer-confirm',compact('sender','balance'));

    }

    public function transferStore(MoneyValidationFormRequest $request, User $user)
    {
      //dd($request->all());

      if(!$user->find($request->sender_id))
      {
        return redirect()->route('admin.balance')
                         ->with('error','Receptor não encontrado');
      }

      return "teste";
      //$balance = auth()->user()->blance()->firstOrCreate([]);

      //$response = $balance->transfer($request->value);

      /*if ($response['success']) {
        return redirect()->route('admin.balance')
                         ->with('success',$response['message']);
      }else{

        return redirect()->back()->with('error',$response['message']);
      }*/


    }
}
