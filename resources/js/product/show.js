import 'viewerjs/dist/viewer.css';
import Viewer from 'viewerjs';
import { ModalShow } from '../components/user/ModalShow';
import { ModalReportProduct } from '../components/helpers/ModalReportProduct';

const $btnReport = document.getElementById('btn-report');
const $linkUsername = document.getElementById('link-username');
const gallery = new Viewer(document.getElementById('images'),{
    inline: true,
    title: false,
    rotatable: false,
    scalable: false,

  });


//   code execution
ModalShow($linkUsername,{
    username: $linkUsername.dataset.username,
    name: $linkUsername.dataset.name,
    last_name: $linkUsername.dataset.last_name,
});

ModalReportProduct({
    btnShow:$btnReport,
});
