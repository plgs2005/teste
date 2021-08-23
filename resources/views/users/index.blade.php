@extends('layouts.app', [
'namePage' => 'Gestão de Usuários',
'class' => 'sidebar-mini',
'activePage' => 'Usuários',
'activeNav' => 'Usuários',
])

<style>
  @keyframes fa-blink {
    0% {
      opacity: 1;
    }

    50% {
      opacity: 0.5;
    }

    100% {
      opacity: 0;
    }
  }

  .fa-blink {
    -webkit-animation: fa-blink .75s linear infinite;
    -moz-animation: fa-blink .75s linear infinite;
    -ms-animation: fa-blink .75s linear infinite;
    -o-animation: fa-blink .75s linear infinite;
    animation: fa-blink .75s linear infinite;
  }
</style>

@section('content')
<div class="panel-header">
</div>
<div class="content justify-content-center">
  <div class="row justify-content-center">
    <div class="col-md-10">

      <div class="card">
        @include('alerts.success')
        @if($auth)
        <a class="btn btn-primary btn-round text-white pull-right" href="{{route('users.create')}}">Cadastrar usuário</a>
        @endif
        <div class="card-header">
          <h4 class="card-title">Lista de Usuários</h4>

        </div>
        <div class="card-body">
          <div class="toolbar">

            <!--        Here you can write extra buttons/actions for the toolbar              -->
          </div>


          <table id="listUsers" class="mdl-data-table table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Cadastrado</th>
                @if($auth)
                <th class="disabled-sorting text-right">Ação</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>
                  @if($auth)
                   @if($uId->id==$user->id)
                   <spam class="fa-blink text-success">●</spam> {{$user->name}}  

                    @else
                    {{$user->name}}
                  @endif
                  @else
                  {{$user->name}}
                  
                  @endif
                </td>
                <td>

                  {{$user->email}}
                </td>
                <td>{{date('d/m/Y', strtotime($user->created_at))}}</td>
                @if($auth)
                <td class="text-right">


                  <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                    @method('DELETE')
                    @csrf


                    @if($uId->id==$user->id)
                    <a href="{{route('profile.edit', $user->id)}}" class="btn btn-round btn-warning btn-icon btn-sm edit" title="Editar"><i class="fas fa-pencil-alt"></i></a>

                    @else
                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-round btn-warning btn-icon btn-sm edit" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                    <button id="delete-confirm" class=" delete-confirm btn btn-round btn-danger btn-icon btn-sm remove" type="submit"><i class="fas fa-user-minus"></i></button>
                    @endif
                  </form>

                </td>
                @endif
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
        <!-- end content-->
      </div>
      <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
  </div>
  <!-- end row -->
</div>
@endsection


@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $('.delete-confirm').on('click', function(event) {
    event.preventDefault();
    var form = $(this).parents('form');
    swal({
      title: 'Deseja realmente excluir ?',
      text: 'Os dados do usuário não poderá ser recuperado, você tem certeza?',
      icon: 'warning',
      buttons: ["Cancelar", "Sim!"],
      closeOnConfirm: false
    }).then(function(isConfirm) {


      if (isConfirm) form.submit();

    });
  });
</script>



<script>
  $(document).ready(function() {
    $('#listUsers').DataTable({
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function(row) {
              var data = row.data();
              return 'Detalhes de ' + data[0] + ' ' + data[1];
            }
          }),
          renderer: function(api, rowIdx, columns) {
            var data = $.map(columns, function(col, i) {
              return '<tr>' +
                '<td>' + col.title + ':' + '</td> ' +
                '<td>' + col.data + '</td>' +
                '</tr>';
            }).join('');

            return $('<table width="100%"/>').append(data);
          }
        }
      }
    });

  });
</script>

@endpush