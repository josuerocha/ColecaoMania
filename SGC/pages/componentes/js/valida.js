function submitonEnter(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode == "13")
    {
        document.form1.submit();
    }
}

function ValidaDtNasc()
{
    var hoje = new Date();
    var data = document.getElementById('dtNasc').value;
    data = new Date(data);

    if (data.getTime() > hoje.getTime())
    {
        alert("Data Inválida!");
        //document.getElementById('dtNasc').focus();
    }
}

function ValidaSenha()
{
    var senhaInput = document.getElementById('senha');
    var confirmSenhaInput = document.getElementById('confirmSenha');

    if (senhaInput.value.length < 8)
    {
        alert('A senha deve ter 8 caracteres!');
    } else
    {
        if (senhaInput.value !== confirmSenhaInput.value)
        {
            alert('Senhas diferentes');
        }
    }
}

function ValidaIdioma()
{
    var idiomaSelect = document.getElementById('idioma');

    if (idiomaSelect.value == 0 || idiomaSelect.value == -1) {
        alert("O idioma precisa ser selecionado!");
        idiomaSelect.focus();
    }
}

function ValidaPais()
{
    var paisSelect = document.getElementById('pais');

    if (paisSelect.value == 0 || paisSelect.value == -1) {
        alert("O país precisa ser selecionado!");
        paisSelect.focus();
    }
}

function ValidaTipo()
{
    var tipoSelect = document.getElementById('tipo');

    if (tipoSelect.value == 0 || tipoSelect.value == -1) {
        alert("O tipo de coleção precisa ser selecionado!");
        tipoSelect.focus();
    }
}

function ValidaInteresse()
{
    var interesseSelect = document.getElementById('interesse');

    if (interesseSelect.value == 0 || interesseSelect.value == -1) {
        alert("O interesse precisa ser selecionado!");
        interesseSelect.focus();
    }
}

function ValidaTexto()
{
    var editorTxt = document.getElementById('resposta');
    if (editorTxt.value == "") {
        alert("Você não digitou o texto!");
        editorTxt.focus();
    }
}

function ValidaData()
{
    var hoje = new Date();
    var data = document.getElementById('data').value;
    data = new Date(data);

    if (data.getTime() < hoje.getTime())
    {
        alert("A data não pode ser menor que a data atual");
        document.getElementById('data').focus();
    }
}



function ValidaHora(hrFornecida)
{

}


function ValidaFiltro()
{
    var filtroSelect = document.getElementById('filtro');

    if (filtroSelect.value == 0 || filtroSelect.value == -1) {
        alert("Selecione o filtro!");
        filtroSelect.focus();
    }
}

/*window.onload = function () {
            var objDiv = document.getElementById('#chat');
            objDiv.scrollTop = objDiv.scrollHeight;
        }*/
        
        
/*document.getElementById('#chat').scrollTop = document.getElementById('#chat').scrollHeight;

var height = 0;
$('#chat').each(function(i, value){
    height += parseInt($(this).height());
});
height += '';
$('#chat').animate({scrollTop: height});
jQuery('#chat').height(height);

/*var div = $('#chat'),
    height = div.height();
var texto = document.getElementById('editor1');
$('#enviarMsg').on('click', function(){
    div.append(texto.value);
    div.animate({scrollTop: height}, 500);
    height += div.height();
});*/

