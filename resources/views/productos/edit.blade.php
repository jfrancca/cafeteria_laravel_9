<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
            {{ __('Editar producto') }}
        </h2>
    </x-slot>

    @section('content')

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-4 p-4">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary my-3" href="{{ route('productos.index') }}"> Volver</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Lo siento!</strong> Debes revisar los campos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group pb-4">
                    <strong>Nombre del producto:</strong>
                    <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" placeholder="Nombre del producto">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group pb-4">
                    <strong>Referencia:</strong>
                    <input type="text" name="referencia" value="{{ $producto->referencia }}" class="form-control" placeholder="Referencia">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Precio:</strong>
                    <input type="number" class="form-control" name="precio" value="{{ $producto->precio}}" placeholder="Precio">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Peso:</strong>
                    <input type="number" class="form-control" name="peso" value="{{ $producto->peso}}" placeholder="Peso">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Categoria:</strong>
                    <input type="text" class="form-control" name="categoria" value="{{ $producto->categoria}}" placeholder="Categoria">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stock:</strong>
                    <input type="number" class="form-control" name="stock" value="{{ $producto->stock}}" placeholder="Stock">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de creación:</strong>
                    <input type="date" class="form-control" name="fecha" value="{{ $producto->fecha}}" placeholder="Fecha de creación">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
              <button type="submit" class="text-black btn btn-primary">Enviar</button>
            </div>
        </div>
   
    </form>

</div>

    @endsection


</x-app-layout>