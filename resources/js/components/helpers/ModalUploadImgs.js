

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
            <div class="custom-file-container" data-upload-id="myFirstImage"></div>
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

export const ModalUploadImgs = (inputFile) => {

    const modal = createModal();
    const Events = FileUploadWithPreview.Events;
    console.log(FileUploadWithPreview);
    const upload = new FileUploadWithPreview.FileUploadWithPreview('myFirstImage',{
        multiple:true,
        maxFileCount: 4,
        text:{
            browse:'Navegar',
            chooseFile:'Seleccionar imagenes',
            label:'',
            selectedCount: 'Imagenes seleccionadas'
        }

    });
    const $containerImgs = modal._element.querySelector('.custom-file-container')

    window.addEventListener(Events.IMAGE_ADDED,(e)=>{

        const dt = new DataTransfer();
        for (const file of upload.cachedFileArray) {
            dt.items.add(file);
        }
        inputFile.files = dt.files;
    })

    window.addEventListener(Events.IMAGE_DELETED,(e)=>{
        const dt = new DataTransfer();
        for (const file of upload.cachedFileArray) {
            dt.items.add(file);
        }
        inputFile.files = dt.files;
    });
    $containerImgs.querySelector('.clear-button').classList.add('d-none');


    inputFile.addEventListener('click',(e)=>{
        e.preventDefault();
        modal.show();

    })
    modal.show();


    return modal;
}
