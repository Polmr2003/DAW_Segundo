<!-- Le pasamos el id de el owner al modal-->
<div class="modal fade" id="delete{{ $owner->id }}" tabindex="-1" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Eliminar Propietario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Form para modificar el Owner-->
            <form action="{{ route('Owner.destroy', $owner->id) }}" method="post">
                <!-- Token necesario para hacer el create -->
                @csrf

                <!-- Metodo delete para eliminar -->
                @method('DELETE')

                <!-- Modal -->
                <div class="modal-body">
                    <!-- Pedimos el nuevo nombre -->
                    <p>Estas seguro de eliminar a:</p><strong>{{$owner->email}}</strong>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Delete</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
