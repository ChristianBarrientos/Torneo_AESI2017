alertSize();

function alertSize() { 
  var myWidth = 0, myHeight = 0; 
  if( typeof( window.innerWidth ) == 'number' ) { 
    //No-IE 
    myWidth = window.innerWidth; 
    myHeight = window.innerHeight; 
  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
    //IE 6+ 
    myWidth = document.documentElement.clientWidth; 
    myHeight = document.documentElement.clientHeight; 
  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
    //IE 4 compatible 
    myWidth = document.body.clientWidth; 
    myHeight = document.body.clientHeight; 
  } 

  	var display;
	var card_menu = document.getElementById("card_menu");
	display = card_menu.style.display;

	if (myWidth < 767) {
		card_menu.style.display = "none";
	}
	else{
		card_menu.style.display = "block";
	}
    
} 


function displayMenu(){
	var display;
	var card_menu = document.getElementById("card_menu");
	display = card_menu.style.display;

	if(display == "none"){
		card_menu.style.display = "block";
	}
	else{
		card_menu.style.display = "none";
	}

}

function displayForm(estado){
	
	var form = document.getElementById("inscrip_form");
	form.style.display = estado;
}

