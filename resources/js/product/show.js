import 'viewerjs/dist/viewer.css';
import Viewer from 'viewerjs';
import { ModalShow } from '../components/user/ModalShow';
import { ModalReportProduct } from '../components/helpers/ModalReportProduct';
import { alertConfirm } from '../helpers/alertConfirm';
import { ModalBanUser } from '../components/user/offeror/ModalBanUser';

const $btnReport = document.getElementById('btn-report');
const $btnBan = document.getElementById('btn-show-modal-ban');
const $linkUsername = document.getElementById('link-username');
const $formDestroyProduct = document.getElementById('form-destroy-product');
const gallery = new Viewer(document.getElementById('images'), {
    inline: true,
    title: false,
    rotatable: false,
    scalable: false,

});


//functions
const axiosStoreReport = async (url, formData) => {
    try {
        await axios.post(url, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });
    } catch (error) {
        console.log(error)
        return Promise.reject(error);
    }
}
const axiosBanUser = async (url, formData) => {
    formData.append('_method', 'put');
    try {
        await axios.post(url, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });
    } catch (error) {

        console.error(error)
        return Promise.reject(error);
    }
}

const handleSubmit = async (e) => {
    e.preventDefault();
    const $form = e.target;
    const formData = new FormData($form);

    await alertConfirm({
        data: {
            title: '¿Está seguro de reportar este producto?',
            text: 'Los moderadores revisarán su inconformidad más tarde.',
            icon: 'question',
        },
        confirm: async () => await axiosStoreReport($form.action, formData),

    })

}


const handleSubmitBan = async (e) => {
    e.preventDefault();
    const $form = e.target;
    const formData = new FormData($form);
    await alertConfirm({
        data: {
            title: '¿Está seguro de banear el usuario que subió este producto?',
            text: 'Esta acción podrá revertirse más tarde.',
            icon: 'question',
        },
        confirm: async () => await axiosBanUser($form.action, formData),
    })
}

//   code execution
ModalShow($linkUsername, {
    username: $linkUsername.dataset.username,
    name: $linkUsername.dataset.name,
    last_name: $linkUsername.dataset.last_name,
});

if ($btnReport) {

    ModalReportProduct({
        btnShow: $btnReport,
        product_id: $btnReport.dataset.product_id,
        action: $btnReport.href,
        handleSubmit
    });
}

if ($btnBan) {
    ModalBanUser({
        action: $btnBan.href,
        btnShow: $btnBan,
        handleSubmit: handleSubmitBan
    })
}

if ($formDestroyProduct) {
    $formDestroyProduct.addEventListener('submit', async (e) => {
        e.preventDefault();
        const target = e.target;
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
                if (msg == "success") location.href = location.href.slice(0,-2);
            },
        })
    })
}
