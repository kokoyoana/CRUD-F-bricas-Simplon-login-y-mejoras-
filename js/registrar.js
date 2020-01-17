function validaciones(id_input, id_span, enviar) {
  var name = document.getElementById(id_input).value;
  name = name.trim();
  if (name.length < 2) {
    document.getElementById(id_span).classList.add("error")
    document.getElementById(id_span).innerHTML = "Ponga un nombre mas largo"
    document.getElementById(enviar).disabled = true;
  }

  else {
    document.getElementById(id_span).classList.remove("error")
    document.getElementById(id_span).innerHTML = "";
    document.getElementById(enviar).disabled = false;
  }

}

function validarcoder(id_input, id_span, enviar) {
  var name = document.getElementById(id_input).value;
  name = name.trim();
  if (name.length < 2) {
    document.getElementById(id_span).classList.add("error")
    document.getElementById(id_span).innerHTML = "Ponga mas caracteres"
    document.getElementById(enviar).disabled = true;
  }
  else {
    document.getElementById(id_span).classList.remove("error")
    document.getElementById(id_span).innerHTML = "";
    document.getElementById(enviar).disabled = false;
  }

}

//    ((([X-Z])|([LM])){1}([-]?)((\d){7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]))



function validarDni() {
  var docId = document.getElementById('dniOk').value;
  if ((/^\d{8}[a-zA-Z]$/.test(docId))) {
   
    //Se separan los números de la letra
    var letraDNI = docId.substring(8, 9).toUpperCase();
    var numDNI = parseInt(docId.substring(0, 8));

    //Se calcula la letra correspondiente al número
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    var letraCorrecta = letras[numDNI % 23];

    if (letraDNI != letraCorrecta) {
      document.getElementById('enviar').disabled = true;
      alert("Has introducido una letra incorrecta");
    }
  }
  else if (!(/^[XxTt]{1}[0-9]{7}[a-zA-Z]{1}$/.test(docId))){
    alert ("Error dni / nie")
  }
  else {
    document.getElementById(id_input).classList.remove("error")
    document.getElementById(id_span).innerHTML = "";
    document.getElementById(enviar).disabled = false;
  }
 
}

var ok = true;

function validarF() {
  var fecha = document.getElementById('fecha').value;
  var calend = fecha.split('-');
  a = calend[0];
  m = calend[1];
  d = calend[2];


  if ((d < 1) || (d > 31) || (m < 1) || (m > 12) || (a < 1950) || (a > 2050)) {
    document.getElementById('enviar').disabled = true;
    ok = alert("fecha no es valida");

  } else {
    if ((d > 28) && (m == 2) && (a % 4 != 0)) {

      document.getElementById('enviar').disabled = true;
      ok = alert("fecha bisiesto");
    } else {
      if ((((m == 4) || (m == 6) || (m == 9) || (m == 11)) && (d > 30)) || ((m == 2) && (d > 29))) {
        document.getElementById('enviar').disabled = true;
        ok = alert("fecha no es valida");
      }
    }
  }
  return ok;

}

