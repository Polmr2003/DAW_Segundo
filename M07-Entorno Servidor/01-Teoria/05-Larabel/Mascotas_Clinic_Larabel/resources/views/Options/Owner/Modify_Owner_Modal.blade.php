<!-- Le pasamos el id de el owner al modal-->
<div class="modal fade" id="modify{{ $owner->id }}" tabindex="-1" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Modificar Propietario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Form para modificar el Owner-->
            <form action="{{ route('Owner.update', $owner->id) }}" method="post">
                <!-- Token necesario para hacer el create -->
                @csrf

                <!-- Metodo PUT para editar -->
                @method('PUT')

                <!-- Modal -->
                <div class="modal-body">
                    <!-- Pedimos el nuevo nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="helpId"
                            value="{{ $owner->name }}">
                    </div>
                    <!-- Pedimos el nuevo email -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Email</label>
                        <input type="text" class="form-control mb-3" id="email" name="email" aria-describedby="helpId"
                            value="{{ $owner->email }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
