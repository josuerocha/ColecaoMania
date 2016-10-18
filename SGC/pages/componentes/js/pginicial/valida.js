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

function ValidaAno()
{
    var anoSelect = document.getElementById('ano');

    if (anoSelect.value == 0) {
        alert("O ano precisa ser selecionado!");
        anoSelect.focus();
    }
}

function ValidaTexto()
{
    var editorTxt = document.getElementById('editor1');
    if (editorTxt.value == "") {
        alert("Você não digitou o texto!");
        editorTxt.focus();
    }
}