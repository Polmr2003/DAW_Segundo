// cuando cargue la paguina
document.addEventListener("DOMContentLoaded", function () {
    // cuando le de click al boton con al id myBtn
    document.getElementById("myBtn").addEventListener("click", function () {
        
        // window.close; (cierra la ventana donde esta);
        // windos.open ; (abre una ventana donde esta);
        
        // abrir la url que le pongamos
        // window.open("https://campus.proven.cat/");

        // a los 3 segundos lanzara esta funcion
        //setTimeout(saludo, 3000);
    
        // setTimeout(function(){
        //    return saludo();
        // },3000);

        //-----------------------------------------------Ejercicio-----------------------------------------
       
        //recoger los valores de las cajas
       let dia = document.getElementById("dia").value;
       let mes = document.getElementById("mes").value;
       let año = document.getElementById("año").value;
        
        if(isNaN(dia) || isNaN(mes) || isNaN(año)){ // si uno de ellos no es un numero entrara
           alert("esta/n mal el/los dato/s solo se aceptan numeros");
           document.getElementById("dia").value="";
           document.getElementById("mes").value="";
           document.getElementById("año").value="";

        }else{ //cuando los tres parametros sean un numero entrara
            let data= new Date(año, mes-1, dia);// mes va del 0 al 11
            
            let mesos=["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octbre", "Noviembre", "Diciembre"];
            let mes=data.getMonth();
            let dia=data.getDay();
            

            alert(data);
        }


    });

});

//funcion
function saludo() {
    alert("hello");
}