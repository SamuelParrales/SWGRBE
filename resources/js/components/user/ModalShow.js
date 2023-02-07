import { Modal } from "bootstrap";

const createModal = () => {
    const $modal = document.createElement('div');
    $modal.className = "modal fade";
    $modal.innerHTML = `
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><i class="fa-solid fa-user"></i> Datos del usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <h5>
            <strong class="username">UserName</strong>
            </h5>
            <div clas="row">
                <strong>Nombre: </strong> <span class="name"></span>
            </div>
            <div clas="row">
                <strong>Apellido: </strong><span class="last_name"></span>
            </div>

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

export const ModalShow = (btnShow,{
    username,
    name,
    last_name
}) => {

    const modal = createModal();

    modal._element.querySelector('.username').textContent = username;
    modal._element.querySelector('.name').textContent = name;
    modal._element.querySelector('.last_name').textContent = last_name;
    btnShow.addEventListener('click',(e)=>{
        e.preventDefault();
        modal.show();
    })

    return modal;
}
