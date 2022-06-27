@extends('app')
@section('content')
<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('prueba')}}" method="POST">

          @csrf

          @if(session('success'))
          <h6 class="alert alert-su"> {{session('success')}} </h6>
          @endif

         @error('title')
          <h6 class="alert alert-danger">{{$message}}</h6>
         @enderror

         @if($errors->any())
         <div class="alert alert-danger">
             @foreach($errors->all() as $error)
             - {{ $error }} <br>
             @endforeach
         </div>
         @endif

            <div class="mb-3">
              <label for="title" class="form-label">Nombre de tarea</label>
              <input type="text" name="title" class="form-control" value="{{old('title')}}">
              <div id="emailHelp" class="form-text">Ingresar tarea a realizar</div>
            </div>
            <button type="submit" class="btn btn-primary">Crear </button>

    </form>

    <div>
        @foreach ($prueba as $tarea)
        <div class="row py-1">
          <div class="col-md-9 d-flex align-items-center">
            <a href="{{ route('prueba-edit', ['id' => $tarea->id])}}">{{$tarea->title}}</a>
          </div>
          <div class="col-md-3 d-flex justify-content-end">
            <form action="{{ route('prueba-destroy', [$tarea->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-sm">Eliminar</button>
            </form>
          </div>
        </div>
        @endforeach
      </div>
</div>
@endsection
