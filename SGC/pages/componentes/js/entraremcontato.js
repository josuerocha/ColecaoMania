$('#form-chat').submit(function(event)
{	
    event.preventDefault(); // if you want to disable the action
    var $form = $(this),
    usuRecebeValue = $form.find('input[name="idUsuRecebe"]').val(),
    horaValue = $form.find('input[name="hora"]').val(),
    fotoValue = $form.find('input[name="foto"]').val(),
    nomeValue = $form.find('input[name="nome"]').val(),
    chatTextValue = $form.find('input[name="chattext"]').val(),
    type = $form.attr('method'),
    url = $form.attr('action');

    var posting = $.post(url,{idUsuRecebe: usuRecebeValue,hora: horaValue,foto: fotoValue,nome: nomeValue,chattext: chatTextValue},function(data,status){
            if(status == 'success'){
                    $("#lugar").empty().append(data);
                    $('#chat-text').val('');
                    //alert(data);
                }
            }
        );
});