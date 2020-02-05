@extends('plantilla.plantilla')

@section('titulo','Agenda')
	{{-- expr --}}
@section('contenido')
	{{-- expr --}}



<div class="container-fluid registerinicio">
                <div class="row">
                    <div class="col-md-6 register-left register-left1">
                        <img src="http://www.idaipqroo.org.mx/wp-content/uploads/2018/06/proteccion-de-datos-personales-791x1024.png" alt=""/>
                    </div>    
                    <div class="col-md-6 register-left">
                        
                        <h3>Bienvenid@</h3>
                        <p>Por favor llena los datos correctamente en el sistema!</p>
                        
                    </div>    
                </div>
</div>



<div class="container-fluid ">

@if ( session('datos'))
	{{-- expr --}}
	<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{ session('datos') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

@endif

@if ( session('cancel'))
	{{-- expr --}}
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
			{{ session('cancel') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

@endif

 <br>

@include('agenda.navuser')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="{{ route('agenda.index') }}">Inicio</a></li>
    
  </ol>
</nav>


<nav class="navbar navbar-light float-right">
  <form class="form-inline">

  	 <select  name="tipo" class="form-control" id="exampleFormControlSelect1">
      <option value="nombres">- Buscar por Tipo -</option>
      <option>Nombres</option>
      <option>Apellidos</option>
      <option>Telefono</option>
      <option>Celular</option>
      <option>Email</option>
    </select>
    
    <input name="buscador" class="form-control mr-sm-2" type="search" placeholder="Buscar Persona" aria-label="Search">

    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>
</nav>



   <br>
      <h1 class="text-center">Datos personales</h1>

      <br>
<div class="row float-right">
    <a   href="{{ route('agenda.create') }}" class="btn btn-info btncolorblanco"><i class="fas fa-user-plus"></i> Agregar un nuevo Registro</a>
</div>
   <br>
<table class="table-responsive table text-center">
                                              <thead>
                                                <tr>
                                                  <th scope="col">#</th>
                                                  <th scope="col">Nombres y apellidos</th>
                                                  <th scope="col">Telefono</th>
                                                  <th scope="col">Celular</th>
                                                  <th scope="col">Sexo</th>
                                                  <th scope="col">Email</th>
                                                  <th scope="col">Posición</th>
                                                  <th scope="col">Departamento</th>
                                                  <th scope="col">Salario</th>
                                                  <th scope="col">Fecha de nacimiento</th>
                                                  <th scope="col">Acción</th>
                                              
                                                </tr>
                                              </thead>
                                              <tbody>
                                              	@foreach ($agenda as $item)
                                              		{{-- expr --}}
                                              	
                                                <tr>
                                                  <th scope="row">{{ $item->id }}</th>
                                                  <td>{{ $item->nombres}} {{ $item->apellidos }}</td>
                                                  <td>{{ $item->telefono}}</td>
                                                  <td>{{ $item->movil }}</td>
                                                  <td>{{ $item->sexo }}</td>
                                                  <td>{{ $item->email }}</td>
                                                  <td>{{ $item->posicion }}</td>
                                                  <td>{{ $item->departamento }}</td>
                                                  <td>{{ $item->salario }}</td>
                                                  <td>{{ $item->f_nacimiento }}</td>
                                                  <td>
                                                                                                 
                                                  

													<form action="{{ route('agenda.destroy',$item->id ) }}" method="POST">
									                    <a class="btn btn-info" href="{{ route('agenda.show',$item->id ) }}">Ver</a>
									                    <a class="btn btn-success btncolorblanco" href="{{ route('agenda.edit',$item->id ) }}"> <i class="fa fa-edit"></i>Editar</a>
									                    @csrf
									                    @method('DELETE')
								              	      <button type="submit" class="btn btn-danger">  <i class="fa fa-trash-alt"></i> Eliminar</button>
									                </form>

								                </td>
                                               </tr>
                                                @endforeach
                                              </tbody>
                                            </table>

{{  $agenda->links() }}

</div>

<br>


@include('plantilla.footer')


@endsection
