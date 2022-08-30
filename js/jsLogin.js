function mostrarContra(){
    var x = document.getElementById("contra");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");
    
    if(x.type === 'password'){
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
       }else{
           x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
       }
}

function cambiaInput(clickeado){
    var x = document.getElementById(clickeado);
    var y = document.querySelector(".press");
    if(x != y){
        if(y != null){
            x.className += " press";
            y.classList.remove("press");
        }else{
            x.className += " press";
        }
    }
    
}