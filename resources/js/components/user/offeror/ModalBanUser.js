import { Modal } from "bootstrap";

const createModal = () => {
    const $modal = document.createElement('div');
    $modal.className = "modal fade";
    $modal.innerHTML = `
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><i class="fa-solid fa-user-large-slash"></i> Banear usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body row g-0 justify-content-center">
            <div class="col-12 mt-1">
                        <p>Seleccione el tiempo: </p>
            </div>
            <form class="col-auto">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="days" value="3"  checked>
                    <label class="form-check-label">
                    Durante 3 días
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="days" value="7"  >
                    <label class="form-check-label">
                    Durante 1 semana
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="days" value="14" >
                    <label class="form-check-label">
                    Durante 2 semanas
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="days" value="30"  >
                    <label class="form-check-label">
                    Durante 1 mes
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="days" value="" >
                    <label class="form-check-label">
                    Indefinidamente
                    </label>
                </div>
            <div class="row g-0 justify-content-center">
            <button class="btn btn-danger col-auto"><i class="fa-regular fa-paper-plane"></i> Enviar</button>
            </div>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cerrar</button>
        </div>

    </div>
</div>
`;
    document.body.appendChild($modal);
    return new Modal($modal, {});
}


export const ModalBanUser = ({ action=null,btnShow=null,
    handleSubmit=null,
}) => {
    const modal = createModal();
    const $form = modal._element.querySelector('form');


    $form.action = action;
    if(handleSubmit)
    {
        $form.addEventListener('submit',async (e)=>{
            await handleSubmit(e);
            modal.hide();
        })
    }
    if(btnShow)
    {
        btnShow.addEventListener('click',(e)=>{
            e.preventDefault();
            modal.show();
        })

    }

    return modal;
}
