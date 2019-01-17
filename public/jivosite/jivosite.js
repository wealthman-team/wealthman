
/*
	Коллбек-функция, вызывается сразу после того, как
	JivoSite окончательно загрузился
*/
function jivo_onLoadCallback(){
    let jivo_button = document.getElementsByClassName("js-jivo-button");
    for (let i = 0; i < jivo_button.length; i++) {
        // Добавляем обработчик клика по ярлыку - чтобы при клике разворачивалось окно
        jivo_button[i].onclick = function(e){
        	e.preventDefault();
        	console.log('click');
            jivo_api.open();
        };
    }
}
