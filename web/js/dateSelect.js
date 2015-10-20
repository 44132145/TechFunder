$('#date_yy').change(function(){
    checkDays();
    setNevDate();
})

$('#date_mm').change(function(){
    checkDays();
    setNevDate();
})

$('#date_dd').change(function(){
    setNevDate();
})

function checkDays()
{
    days = (new Date($('#date_yy').val(), $('#date_mm').val(), 0)).getDate();
    selected = (parseInt($('#date_dd').val()) > parseInt(days))? days: $('#date_dd').val();

    $('#date_dd').remove();
    sel = $('<select id="date_dd"/>')
    for (i = 1; i <= parseInt(days); i++)
    {
        if (i == parseInt(selected))
            sel.append($("<option>").attr('selected','').text(((i < 10)? '0'+i: i)));
        else
            sel.append($("<option>").text(((i < 10)? '0'+i: i)));
    }

    $('#dateBlock').append(sel);
    $('#date_dd').change(function(){setNevDate();})

    $('#date_dd').val(selected);
}

function setNevDate()
{
    $('#formuser-birthday').val($('#date_yy').val() + '-' + $('#date_mm').val() + '-' + $('#date_dd').val());
}