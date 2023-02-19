import { ModalBanHistory } from "../../../components/user/offeror/ModalBanHistory";
import { ModalBanUser } from "../../../components/user/offeror/ModalBanUser";
import { alertConfirm } from "../../../helpers/alertConfirm";

const modal = ModalBanUser({handleSubmit});
const modalBanHistory = ModalBanHistory();
// Functions
const axiosDestroyModerator = async (url, formData) => {
    try {
        await axios.post(
            url,
            formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
    }
    catch (error) {
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

const axiosUnbanUser = async (url, formData) => {

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

async function handleSubmit(e) {
    e.preventDefault();
    const $form = e.target;
    const formData = new FormData($form);
    await alertConfirm({
        data: {
            title: '¿Está seguro de banear este usuario?',
            text: 'Esta acción podrá revertirse más tarde.',
            icon: 'question',
        },
        confirm: async () => await axiosBanUser($form.action, formData),
        end: (msg) => {
            if (msg == "success") location.reload();
        },
    })
}


// Code exe
document.addEventListener('submit', async (e) => {
    const target = e.target;
    if (!target.matches('.form-destroy-moderator')) return;
    e.preventDefault();

    await alertConfirm({
        data: {
            title: '¿Está seguro de eliminar este moderador?',
            text: 'Se eliminará permanentemente, esta acción no podrá ser revertida.',
            icon: 'question',
        },
        confirm: async () => await axiosDestroyModerator(target.action, new FormData(target)),
        end: (msg) => {
            if (msg == "success") location.reload();
        },
    })
});

document.addEventListener('click', (e) => {
    const target = e.target;

    if (!target.matches('.btn-ban-offeror') && !target.matches('.btn-ban-offeror *')) return;
    e.preventDefault();
    const $btn = target.tagName == 'A' ? target : target.closest('a');
    const $form = modal._element.querySelector('form')

    $form.action = $btn.href;
    modal.show()
})


document.addEventListener('submit',async (e)=>{


    const target = e.target;
    if (!target.matches('.form-unban-offeror')) return;
    e.preventDefault();
    const $form = target;
    const formData = new FormData($form);
    await alertConfirm({
        data: {
            title: '¿Está seguro de desbanear este usuario?',
            text: 'Esta acción podrá revertirse más tarde.',
            icon: 'question',
        },
        confirm: async () => await axiosUnbanUser($form.action, formData),
        end: (msg) => {
            if (msg == "success") location.reload();
        },
    })
});

document.addEventListener('click',(e)=>{
    const target = e.target;
    if (!target.matches('.btn-show-history') && !target.matches('.btn-show-history *')) return;
    e.preventDefault();
    const $btn = target.tagName == 'A' ? target : target.closest('a');

    modalBanHistory.fillData({
        'user': $btn.dataset.username,
        'isBanned': $btn.dataset.isBanned? true:false,
        'bans': JSON.parse($btn.dataset.bans),
    });
    modalBanHistory.show();
})
