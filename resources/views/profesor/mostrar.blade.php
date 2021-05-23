<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Detalles Profesor ({{($profesore->id)}})</x-slot>
    <div class="card m-auto" style="width: 34rem;">
        <div class="card-body">
          <h4 class="card-title">{{$profesore->nombre}}</h4>
          <h6 class="card-subtitle mb-2 text-muted">{{$profesore->apellidos}}</h6>
          <h6 class="card-subtitle mb-2 text-muted">({{$profesore->localidad}})</h6>
          <p class="card-text"><b>Email: </b>{{$profesore->email}}</p>
          <div class="mt-2">
            <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i> Volver</button>
          </div>
        </div>
      </div>
</x-plantilla>
