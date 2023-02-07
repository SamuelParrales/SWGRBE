import { Modal } from "bootstrap";

const createModal = () => {
    const $modal = document.createElement('div');
    $modal.className = "modal fade";
    $modal.innerHTML = `
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Subir imagen</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <div class="d-block container-img">
                <img style="display: block; max-width: 100%; height:400px; max-height:400px" src="https://cdn.pixabay.com/photo/2023/01/08/18/42/road-7705906_960_720.jpg">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success btn-save">Guardar</button>
            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cerrar</button>
        </div>

    </div>
</div>
`;

    document.body.appendChild($modal);
    return new Modal($modal, {});
}

export const ModalUploadImg = (btnShow) => {

    const modal = createModal();
    const $img = modal._element.querySelector('.container-img img')

    const cropper = new Cropper($img, {
        aspectRatio: 1 / 1,
        viewMode: 1,
        cropBoxMovable: false,
        dragMode: 'move',
        responsive: true,
        background: false,
        autoCrop: true,
        crop(event) {


            console.log(event.detail.x);
            console.log(event.detail.y);
            console.log(event.detail.width);
            console.log(event.detail.height);
            console.log(event.detail.rotate);
            console.log(event.detail.scaleX);
            console.log(event.detail.scaleY);
        },
    });

    // modal.show();
    return modal;
}
