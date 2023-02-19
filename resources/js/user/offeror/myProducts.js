import axios from "axios";
import { alertConfirm } from "../../helpers/alertConfirm";

const $formFilters = document.getElementById('form-filters');
const $selectOrderBy = $formFilters.order_by;

$selectOrderBy.addEventListener('change', () => {
    $formFilters.submit();
});


// Events
document.addEventListener('submit', async (e) => {
    const { target } = e;

    if (!target.matches('.form-destroy-product'))
        return;

    e.preventDefault();

    await alertConfirm({
        data: {
            title: '¿Está seguro de eliminar este producto?',
            text: 'Esta acción no podrá ser revertida.',
            icon: 'warning',
        },
        confirm: async () => {
            try {
                await axios.post(
                    target.action,
                    new FormData(target), {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
            } catch (error) {
                return Promise.reject(error);
            }
        },
        end: (msg) => {
            if (msg == "success") location.reload();
        },
    })
})

document.addEventListener('submit', async (e) => {
    const { target } = e;
    if (!target.matches('.form-recycle-product'))
        return;

    e.preventDefault();

    await alertConfirm({
        data: {
            title: '¿Está seguro de marcar este producto como reciclado?',
            text: 'Esta acción no puede revertirse e indicará que un reciclador recolectó este producto, además no se podrá editar ni eliminar el producto.',
            icon: 'warning',
        },
        confirm: async () => {

            try {
                await axios.post(
                    target.action,
                    new FormData(target), {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
            } catch (error) {
                return Promise.reject(error);
            }
        },
        end: (msg) => {
            if (msg == "success") location.reload();
        },
    })
})

