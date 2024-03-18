<div class="card">
    <div class="card-header">

        <div class="btn-group">
            <div class="dropdown mr-2">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Shows
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('show.list_all') }}">Listar todos</a>
                    <a class="dropdown-item" href="{{ route('show.list_by_price') }}">Listar ordenados por precio</a>
                    <a class="dropdown-item" href="{{ route('show.list_show_and_comment') }}">Listar Shows y VER comentarios</a>
                </div>
            </div>

        </div>

        <div class="btn-group">
            <div class="dropdown mr-2">
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Commnets
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('comment.comment_show') }}">Comentar un show</a>
                    <a class="dropdown-item" href="{{ route('comment.update_view') }}">Actualizar un comentario</a>
                </div>
            </div>

        </div>

        <div class="btn-group">
            <div class="dropdown mr-2">
                <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('categories.list') }}">Listar categorías y sus shows</a>
                </div>
            </div>

        </div>
    </div>
</div>