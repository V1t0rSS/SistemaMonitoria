//Esconde a mensagem de erro na tela de cadastro assim que ela aparecer
$("#alert-blank").hide()

//Garante que todas as células do calendário tem o mesmo tamanho
var alt_celula = $("#calendario .col").css("width")
$("#calendario .row").css({"height":alt_celula})

//Verificação do cadastro
$("#enviar").on("click",e=>{

    //Previne default e carrega todos os inputs do formulário
    e.preventDefault()

    var nome = $("#nome")
    var tel = $("#tel")
    var mat = $("#matricula")
    var email = $("#email")
    var email2 = $("#email2")
    var senha = $("#senha")
    var senha2 = $("#senha2")

    /**
     * campo vazio: 1
     * emails não batem: 2;
     * senhas não batem: 3;
     * futuramente: email invalido: 4;
     * futuramente: senha inválida: 5;
     */

    var erro = 0
    
    //Verifica se os campos estão vazios
    if(!(nome.val())){
        nome.css({"border":"2px solid red"})
        erro = 1
    }else{
        nome.css({"border":"1px solid lightgray"})
    }

    if(!(tel.val())){
        tel.css({"border":"2px solid red"})
        erro = 1
    }else{
        tel.css({"border":"1px solid lightgray"})
    }

    if(!(mat.val())){
        mat.css({"border":"2px solid red"})
        erro = 1
    }else{
        mat.css({"border":"1px solid lightgray"})
    }

    if(!(email.val())){
        email.css({"border":"2px solid red"})
        erro = 1
    }else{
        email.css({"border":"1px solid lightgray"})
    }

    if(!(email2.val())){
        email2.css({"border":"2px solid red"})
        erro = 1
    }else{
        email2.css({"border":"1px solid lightgray"})
    }

    if(!(senha.val())){
        senha.css({"border":"2px solid red"})
        erro = 1
    }else{
        senha.css({"border":"1px solid lightgray"})
    }

    if(!(senha2.val())){
        senha2.css({"border":"2px solid red"})
        erro = 1
    }else{
        senha2.css({"border":"1px solid lightgray"})
    }
    
    //Mostra uma mensagem diferente dependendo do erro

    switch (erro){
        case 0:
            $("#alert-blank").hide(300)
            break;
        case 1:
            $("#alert-blank").show(300)
            break;
        default:
            break;
    }
})



