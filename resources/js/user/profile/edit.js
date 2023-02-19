
import axios from "axios";
import { alertConfirmPassword } from "../../helpers/alertConfirmPassword";


import { feedbackForm } from "../../helpers/feedbackForm";


const $formUser = document.getElementById('form-user');


// Functions
const axiosUpdateProfile = async ($form) => {
    try {
        const formData = new FormData($form);

        return await axios.post($form.action, formData, {
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
    const errorData ={
        icon: 'error',
        title: 'Oops...',
        text: '¡Algo salió mal!',
    }
    alertConfirmPassword({
        data:{
            title: '¿Está seguro de editar su perfil?',
            text: 'Para realizar esta acción ingrese su contraseña:',
            icon:'question',
        },
        errorData,
        confirm: async (password)=>{

            $formUser.password.value = password;
            try{
                await axiosUpdateProfile($formUser);
            }
            catch(result)
            {

                if(result.response.status==422)
                {
                    const {response:{data:{errors}}} = result
                    errorData.text = errors['password'][0];
                }

                return Promise.reject(errors);
            }
        },
        end: (msg)=>{
            if(msg=="success") location.reload();
        },
    })
}
// Code execution
$formUser.addEventListener('submit', handlerSubmit);

