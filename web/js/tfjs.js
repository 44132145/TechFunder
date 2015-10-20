window.onload = function(){
    if (!$.cookie('timer'))
        $.cookie( 'timer', 360);

    TimerF();
}

function TimerF()
{
    if (($.cookie('timer') == 0) || (isNaN($.cookie('timer')))) {
        timeOut();
        return false;
    }
    else{
        $.cookie('timer', $.cookie('timer') - 1);
        $('#SecondsNumber').text(($.cookie('timer') >= 100)? $.cookie('timer'): (($.cookie('timer') >= 10)? '0'+$.cookie('timer'): '00'+$.cookie('timer')));
        setTimeout( TimerF, 1000);
    }
}

function timeOut()
{
    $.ajax({
        url: "/site/lock",
        context: document.body
    }).done(function(data) {
        $('head').append('<link rel="stylesheet" href="/css/lockMSG.css" type="text/css" />');
        $("#form_block").html(data);
    });

    alert('time is over');
}