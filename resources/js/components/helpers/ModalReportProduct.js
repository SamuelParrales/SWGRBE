import { Modal } from "bootstrap";

const createModal = () => {
    const $modal = document.createElement('div');
    $modal.className = "modal fade";
    $modal.innerHTML = `
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><i class="fa-solid fa-flag"></i> Reportar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="select-problem">
                <h5>
                Selecciona un problema:
                </h5>
                <ul class="list-group">
                    <li class="list-group-item p-0 rounded"><btn data-id="1" type="button" class="d-block btn btn-light report-item">Engañoso o fraude</btn></li>
                    <li class="list-group-item p-0 rounded"><btn data-id="2" type="button" class="d-block btn btn-light report-item">Contenido sexual inapropiado</btn></li>
                    <li class="list-group-item p-0 rounded"><btn data-id="3" type="button" class="d-block btn btn-light report-item">Ofensivo</btn></li>
                    <li class="list-group-item p-0 rounded"><btn data-id="4" type="button" class="d-block btn btn-light report-item">Violencia</btn></li>
                    <li class="list-group-item p-0 rounded"><btn data-id="5" type="button" class="d-block btn btn-light report-item">El anunciante se hace pasar por otra persona</btn></li>
                    <li class="list-group-item p-0 rounded"><btn data-id="6" type="button" class="d-block btn btn-light report-item">Candidato o tema político</btn></li>
                    <li class="list-group-item p-0 rounded"><btn data-id="7" type="button" class="d-block btn btn-light report-item">Contenido prohibido</btn></li>
                    <li class="list-group-item p-0 rounded"><btn data-id="8" type="button" class="d-block btn btn-light report-item">Otros</btn></li>
                </ul>
            </div>
            <div class="selected-problem row g-0 d-none">
                <div class="row align-items-center g-0">
                    <div class="col-auto return-select-problem">
                        <button class="btn btn-secondary btn-sm ounded-circle btn-back"><i class="fa-solid fa-arrow-left "></i></button>
                    </div>
                    <div class="col-auto ">
                        <h5 class="problem col-auto p-0 m-0 ms-2">problem</h5>
                    </div>
                    <div class="col-12 mt-2">
                        <p>Facilite una descripción más detallada acerca de su inconformidad:</p>
                    </div>
                </div>
                <form class="row g-0 justify-content-center">
                    <input class="d-none" name="report_reason_id"/>
                    <input class="d-none" name="product_id"/>
                    <div class="form-floating mb-3 ">
                        <textarea name="description" class="form-control" style="height:150px" placeholder="Leave a comment here"></textarea>
                        <label for="floatingTextarea">Descripción</label>
                    </div>
                    <button class="btn btn-danger col-auto"><i class="fa-regular fa-paper-plane"></i> Enviar</button>
                </form>
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


export const ModalReportProduct = ({btnShow,product_id=null, handleSubmit, action}) => {
    const modal = createModal();
    const $form = modal._element.querySelector('form');
    const $returnSelectProblem = modal._element.querySelector('.return-select-problem');

    $returnSelectProblem.addEventListener('click',(e)=>{
        const $selectProblem = modal._element.querySelector('.select-problem');

        const $selectedProblem = modal._element.querySelector('.selected-problem');



        $selectProblem.classList.remove('d-none');
        $selectedProblem.classList.add('d-none');


    });


    $form.product_id.value = product_id;
    $form.action = action;
    btnShow.addEventListener('click',(e)=>{
        e.preventDefault()
        modal.show();
    })

    if(handleSubmit) $form.addEventListener('submit',async (e)=>{
        await handleSubmit(e)
        modal.hide();
        $form.description.value = "";
        $returnSelectProblem.click();

    });

    return modal;
}


window.addEventListener('click',(e)=>{

    if(!e.target.matches('.report-item'))
        return;
        e.preventDefault();
    const $btn = e.target;
    const $modalBody = $btn.closest('.modal-body');
    const $selectProblem = $btn.closest('.select-problem');
    const $selectedProblem = $modalBody.querySelector('.selected-problem');
    const $form = $selectedProblem.querySelector('form');

    $form.description.value = "";
    $form.report_reason_id.value = $btn.dataset.id;
    $selectProblem.classList.add('d-none')
    $selectedProblem.classList.remove('d-none')
    $selectedProblem.querySelector('.problem').textContent = $btn.textContent;
})

