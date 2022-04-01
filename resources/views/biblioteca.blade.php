
@extends('barranavegacion')

@section('content')
<div class="container">
   <br>
   <h3 >Biblioteca</h3>
   <br>
   <div class="abs-center">
   <form action="{{route('biblioteca')}}" method="POST">
  @csrf
    @if (session('success'))
      <h6 class="alert alert-success">
         {{session('success')}}
      </h6> 
    @endif

    @error('nombre')
    <h6 class="alert alert-success">
         {{$message}}
      </h6> 
    @enderror
    @error('direccion')
    <h6 class="alert alert-success">
         {{$message}}
      </h6> 
    @enderror
   
   <div class="container">
    <div class="form-row">
      <label for="title">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
    </div>

    <div class="form-row">
      <label for="title">Direccion</label>
      <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Direccion">
    </div>
<br>
<div class="container">
  <div class="row">
    <div class="col text-center">
    <button text-align="center" type="submit" class="btn btn-primary">Registrar</button>
    <button text-align="center" type="submit" class="btn btn-danger">Cancelar</button>
    </div>
  </div>
</div>


  </div>
</form>
</div>
   </div>

<br>

   <div class="container">
   <h3 align="center">LISTADO DE BIBLIOTECAS</h3><br />
   <div class="container">
   
    <br>

     @foreach ($pasado['data'] as $todo)
       <h3></h3>
    
   
   

   <div class="table-responsive-sm">
   <table name="tareas" id="tareas" style="text-align:center;" class="table table-sm">
  <thead>
    <tr>
    <th width="25%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
       <th width="25%" class="sorting" data-sorting_type="asc" data-column_name="post_title" style="cursor: pointer">NOMBRE<span id="post_title_icon"></span></th>
       <th width="25%">Direccion</th>
       <th width="25%">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$todo['idBiblioteca']}}</th>
      <td>{{$todo['nombre']}}</td>
      <td>{{$todo['direccion']}}</td>

      <td>  
        
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-nombre="{{$todo['nombre']}}"  data-direccion="{{$todo['direccion']}}" data-id="{{$todo['idBiblioteca']}}" >

<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>


</button>

<br>
<form id="tuformulario" name="tuformulario" action="{{route('borrar')}}" method="POST">
@csrf
<div class="form-group" style="display:none" >
      <label for="idBiblioteca" class="col-form-label">ID:</label>
      <input type="text" id="idBiblioteca" name="idBiblioteca" class="form-control" value={{$todo['idBiblioteca']}} >
    </div>
    <button text-align="center" onclick="pregunta()" class="btn btn-danger">

<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg>



</button></td>
</form>

</tr>
   
  </tbody>
  @endforeach

  
</table>
</div>
   </div>









   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">BIBLIOTECA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form id="formulario" action="{{route('actualizar')}}" method="POST">
      @csrf
      
      <div class="form-group" style="display:none" >
            <label for="idBiblioteca" class="col-form-label">ID:</label>
            <input type="text" name="idBiblioteca" class="form-control" id="idBiblioteca">
          </div>
          <div class="form-group">
            <label for="Nombre" class="col-form-label">Nombre:</label>
            <input type="text" name="Nombre" class="form-control" id="Nombre">
          </div>

          <div class="form-group ">
          <label for="Direccion" class="col-form-label">Direccion:</label>
            <input type="text" name="Direccion" class="form-control" id="Direccion">
          </div>

        
      </div>
      <div  class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">EDITAR</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <br>
       
      </div>
      </form>
    </div>
  </div>
</div>


<script >
function pregunta(){
  var opcion = confirm("Clicka en Aceptar o Cancelar");
    if (opcion == true) {
      document.tuformulario.submit()
	} else {
    event.preventDefault();
   
	}
  
}
</script>


<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var nombre = button.data('nombre') 
  var direccion = button.data('direccion')

 var modal = $(this)
  modal.find('#idBiblioteca').val(id)
  modal.find('#Nombre').val(nombre)
  modal.find('#Direccion').val(direccion);  
 
})
</script>
@endsection
