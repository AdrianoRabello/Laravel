@extends('adminlte::page')

@section('title', 'Home Dashboard')

@section('content_header')
    <h1>Fazer saque</h1>

    <ol class="breadcrumb">
      <li> <a href="">Dashboard </a> </li>
      <li> <a href=""> Sacar</a> </li>

    </ol>
@stop

@section('content')

    <div class="box">
      <div class="box-header">

      </div>

      <div class="box-body">
        {{--Faz um include da pagina que contem apenas as mensagens erros e alerts  --}}
        @include('admin.includes.alerts')
        <form  action="{{route('withdraw.store')}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label for=""></label>
            <input type="text" name="amount" value="" class="form-control" placeholder="Valor da retirada">
          </div>

          <div class="form-group">
            <label for=""></label>
          <button type="submit" name="button" class="btn btn-primary">Carregar</button>
          </div>
        </form>

      </div>
    </div>


@stop
