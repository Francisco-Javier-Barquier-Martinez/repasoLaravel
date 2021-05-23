<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Nueva asignatura</x-slot>
    <x-errores />
    <form name="sd" method="POST" action="{{ route('asignaturas.store') }}" class=" p-4 bg-dark text-light">
        @csrf
        <x-form-input name="nombre" label="Nombre asignatura" />
        <x-form-input name="descripcion" label="Descripcion asignatura" />
        <x-form-input name="creditos" label="Creditos" />
        <x-form-select name="profesor_id" :options="$profe" label="Profesor" />


        <div class="mt-3">
            <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Enviar</button>

            <button type="reset" class=" ml-3 btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i>Volver</button>
        </div>
    </form>
</x-plantilla>
