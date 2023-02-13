
import axios from "axios";

import { alertConfirm } from "../../helpers/alertConfirm";
import { feedbackForm } from "../../helpers/feedbackForm";


const $formUser = document.getElementById('form-user');


// Functions
const axiosUpdateProfile = async ($form) => {
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

            feedbackForm($formUser, errors);
        }
        console.error(result);
        return Promise.reject(result);
    }
}

const handlerSubmit = async (e) => {
    e.preventDefault();

    alertConfirm({
        data:{
            title: '¿Está seguro de editar su perfil?',
            text: 'Podrá revertir o editar esta acción más tarde.',
            icon:'question',
        },
        confirm: async ()=>await axiosUpdateProfile($formUser),
        end: (msg)=>{
            if(msg=="success") location.reload();
        },
    })
}
// Code execution
$formUser.addEventListener('submit', handlerSubmit);

