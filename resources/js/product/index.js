const $selectOrderBy = document.querySelector('select[name="order_by"]');
const $formMainSearch = document.getElementById('form-main-search');

$selectOrderBy.addEventListener('change',()=>{

    const name = $formMainSearch.name.value;
    const category_id = $formMainSearch.category_id.value;

    const url = `${location.pathname}?category_id=${category_id}&name=${name}&order_by=${$selectOrderBy.value}`

    location.replace(url)
})

