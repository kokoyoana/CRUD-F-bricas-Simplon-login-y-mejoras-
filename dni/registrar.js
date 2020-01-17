function validaciones(id_input,id_span,enviar) {
    var name = document.getElementById(id_input).value;
    if (name.length < 2) {
        document.getElementById(id_span).classList.add("error")
        document.getElementById(id_span).innerHTML = "Ponga un nombre mas largo"
        document.getElementById(enviar).disabled=true;
    }
   
    else {
        document.getElementById(id_span).classList.remove("error")
        document.getElementById(id_span).innerHTML = "";
        document.getElementById(enviar).disabled=false;
    }

    }

    function validarcoder(id_input,id_span,enviar) {
        var name = document.getElementById(id_input).value;
        if (name.length < 2) {
            document.getElementById(id_span).classList.add("error")
            document.getElementById(id_span).innerHTML = "Ponga mas caracteres"
            document.getElementById(enviar).disabled=true;
        }
        else {
            document.getElementById(id_span).classList.remove("error")
            document.getElementById(id_span).innerHTML = "";
            document.getElementById(enviar).disabled=false;
        }
    
        }

function validarDni(){
  let dni='';
  while(!(/^\d{8}[a-zA-Z]$/.test(dni))){
    dni = prompt("Introduzca un número de DNI: 8 números y una letra");
  }
  
  //Se separan los números de la letra
  var letraDNI = dni.substring(8, 9).toUpperCase();
  var numDNI = parseInt(dni.substring(0, 8));
  
  //Se calcula la letra correspondiente al número
  var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
  var letraCorrecta = letras[numDNI % 23];
  
  if(letraDNI!= letraCorrecta){
    alert("Has introducido una letra incorrecta\nTu letra debería ser: " + letraCorrecta);
  } else {
    alert("Enhorabuena hemos podido validar tu DNI");
  
  }