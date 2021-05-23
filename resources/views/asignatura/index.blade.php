<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Gestión de asignatura</x-slot>
    <x-mensajes />
    <a href="{{ route('asignaturas.create')}}" class="btn btn-light"><i class="fas fa-plus"></i> Crear asignatura</a>
    <table class="table table-dark table-striped mt-2">
        <thead>
          <tr>
            <th scope="col">Detalle</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Creditos</th>
            <th scope="col" colspan="2" class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($asignatura as $item)
          <tr>
            <th scope="row">
                <a href="{{ route('asignaturas.show', $item)}}" class="btn btn-info"><i class="fas fa-info"></i> Detalles</a>
            </th>
            <td>{{$item->nombre}}</td>
            <td>{{$item->descripcion}}</td>
            <td>{{$item->creditos}}</td>
            <td class="text-center">
                <a href="{{route('asignaturas.edit', $item)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
            </td>
            <td class="text-center">
                <form name="as" method="POST" action="{{ route('asignaturas.destroy', $item)}}">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Borrar</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mt-2">
          {{$asignatura->links()}}
      </div>
</x-plantilla>
