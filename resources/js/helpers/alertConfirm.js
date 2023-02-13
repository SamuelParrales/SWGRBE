import { LoaderMain } from "../components/helpers/LoaderMain";
const loaderMain = LoaderMain();
export const alertConfirm = async ({
    data = {
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'question',
    },
    confirm,
    cancel,
    end,
}) => {
    const result = await Swal.fire({
        ...data,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No',

    });
    let endMsg = "";
    if (result.isConfirmed) {
        loaderMain.show();
        loaderMain.show();
        if (confirm) {
            try {

                await confirm();
                loaderMain.remove();
                await Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: 'Tu acción ha sido realizada.',

                });
                endMsg = "success";
            }
            catch (e) {
                loaderMain.remove();
                await Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡Algo salió mal!',
                })
                endMsg = "error";
            }
            finally{
                loaderMain.remove();
            };


        }
        else {
            await cancel?.();
            endMsg = "cancel";
        }

        await end?.(endMsg);


    }
}
