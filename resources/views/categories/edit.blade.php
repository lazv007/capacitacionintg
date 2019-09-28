@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card-header bg-danger text-white">
    Modicar Registro 
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
   
    {!! Form::open(['route'=>['categories.update',$category],'method'=>'PUT']) !!}
  {!!Field::text('name',$category->name,['label'=>'Nombre','placeholder'=>'Ingrese el nombre'])!!}
  {!!Field::textarea('description',$category->description,['label'=>'Descripcion','placeholder'=>'Ingrese la descripcion'])!!}
  {!! Form::submit('GUARDAR',['class'=>'btn btn-success']) !!}     
  
  {!!Form::close()!!}
  <a href="{{route('categories.index')}}" class="btn btn-primary">REGRESAR</a>
  </div>
</div>
@endsection