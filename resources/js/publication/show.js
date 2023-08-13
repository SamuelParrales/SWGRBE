import { alertConfirm } from "../helpers/alertConfirm";


document.addEventListener('keypress',(e)=>{
    if(!e.target.matches('.enter-submit')) return;
    if(e.keyCode==13){
        const form = e.target.closest('form');
        form.requestSubmit()
        e.target.disabled = true;
    }
    setTimeout(()=>{
        location.reload()
    },300);
});

document.addEventListener('click',(e)=>{
    if(e.target.matches('.edit-comment') || e.target.matches('.edit-comment *')){
        e.preventDefault();
        const btn = e.target.tagName=='A'?e.target:e.target.closest('a');


        const pubCard = btn.closest('.comment-card');
        const pubContent = pubCard.querySelector('.comment-content');
        pubContent.classList.toggle('show');
    }
});


document.addEventListener('click', async (e)=>{

    if(!(e.target.matches('.delete-comment') || e.target.matches('.delete-comment *')))
        return;
    e.preventDefault();

    const btn = e.target.tagName=='A'?e.target:e.target.closest('a');

    await alertConfirm({
        data: {
            title: '¿Está seguro de eliminar este comentario?',
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
