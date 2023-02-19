import { Modal } from "bootstrap";

const createModal = () => {
    const $modal = document.createElement('div');
    $modal.className = "modal fade";
    $modal.innerHTML = `
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><i class="fa-solid fa-clock-rotate-left"></i> Historial de baneo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body row g-0 justify-content-center">
            <div class="col-12 mt-1">
                    <p class="my-0"><strong>Usuario:</strong> <span class="user"></span></p>
                    <p><strong>Actualmente baneado:</strong> <span class="is-banned"></span></p>
            </div>
            <table class="table-ban-history table border  bg-light">
                <thead>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col" class="text-center">Fecha</th>
                    <th scope="col" class="text-center">Días</th>
                </thead>
                <tbody class="ban-history">
                  <tr>
                  <th class="text-center align-middle" scope="row">1</th>
                  <td>a</td>
                  <td>b</td>
                  </tr>
                </tbody>
            </table>
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
export const ModalBanHistory = () => {
    const modal = createModal();
    const $modal = modal._element;
    function fillData({
        user=null,
        isBanned=null,
        bans=null
    }){
        const $user = $modal.querySelector('.user');
        const $isBanned = $modal.querySelector('.is-banned');
        const $tableHistoryBan = $modal.querySelector('.table-ban-history');
        $user.textContent = user;
        $isBanned.textContent = isBanned?"Si":"No";

        if(bans.length==0)
        {
            $tableHistoryBan.innerHTML = "";
            $tableHistoryBan.innerHTML = "<h4 class='text-center my-3'>Todavía no ha sido baneado ninguna vez.</h4>"
        }
        else
        {
            $tableHistoryBan.innerHTML = `
            <thead>
                <th class="text-center" scope="col">#</th>
                <th scope="col" class="text-center">Fecha</th>
                <th scope="col" class="text-center">Días</th>
            </thead>
            <tbody class="ban-history text-center align-middle">

            </tbody>
            `;
            const $banHistory =  $tableHistoryBan.querySelector('.ban-history');

            for (let i=0;i<bans.length;i++) {
                const {days, created_at} = bans[i]
                const $tr = document.createElement('tr');
                const $index = document.createElement('th');
                const $date = document.createElement('td');
                const $days = document.createElement('td');

                $index.textContent = i+1;
                $date.textContent= created_at;
                $days.textContent = days?days:"Indefinidamente";

                $index.scope = "row";
                $tr.appendChild($index)
                $tr.appendChild($date)
                $tr.appendChild($days)
                $banHistory.appendChild($tr);

            }
        }





    }

    modal.fillData = fillData;

    return modal;
}
