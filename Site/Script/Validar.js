
//Vereficar cadastro

function validarForm() {
  var nomeInput = document.getElementById("nomeInput").value;

  if (nomeInput.trim() === "") {
    document.getElementById("erroNome").style.display = "block";
    return false; 
  }

  var regex = /['!@#$%^&*()_+{}\[\]:;<>,.?~\\]/;
  if (regex.test(nomeInput)) {
    document.getElementById("erroNome").style.display = "block";
    return false; 
  }

  document.getElementById("erroNome").style.display = "none";
  return true;
}
