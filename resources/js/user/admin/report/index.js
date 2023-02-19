import { alertConfirm } from "../../../helpers/alertConfirm";


// Functions

const axiosDestroyReport= async (url, formData)=>{
    try {
        await axios.post(
            url,
            formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
    }
    catch(error)
    {
        return Promise.reject(error);
    }
}

document.addEventListener('submit', async (e) => {
    const target = e.target;
    if (!target.matches('.form-delete-report')) return;
    e.preventDefault();


    await alertConfirm({
        data: {
            title: '¿Está seguro de eliminar este reporte?',
            text: 'Esta acción no podrá ser revertida.',
            icon: 'question',
        },
        confirm: async () => await axiosDestroyReport(target.action,new FormData(target)),
        end: (msg) => {
            if (msg == "success") location.reload();
        },
    })

})
