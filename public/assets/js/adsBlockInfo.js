/**
 * Всплывающее окно при наведение на рекламный блок в статье
 *
 */


    var blockLink = $('.adsBlockInfo a');

    blockLink.click(function(e){

        e.preventDefault();

        var ev = $(e.target); // ссылка-инициатор события
        var modal = $('#myModal'); // html  каркас модального окна

        if (ev.hasClass('nal')) {

	        modal.modal({
	        	// при переносе на сервер возможны баги, надо тестить
	        	remote: "../ads/nal"  

	        });

        }else if (ev.hasClass('card')){

	        modal.modal({
	        	
	        	remote: "../ads/card"  

	        });
	        
        }
        else if (ev.hasClass('micro')){

	        modal.modal({
	        	
	        	remote: "../ads/micro"  

	        });
	        
        }
        else if (ev.hasClass('hold')){

	        modal.modal({
	        	
	        	remote: "../ads/hold"  

	        });
	        
        }
        else if (ev.hasClass('auto')){

	        modal.modal({
	        	
	        	remote: "../ads/auto"  

	        });
	        
        }
        else if (ev.hasClass('mort')){

	        modal.modal({
	        	
	        	remote: "../ads/mort"  

	        });
	        
        }
        else if (ev.hasClass('biz')){

	        modal.modal({
	        	
	        	remote: "../ads/biz"  

	        });
	        
        }


    });

