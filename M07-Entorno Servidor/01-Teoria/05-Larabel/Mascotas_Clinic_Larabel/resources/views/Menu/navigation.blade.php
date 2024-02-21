<div class="card">
    <div class="card-header">

        <div class="btn-group">
            <div class="dropdown mr-2">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Propietarios
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('Owner.index') }}">Listar Propietarios</a>
                    <a class="dropdown-item" href="{{ route('Owner.create') }}">Añadir un Propietario</a>
                </div>
            </div>

        </div>
    </div>
</div>