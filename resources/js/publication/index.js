

import axios from "axios";
import { alertConfirm } from "../helpers/alertConfirm";


// Delegacion de eventos

document.addEventListener('click',(e)=>{
    if(e.target.matches('.edit-publication') || e.target.matches('.edit-publication *')){
        e.preventDefault();
        const btn = e.target.tagName=='A'?e.target:e.target.closest('a');


        const pubCard = btn.closest('.publication-card');
        const pubContent = pubCard.querySelector('.publication-content');
        pubContent.classList.toggle('show');
    }
});

document.addEventListener('submit', async (e)=>{
    if(!e.target.matches('.publication-form')) return;
    e.preventDefault();
    await alertConfirm({
        data: {
            title: '¿Está seguro de guardar estos cambios?',
            text: 'Podrá cambiar esta acción más tade.',
            icon: 'warning',
        },
        confirm: async () => {
            console.log("ss")
            try {
                await axios.post(
                    e.target.action,
                    new FormData(e.target), {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
            } catch (error) {
                console.log(error);
                return Promise.reject(error);
            }
        },
        end: (msg) => {

            if (msg == "success") location.reload();
        },
    })
});


document.addEventListener('click', async (e)=>{

    if(!(e.target.matches('.delete-publication') || e.target.matches('.delete-publication *')))
        return;
    e.preventDefault();

    const btn = e.target.tagName=='A'?e.target:e.target.closest('a');

    await alertConfirm({
        data: {
            title: '¿Está seguro de eliminar esta publicación?',
            text: 'Esta acción no podrá ser revertida.',
            icon: 'warning',
        },
        confirm: async () => {
            try {
                await axios.delete(
                    btn.href,
                    )
            } catch (error) {
                return Promise.reject(error);
            }
        },
        end: (msg) => {
            if (msg == "success") location.reload();
        },
    })

});
