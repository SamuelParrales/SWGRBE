import { LoaderMain } from "../components/helpers/LoaderMain";
const loaderMain = LoaderMain();
export const alertConfirmPassword = async ({
    data = {
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'question',
    },
    errorData={
        icon: 'error',
        title: 'Oops...',
        text: '¡Algo salió mal!',
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
        input: 'password',
        inputPlaceholder: 'Contraseña',
        inputValidator: (value) => {
            return new Promise((resolve) => {
              if (value) {
                resolve()
              } else {
                resolve('El campo contraseña es obligatorio.')
              }
            })
        }
    });

    let endMsg = "";
    if (result.isConfirmed) {
        loaderMain.show();
        loaderMain.show();
        if (confirm) {
            try {

                await confirm?.(result.value);
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
                await Swal.fire(errorData)
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
