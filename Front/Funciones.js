var Opacidad = 0;

function Envanecer(Elemento){
	var Div = document.getElementById("Fondo");
	var Pan = document.getElementById(Elemento);
    Opacidad = Opacidad + .1;
    Div.style.background = "rgba(196, 196, 196, "+Opacidad+")";
    Div.style.visibility= "visible";

    if(Opacidad > 0 && Opacidad < 0.5){
    	window.setTimeout("Envanecer('"+Elemento+"');",0.5);
    	Pan.style.visibility= "visible";
    }
}

function Cerrar(Elemento){
	var Div = document.getElementById("Fondo");
	var Pan = document.getElementById(Elemento);
	Div.style.visibility= "hidden";
	Pan.style.visibility= "hidden";
	Opacidad = 0;
	Div.style.background = "rgba(196, 196, 196, "+Opacidad+")"
}

function sobre(Elemento) {
	var Div = document.getElementById(Elemento);
	Div.src = "Resources/"+Elemento+"Hover.png";
}

function fuera(Elemento) {
	var Div = document.getElementById(Elemento);
	Div.src = "Resources/"+Elemento+".png";
}

function cambio(){
	var image = document.getElementById('MenuImg');
    if (image.src.match("menu")) {
        image.src = "Resources/cancelar.png";
    } else {
        image.src = "Resources/menu.png";
    }
}