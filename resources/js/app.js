import './bootstrap';
import { LoaderMain } from './components/helpers/LoaderMain';

const loaderMain = LoaderMain();
const $formMainSearch = document.getElementById('form-main-search');


window.addEventListener('load',()=>loaderMain.remove());
document.addEventListener('click',(e)=>{
    if(!e.target.matches('.category-link') && !e.target.matches('.category-link *')) return;

    e.preventDefault();
    const $btn = e.target.tagName == 'A' ? e.target : e.target.closest('a');

    $formMainSearch.category_id.value = $btn.dataset.id;
    $formMainSearch.submit();
})
