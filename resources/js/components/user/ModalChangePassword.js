import { feedbackForm } from "../../helpers/feedbackForm";

import { Modal } from "bootstrap";

const createModal = () => {
    const div = document.createElement('div');
    div.className = "modal fade";
    div.innerHTML = `
    <div class="modal-dialog z-n1">
        <div class="modal-content z-n1">
            <div class="modal-header z-n1">
                <h5 class="modal-title"><i class="fa-solid fa-lock"></i> Cambiar contraseña</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body z-n1">
                <form class="row g-0" action="">
                    <input name="id" hidden>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control feedback" placeholder="Contraseña actual" autocomplete="off">
                        <label for="floatingInput">Contraseña actual</label>
                        <div class="invalid-feedback msg-feedback">Invalid</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="new_password" type="password" class="form-control feedback" placeholder="Nueva contraseña" autocomplete="off">
                        <label for="floatingInput">Nueva contraseña</label>
                        <div class="invalid-feedback msg-feedback">Invalid</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="repeat_new_password" type="password" class="form-control feedback" placeholder="Repetir nueva contraseña" autocomplete="off">
                        <label for="floatingInput">Repetir nueva contraseña</label>
                        <div class="invalid-feedback msg-feedback">Invalid</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-save">Guardar</button>
                <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
    `;

    document.body.appendChild(div);
    return div;
}
export const ModalChangePassword = (
    {
        btnShow,
        clickSave =null
    }
)=>
{
    const $modal = createModal();
    const $btnGuardar = $modal.querySelector('.btn-save');
    const $form = $modal.querySelector('form');
    const modal = new Modal($modal);


    if(clickSave)
    {
        $btnGuardar.addEventListener('click',()=>clickSave($form));
    }


    btnShow.addEventListener('click', function (e) {
        e.preventDefault();
        modal.show();
    });

    modal.feedback = function(msg){
        feedbackForm($form,msg)
    }

    return modal;
}
