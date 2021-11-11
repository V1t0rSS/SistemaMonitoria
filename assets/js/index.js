$("#enviar").on("click",e=>{
    e.preventDefault()
    var nome = $("#nome")
    var tel = $("#tel")
    var mat = $("#matricula")
    var email = $("#email")
    var email2 = $("#email2")
    var senha = $("#senha")
    var senha2 = $("#senha2")
    
    if(!(nome.val())){
        nome.css({"border":"2px solid red"})
    }else{
        nome.css({"border":"1px solid lightgray"})
    }

    if(!(tel.val())){
        tel.css({"border":"2px solid red"})
    }else{
        tel.css({"border":"1px solid lightgray"})
    }

    if(!(mat.val())){
        mat.css({"border":"2px solid red"})
    }else{
        mat.css({"border":"1px solid lightgray"})
    }

    if(!(email.val())){
        email.css({"border":"2px solid red"})
    }else{
        email.css({"border":"1px solid lightgray"})
    }

    if(!(email2.val())){
        email2.css({"border":"2px solid red"})
    }else{
        email2.css({"border":"1px solid lightgray"})
    }

    if(!(senha.val())){
        senha.css({"border":"2px solid red"})
    }else{
        senha.css({"border":"1px solid lightgray"})
    }

    if(!(senha2.val())){
        senha2.css({"border":"2px solid red"})
    }else{
        senha2.css({"border":"1px solid lightgray"})
    }
    
})
