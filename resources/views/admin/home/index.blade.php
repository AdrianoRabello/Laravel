@extends('adminlte::page')

@section('title', 'Home Dashboard')

@section('content_header')

@stop

@section('content')

  <div class="alert text-center">
    SEJA BEM VINDO
  </div>
  <div class="">
    <div class="row ">

      <div class="col-md-4 ">
        <table class="table table-responsive table-sm">
          <tr>
            <td>Nome</td>
            <td>{{$user->name}}</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>{{$user->email}}</td>
          </tr>

          <tr>
            <td>Saldo</td>
            <td>R$ {{ number_format($amount,2,',', ' ') }}</td>

          </tr>
        </table>
      </div>


    </div>
  </div>


  <div class="row">
    <div class="col-md-12 table-responsive">
      <table class="table">
        <thead >
          <th >Data</th>
          <th>Saldo anterior</th>
          <th>Tipo de tansação</th>
          <th>Valor da tansação</th>
          <th>Saldo</th>
        </thead>
        <tbody>
          @foreach ($itens as $iten)
            <tr>
              <td>{{$iten->date}}</td>
              <td>{{number_format($iten->total_before,2,',','.')}}</td>
              <td>
                {{$iten->type}}
              </td>
              <td>{{number_format($iten->amount ,2,',','.') }}</td>
              <td>{{number_format($iten->total_after,2,',','.')}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
  <div class="row">
    <div class="col-md-4 d-flex justify-content-center">
      {{ $itens->links() }}
    </div>

  </div>

        {{--Faz um include da pagina que contem apenas as mensagens erros e alerts  --}}
    @include('admin.includes.alerts')





@stop
