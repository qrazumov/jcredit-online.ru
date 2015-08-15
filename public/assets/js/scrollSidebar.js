/**
 * Created by xxx on 07.08.2015.
 */

/**
 * Эта фича на стадии разработки
 *
 */
//$(window).on('scroll', function(e){
//
//    var bodyScroll = $('body').scrollTop();
//
//    var offsetRSidebar = $('#rSidebar').offset().top;
//
//    if(bodyScroll > offsetRSidebar){
//        console.log('условие');
//    }
//    console.log('bodyScroll = ' + bodyScroll);
//    console.log('offsetRSidebar = ' + offsetRSidebar);
//    //alert('равно');
//
//
//
//});

//window.onscroll = function() {
//    alert('равно');
//};


    $('#rSidebar').hcSticky({
        top: 20,
        //innerTop: 50,
        stickTo: document,
        //noContainer: true,
        //bottomEnd: 233,
        responsive: true,
        onStart: function(){

            console.log('ok');
            $('#widget-r-s-offers').css('display', 'none');

        },
        onStop: function(){

            console.log('cl');
            $('#widget-r-s-offers').css('display', 'block');

        },
       offResolutions: [-992]
    });

$('.adsBlockInfo').hcSticky({
    top: 0,
    //innerTop: 50,
    //stickTo: document,
    //noContainer: true,
    //bottomEnd: 233,
    responsive: true,
    offResolutions: [-992]
});

//var offsetRSidebar_1 = $('.rSidebar').eq(1).offset().top;
////
//$('#rSidebar').hcSticky(fun);

