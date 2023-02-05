var btn = document.getElementById("btn_cargar_usuarios");

var loader = document.getElementById("loader");// loader es el elemento que contiene la imagen de carga

 // open es un método que nos permite abrir una petición, recibe 2 parámetros, el método y la url");


btn.addEventListener("click", function(){
    var peticion = new XMLHttpRequest(); // XMLHttpRequest es un objeto que nos permite hacer peticiones HTTP
    peticion.open("GET", "php/leer_datos.php", true);
    loader.classList.add("active")// classList es una propiedad que nos permite agregar clases a un elemento

    formulario 
    peticion.onload = function(){ // onload es un evento que se ejecuta cuando la petición se ha completado
        var datos = JSON.parse(peticion.responseText);// responseText es una propiedad que nos permite obtener la respuesta de la petición la respuesta es un string por lo que debemos convertirla a JSON
        // console.log(datos);
        // opcion 1
        for(var i = 0; i < datos.length; i++){
            var Elemento = document.createElement("tr");// createElement es un método que nos permite crear un elemento
            Elemento.innerHTML += "<td>"+datos[i].id+"</td>";// innerHTML es una propiedad que nos permite agregar contenido a un elemento
            Elemento.innerHTML += "<td>"+datos[i].nombre+"</td>";
            Elemento.innerHTML += "<td>"+datos[i].edad+"</td>";
            Elemento.innerHTML += "<td>"+datos[i].pais+"</td>";
            Elemento.innerHTML += "<td>"+datos[i].correo+"</td>";
            document.getElementById("tabla").appendChild(Elemento);// appendChild es un método que nos permite agregar un elemento a otro
        }





        //opcion 2
        // datos.forEach(element => {
        //     var Elemento = document.createElement("tr");// createElement es un método que nos permite crear un elemento
        //     Elemento.innerHTML += "<td>"+element.codigo+"</td>";// innerHTML es una propiedad que nos permite agregar contenido a un elemento
        //     Elemento.innerHTML += "<td>"+element.descripcion+"</td>";
        //     Elemento.innerHTML += "<td>"+element.precio+"</td>";
        //     document.getElementById("tabla").appendChild(Elemento);// appendChild es un método que nos permite agregar un elemento a otro
        // } );
    }
    // peticion.onreadystatechange = function(){

    //     console.log(peticion.readyState);// readyState es una propiedad que nos permite saber el estado de la petición 2 = cargando, 3 = cargado, 4 = terminado
    //     if(peticion.readyState == 4 && peticion.status == 200){// status es una propiedad que nos permite saber el estado de la petición 200 = correcto, 404 = error
    //         loader.classList.remove("active");
    //     }
    // }
    peticion.send();

});