require('./bootstrap');

function handleFiltration() {

    const urlParams = new URLSearchParams(window.location.search);

    if(!$(this).hasClass('reset-tag-filter')){
        const filterValue = $(this).data('filter');
        const param = urlParams.get('tag');

        if(param !== '' && param !== null){
            let paramArr = param.split(';');
            if(paramArr.includes(filterValue)){

                paramArr = paramArr.filter(item => item !== filterValue);

                urlParams.set('tag', paramArr.join(';'));
            }
            else {
                urlParams.set('tag', param+';'+filterValue);
            }
        }
        else {
            urlParams.set('tag', filterValue);
        }
    }
    else {
        urlParams.delete("tag");
    }

    urlParams.delete("page");
    window.location.search = urlParams;
}

$(function(){
    $(document).on('click', '.tag-filter', handleFiltration);
});