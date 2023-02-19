import { alertConfirm } from "../../../helpers/alertConfirm";
import { feedbackForm } from "../../../helpers/feedbackForm";

const $formCreateModerator = document.getElementById('form-create-moderator');

// Functions
const axiosStoreModerator = async ($form) => {
    try {
        const formData = new FormData($form);
        await axios.post($form.action, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });

    } catch (result) {
        const { response } = result;

        if (response.status == 422) {
            const { errors } = response.data;

            feedbackForm($form, errors);

        }
        console.error(result);
        return Promise.reject(result);
    }
}

const handlerSubmit = async (e) => {
    e.preventDefault();
    const {target} = e;
    alertConfirm({
        data:{
            title: '¿Está seguro de crear este moderador?',
            text: 'Podrá revertir o editar esta acción más tarde.',
            icon:'question',
        },
        confirm: async()=> await axiosStoreModerator(target),
        end: (msg)=>{
            if(msg=="success") location.reload();
        },
    })
}
$formCreateModerator.addEventListener('submit',handlerSubmit)
