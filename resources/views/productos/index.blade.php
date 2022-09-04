<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
            {{ __('Cafeteria Konecta') }}
        </h2>
    </x-slot>

    @section('content')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <a class="btn btn-primary mb-4" href="{{ route('productos.create') }}">Nuevo Producto</a>
                                <a class="btn btn-success mb-4" href="{{ route('ventas.create') }}">Venta Producto</a>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <table class="table table-bordered">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Producto</th>
                                    <th>Referencia</th>
                                    <th>Precio</th>
                                    <th>Peso</th>
                                    <th>Categoria</th>
                                    <th>Stock</th>
                                    <th>Fecha Creación</th>
                                    <th width="280px">Acción</th>
                                </tr>
                                @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->id }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->referencia }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td>{{ $producto->peso }}</td>
                                    <td>{{ $producto->categoria }}</td>
                                    <td>{{ $producto->stock }}</td>
                                    <td>{{ $producto->fecha }}</td>
                                    <td>
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            
                                            <a class="btn btn-primary" href="{{ route('productos.edit', $producto->id) }}">Editar</a>                       
                            
                                            <button type="submit" class="btn btn-danger text-black">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

</x-app-layout>
