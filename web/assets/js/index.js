

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
    var error_message
    var erro = 0
    
    

    //Verifica os campos 

    //Senha
    if(!(senha.val())){
        senha.css({"border":"2px solid red"})
        erro = 1
    }else{
        senha.css({"border":"1px solid lightgray"})
    }

    //Senha2
    if(!(senha2.val())){
        senha2.css({"border":"2px solid red"})
        erro = 1
    }else{
        senha2.css({"border":"1px solid lightgray"})
        //Verifica se as senhas são iguais
        if(senha.val() != senha2.val()){
            senha.css({"border":"2px solid red"})
            senha2.css({"border":"2px solid red"})
            erro = 3
        }else{
            senha.css({"border":"1px solid lightgray"})
            senha2.css({"border":"1px solid lightgray"})
        }
    }
    
    //Email
    if(!(email.val())){
        email.css({"border":"2px solid red"})
        erro = 1
    }else{
        email.css({"border":"1px solid lightgray"})
    }

    //Email2
    if(!(email2.val())){
        email2.css({"border":"2px solid red"})
        erro = 1
    }else{
        email2.css({"border":"1px solid lightgray"})
        //Verifica se emails são iguais
        if(email.val() != email2.val()){
            email.css({"border":"2px solid red"})
            email2.css({"border":"2px solid red"})
            erro = 2
        }else{
            email.css({"border":"1px solid lightgray"})
            email2.css({"border":"1px solid lightgray"})
        }
    }

    //Matricula
    if(!(mat.val())){
        mat.css({"border":"2px solid red"})
        erro = 1
    }else{
        mat.css({"border":"1px solid lightgray"})
    }

    //Telefone
    if(!(tel.val())){
        tel.css({"border":"2px solid red"})
        erro = 1
    }else{
        tel.css({"border":"1px solid lightgray"})
    }

    //Nome
    if(!(nome.val())){
        nome.css({"border":"2px solid red"})
        erro = 1
    }else{
        nome.css({"border":"1px solid lightgray"})
    }
    
    //Mostra uma mensagem diferente dependendo do erro

    switch (erro){
        case 0:
            $("#alert-blank").css({"display" : "none"} )
            break;
        case 1:
            error_message = "Todos os campos marcados em vermelho devem ser preenchidos"
            $("#alert-blank").text(error_message)
            $("#alert-blank").css({"display" : "revert"} )
            break;
        case 2:
            error_message = "Os emails não batem"
            $("#alert-blank").text(error_message)
            $("#alert-blank").css({"display" : "revert"} )
            break;
        case 3:
            error_message = "As senhas não batem"
            $("#alert-blank").text(error_message)
            $("#alert-blank").css({"display" : "revert"} )
            break;
        default:
            break;
    }
})



