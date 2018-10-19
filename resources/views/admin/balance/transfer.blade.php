@extends('adminlte::page')

@section('title', 'Home Dashboard')

@section('content_header')
    <h1>Tranferir</h1>

    <ol class="breadcrumb">
      <li> <a href="">Dashboard </a> </li>
      <li> <a href=""> depositar</a> </li>

    </ol>
@stop

@section('content')

    <div class="box">
      <div class="box-header">

      </div>

      <div class="box-body">
        {{--Faz um include da pagina que contem apenas as mensagens erros e alerts  --}}
        @include('admin.includes.alerts')
        <form class="" action="{{route('confirm.transfer')}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label for=""></label>
            <input type="text" name="sender" value="" class="form-control" placeholder="Quem vai receber o valor (Nome ou email)">
          </div>

          <div class="form-group">
            <label for=""></label>
          <button type="submit" name="button" class="btn btn-primary">Proxima etapa</button>
          </div>
        </form>

      </div>
    </div>


@stop
