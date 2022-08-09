<div class="modal fade" id="excluir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Atenção</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p class="form-label">Você realmente deseja excluir a categoria {{categorias}} ?</p>
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-start mt-2">
                    <a href="{{URL}}/categorias/{{id}}/excluir"> <button type="submit" class="btn btn-primary">Sim</button></a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>
</div>