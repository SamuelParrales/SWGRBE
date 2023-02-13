
import axios from "axios";
import { ModalUploadImgs } from "../components/helpers/ModalUploadImgs";
import { alertConfirm } from "../helpers/alertConfirm";
import { feedbackForm } from "../helpers/feedbackForm";

const $inputUploadImg = document.getElementById('input-upload-img');
const modal = ModalUploadImgs($inputUploadImg);
const $formProduct = document.getElementById('form-product');

const $imgs = document.querySelectorAll('.product-img');
const urls =[].map.call($imgs,(img)=>{
    return img.src;
})

modal.fileUploadWithPreview.addImagesFromPath(urls);

// Functions
const axiosUpdateProduct = async () => {
    try {
        const formData = new FormData($formProduct);
        const images = $formProduct.images.files;
        formData.delete('images');

        formData.set('has_whatsapp',$formProduct.has_whatsapp.checked?1:0);

        for (const file of images) {
            formData.append('images[]', file);
        }

        await axios.post($formProduct.action, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });

    } catch (result) {
        const { response } = result;

        if (response.status == 422) {
            const { errors } = response.data;
            if(errors['images.0'])
            {
                errors['images'] = errors['images.0'];
            }
            feedbackForm($formProduct, errors);
        }
        console.error(result);
        return Promise.reject(result);
    }
}

const handlerSubmit = async (e) => {
    e.preventDefault();

    alertConfirm({
        data:{
            title: '¿Está seguro de editar este producto?',
            text: 'Podrá revertir o editar esta acción más tarde.',
            icon:'question',
        },
        confirm: axiosUpdateProduct,
        end: (msg)=>{
            if(msg=="success") location.reload();
        },
    })
}
// Code execution
$formProduct.addEventListener('submit', handlerSubmit);

