/**
 * Created by razumov on 27.07.2015.
 */
$(document).ready(function(){



    var borderStatus = true;

    /**
     * Циклически меняет рамку вокруг кнопки "Отправить заявку"
     * для привлечения внимания
     *
     * @return void
     */
    function setBorderStatus(){

        if(borderStatus){
            $('.btnOffer').css('box-shadow', '0px 0px 25px 0px rgba(0, 183, 6, 0.7)');
        }else{
            $('.btnOffer').css('box-shadow', 'none');
        }
        borderStatus = !borderStatus;
        setTimeout(setBorderStatus, 300);
    }
    // инициализируем
    setBorderStatus();

    // подсказка пр наведении на кнопку "Отправить заявку"
    $(".btnOffer").tooltip({
        content : '<blockquote style="border-left: 5px solid #57e9f3;">Нажмите на эту кнопку. Заполните простую заявку. И получите деньги! </blockquote>',
        html: true,
        delay: { show: 1000, hide: 500 }
    });


});