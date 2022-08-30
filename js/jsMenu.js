

function boton(){
    var nav = document.getElementById("navbar");
    var bodypd = document.getElementById("body-pd");
    var perfilpd = document.getElementById("profile-pd");
    
    nav.classList.toggle("expander");
    bodypd.classList.toggle("body-pd");
    perfilpd.classList.toggle("profile-pd");   
}