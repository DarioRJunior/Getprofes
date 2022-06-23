function maskCPF(numberCPF) {
    var cpf = numberCPF.value;

    if (isNaN(cpf[cpf.length - 1])) {
        numberCPF.value = cpf.substring(0, cpf.length - 1);
        return;
    }

    if (cpf.length === 3 || cpf.length === 7) {
        numberCPF.value += ".";
    }
    if (cpf.length === 11) {
        numberCPF.value += "-";
    }
}

function validar(){
    var cpf = document.getElementById("cpf").value;
    if(cpf.length != 14){
        alert("CPF inválido, por favor digite um CPF válido");
        document.getElementById("submit").disabled = true;
        document.getElementById('submit').style.opacity = '0.5';
        document.getElementById('submit').style.cursor = 'not-allowed';
        document.getElementById("update").disabled = true;
        document.getElementById('update').style.opacity = '0.5';
        document.getElementById('update').style.cursor = 'not-allowed';
    } else {
        document.getElementById("submit").disabled = false;
        document.getElementById('submit').style.opacity = '1';
        document.getElementById('submit').style.cursor = 'pointer';
        document.getElementById("update").disabled = false;
        document.getElementById('update').style.opacity = '1';
        document.getElementById('update').style.cursor = 'pointer';
    }
}