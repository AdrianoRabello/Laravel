@extends('adminlte::page')

@section('title', 'Home Dashboard')

@section('content_header')
    <h1>Confirmar tranferência</h1>

    <ol class="breadcrumb">
      <li> <a href="">Dashboard </a> </li>
      <li> <a href=""> Saldo</a> </li>
      <li> <a href=""> Tranferir</a> </li>
      <li> <a href=""> Confirmação</a> </li>

    </ol>
@stop

@section('content')

    <div class="box">
      <div class="box-header">

      </div>

      <div class="box-body">
        {{--Faz um include da pagina que contem apenas as mensagens erros e alerts  --}}
        @include('admin.includes.alerts')
        <div class="card ">

          <div class="card-body ">
            <ul class="list-group">
              <li class="list-group-item "><span class="">Destinatário:  </span><b>{{$sender->name}}</b></li>
                <br>
              <li class="list-group-item "><span class="">Email:  </span><b>{{$sender->email}}</b</li>
            </ul>
          </div>
        </div>
        <p class="alert alert-success">Saldo em conta: R$  {{number_format($balance->amount,2,',','.')}}</p>
        <form class="" action="{{route('transfer.store')}}" method="POST">
          {{ csrf_field() }}

          <input type="hidden" name="sender_id" value="{{$sender->id}}">
          <div class="form-group">
            <label for=""></label>
            <input type="text" name="amount" class="form-control" placeholder="Valor">
          </div>

          <div class="form-group">
            <label for=""></label>
          <button type="submit" name="button" class="btn btn-primary">Tranferir</button>
          </div>
        </form>

      </div>
    </div>


@stop
