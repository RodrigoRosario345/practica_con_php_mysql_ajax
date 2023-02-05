var btn_Cargar = document.getElementById("btn_cargar_usuarios"),
    error_box = document.getElementById("error_box"),
    tabla = document.getElementById("tabla"),
    loader = document.getElementById("loader")
    formulario = document.getElementById("formulario")

var usuario_nombre, 
    usuario_edad, 
    usuario_pais, 
    usuario_correo;

function cargarUsuarios(){
    tabla.innerHTML = '<tr><th>ID</th><th>Nombre</th><th>Edad</th><th>Pais</th><th>Correo</th></tr>';

    var peticion = new XMLHttpRequest();
    peticion.open("GET", "php/leer_datos.php");

    loader.classList.add("active");

    valor = formulario.edad.value;
    alert(valor);

    peticion.onload = function(){// onload es un evento que se ejecuta cuando la petición se ha completado es decir hay una respuesta
        var datos = JSON.parse(peticion.responseText);// responseText es una propiedad que nos permite obtener la respuesta de la petición la respuesta es un string por lo que debemos convertirla a JSON
        if(datos.error){
            error_box.classList.add("active");// classList es una propiedad que nos permite agregar clases a un elemento
        }
        else {
            for(var i = 0; i < datos.length; i++){
                var Elemento = document.createElement("tr");// createElement es un método que nos permite crear un elemento
                Elemento.innerHTML += "<td>"+datos[i].id+"</td>";// innerHTML es una propiedad que nos permite agregar contenido a un elemento
                Elemento.innerHTML += "<td>"+datos[i].nombre+"</td>";
                Elemento.innerHTML += "<td>"+datos[i].edad+"</td>";
                Elemento.innerHTML += "<td>"+datos[i].pais+"</td>";
                Elemento.innerHTML += "<td>"+datos[i].correo+"</td>";
                tabla.appendChild(Elemento);// appendChild es un método que nos permite agregar un elemento a otro
            }
        }
    }

    peticion.onreadystatechange = function(){// onreadystatechange es un evento que se ejecuta cada vez que cambia el estado de la petición
        if(peticion.readyState == 4 && peticion.status == 200){
            loader.classList.remove("active");
            
        }
    }

    peticion.send();
}

function agregarUsuarios(e){
    e.preventDefault();// preventDefault es un método que nos permite evitar que se ejecute el evento por defecto
    var peticion = new XMLHttpRequest();
    peticion.open("POST", "php/insertar-usuario.php");

    usuario_nombre = formulario.nombre.value.trim();// value es una propiedad que nos permite obtener el valor de un elemento, trim es un método que nos permite eliminar los espacios en blanco al inicio y al final de un string
    usuario_edad = formulario.edad.value.trim();
    usuario_pais = formulario.pais.value.trim();
    usuario_correo = formulario.correo.value.trim();


    
}

btn_Cargar.addEventListener("click", function(){
    cargarUsuarios(); 
})

formulario.addEventListener("submit", function(e){
    agregarUsuarios(e);// e es un objeto que nos permite obtener información del evento que se está ejecutando
}) ;