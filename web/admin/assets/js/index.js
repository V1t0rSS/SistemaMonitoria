document.addEventListener("DOMContentLoaded", function(event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
        const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        mainContainer = document.getElementById(bodyId),
        headerpd = document.getElementById(headerId)
        
        // Validate that all variables exist
        if(toggle && nav && mainContainer && headerpd){
            toggle.addEventListener('click', ()=>{
                // show navbar
                nav.classList.toggle('show-sidebar')
                // add padding to body
                mainContainer.classList.toggle('padded')
                // add padding to header
                headerpd.classList.toggle('padded')
            })
        }
    }
    
    showNavbar('header-toggle','nav-bar','main-container','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
        if(linkColor){
            linkColor.forEach(l=> l.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
    if($("select[name='professor_id']")) {
        $.ajax({
            'url': "/SistemaMonitoria/api/Professores.php",
            'method': "GET",
            'contentType': 'application/json'
        }).done( function(data) {
            json = JSON.parse(data);
            options = "";
            json.forEach(professor => {
                options += "<option value='"+ professor.id +"'>"+ professor.nome +"</option>";
            });
            $("select[name='professor_id']").html(options);
        })
    }

    if($("select[name='disciplina_id']")) {
        $.ajax({
            'url': "/SistemaMonitoria/api/Disciplinas.php",
            'method': "GET",
            'contentType': 'application/json'
        }).done( function(data) {
            json = JSON.parse(data);
            options = "";
            json.forEach(disciplina => {
                options += "<option value='"+ disciplina.id +"'>"+ disciplina.titulo +"</option>";
            });
            $("select[name='disciplina_id']").html(options);
        })
    }

    $('.time').mask('00:00');

// Your code to run since DOM is loaded and ready
});