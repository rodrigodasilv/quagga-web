function validateForm(){
    if (document.getElementById('sala').value.trim().length != 0 &&
        document.getElementById('nomeProf').value.trim().length === 0){
            return true;
         }else if (document.getElementById('sala').value.trim().length === 0 &&
         document.getElementById('nomeProf').value.trim().length != 0){
            return true;
         }else{
            alert("Verificar os dados informados!");
            return false;   
         }
}