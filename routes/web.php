<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// define que esse grupo de rota
$this->group(['middleware'=>'auth','namespace'=>'Admin','prefix'=>'admin'],function(){

  $this->get('/','AdminController@index')->name('admin.home');

  $this->get('balance','BalanceController@index')->name('admin.balance');

  $this->get('deposit','BalanceController@deposit')->name('balance.deposit');

  // a rota /admin/deposit realiza um metodo post para o metodo  depositStore. O nome da rota definida no furmulario é deposit.store.
  // isso é usado somente para renomear a rota
  $this->post('deposit','BalanceController@depositStore')->name('deposit.store');


  $this->get('withdrawn','BalanceController@withdraw')->name('balance.withdraw');

  $this->post('withdrawn','BalanceController@withdrawStore')->name('withdraw.store');

  $this->get('transfer','BalanceController@transfer')->name('balance.transfer');

  $this->post('confirm-transfer','BalanceController@confirmTransfer')->name('confirm.transfer');


});


Route::get('/','Site\SiteController@index');





Auth::routes();
