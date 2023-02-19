import axios from "axios";
import { ModalChangePassword } from "../../components/user/ModalChangePassword";
import { alertConfirm } from "../../helpers/alertConfirm";
import { feedbackForm } from "../../helpers/feedbackForm";

const $btnShowModalChangePassword = document.getElementById('btn-show-modal-change-password');
const $formDeleteUser = document.getElementById('form-delete-user');

// Functions
const axiosUpdatePassword = async ($form) => {

    try {
        const toSend = {
            password: $form.password.value,
            new_password: $form.new_password.value,
            repeat_new_password: $form.repeat_new_password.value,
        }

        await axios.put(
            $btnShowModalChangePassword.href,
            toSend,
        )
    } catch (result) {
        const { response } = result;

        if (response.status == 422) {
        const { errors } = response.data;
            feedbackForm($form, errors);
        }

        return Promise.reject(result);
    }

}

async function saveChangePass($form) {

    alertConfirm({
        data: {
            title: "¿Está seguro de cambiar su contraseña?",
            text: '',
            icon: 'question',
        },
        confirm: async () => {
            await axiosUpdatePassword($form);
        },
        end: (msg)=>{
            if(msg=="success") location.reload();
        },
    })

}


const deleteProfile = async (e) =>{
    e.preventDefault();
    const $form = e.target;

    alertConfirm({
        data: {
            title: "¿Está seguro de eliminar su perfil?",
            text: 'Se dejarán de mostrar sus productos, podrá volver a recuperar su cuenta iniciando sesión más tarde.',
            icon: 'warning',
        },
        confirm: async () => {

            try {
                await axios.post($form.action,{
                    _method: 'delete',
                })
            } catch (error) {
                return Promise.reject(error);
            }
        },
        end: (msg)=>{
            if(msg=="success") location.reload();
        },
    })

}




// run code
ModalChangePassword({
    btnShow: $btnShowModalChangePassword,
    clickSave: saveChangePass,
})
if($formDeleteUser)
    $formDeleteUser.addEventListener('submit',deleteProfile)
