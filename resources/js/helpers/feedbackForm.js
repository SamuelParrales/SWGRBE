const validFeedBack ="¡Se ve bien!"

export const feedbackForm = (form, msg)=>{ //Validación
    const inputs = form.querySelectorAll('[name].feedback');

    for (const input of inputs) {
        let name = input.name;
        const parent = input.parentElement;
        const $msgFeedBack = parent.querySelector('.msg-feedback');
        let msgFeedBack ="";
        if(msg[name] ) //Si hay mensaje, es invalido
        {

            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
            msgFeedBack = msg[name][0];
        }
        else
        {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
            msgFeedBack = validFeedBack;
        }

        if(!$msgFeedBack) continue;

        if(msgFeedBack==validFeedBack)
        {
            $msgFeedBack.classList.add("valid-feedback");
            $msgFeedBack.classList.remove('invalid-feedback');
        }
        else
        {
            $msgFeedBack.classList.add("invalid-feedback");
            $msgFeedBack.classList.remove('valid-feedback');
        }
        $msgFeedBack.textContent = msgFeedBack;
    }
};
