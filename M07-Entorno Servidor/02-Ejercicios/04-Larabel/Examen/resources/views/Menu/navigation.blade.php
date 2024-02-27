<div class="card">
    <div class="card-header">

        <div class="btn-group">
            <div class="dropdown mr-2">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Shows
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('show.list') }}">Listar Shows</a>
                </div>
            </div>

        </div>

        <div class="btn-group">
            <div class="dropdown mr-2">
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Commnets
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('show.view_com') }}">Ver comentarios</a>
                    <a class="dropdown-item" href="{{ route('show.comment') }}">Comentar un show</a>
                    <a class="dropdown-item" href="{{ route('show.modify_val') }}">Modificar valoracion</a>
                </div>
            </div>

        </div>

        <div class="btn-group">
            <div class="dropdown mr-2">
                <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('home') }}">Listar categorías y sus shows</a>
                </div>
            </div>

        </div>
    </div>
</div>
