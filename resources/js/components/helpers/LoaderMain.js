// import './../../../css/components/helpers/LoaderMain.css'
const $contentLoader = document.createElement('div');
$contentLoader.id = "content-loader-main";
const $loaderMain = document.createElement('span');
$loaderMain.className ="loader-main";
$contentLoader.append($loaderMain);

export const LoaderMain = () => {

    const show=()=>{
        if(!document.getElementById('content-loader-main'))
            document.body.append($contentLoader);
    }
    const remove=()=>{
        const target = document.getElementById('content-loader-main')
        if(target)
            document.body.removeChild(target);
    }
    return {
        show,
        remove
    }
}
