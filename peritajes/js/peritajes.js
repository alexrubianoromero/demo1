function nuevoPeritaje(){
    const http=new XMLHttpRequest();
	const url = 'index.php';
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status ==200){
			console.log(this.responseText);
			document.getElementById("div_resultados_peritajes").innerHTML = this.responseText;
		}
	};
	http.open("POST",url);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("opcion=nuevo");
}

function consultaPeritaje(){
    const http=new XMLHttpRequest();
	const url = 'index.php';
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status ==200){
			console.log(this.responseText);
			document.getElementById("div_peritajes").innerHTML = this.responseText;
		}
	};
	http.open("POST",url);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("opcion=consultar");
}

function buscarPlacaPeritaje(){
    var placa = document.getElementById("placaPeritaje").value;
    const http=new XMLHttpRequest();
	const url = 'index.php';
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status ==200){
			console.log(this.responseText);
			document.getElementById("divResultadobusqueda").innerHTML = this.responseText;
		}
	};
	http.open("POST",url);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("opcion=buscarPlaca"+ "&placa="+placa);
}

function grabarPeritaje(){
    valida = validaciones();
    if(valida != 0){
        var idcarro = document.getElementById("idCarroPeritaje").value;
        var kilometraje = document.getElementById("kilometrajeperitaje").value;
        var amortiguadores = document.getElementById("amortiguadores").value;
        var exosto = document.getElementById("exosto").value;
        var arrastre = document.getElementById("arrastre").value;
        var llantas = document.getElementById("llantas").value;
        var sillin = document.getElementById("sillin").value;
        var velocimetro = document.getElementById("velocimetro").value;
        var frenos = document.getElementById("frenos").value;
        var luces = document.getElementById("luces").value;
        var motor = document.getElementById("motor").value;
        var tacometro = document.getElementById("tacometro").value;
        var observaciones = document.getElementById("observacionesPeritaje").value;
        observacionesPeritaje
        const http=new XMLHttpRequest();
        const url = 'index.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("div_peritajes").innerHTML = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=grabar"
            + "&idcarro="+idcarro
            + "&kilometraje="+kilometraje
            + "&amortiguadores="+amortiguadores
            + "&exosto="+exosto
            + "&arrastre="+arrastre
            + "&llantas="+llantas
            + "&sillin="+sillin
            + "&velocimetro="+velocimetro
            + "&frenos="+frenos
            + "&luces="+luces
            + "&motor="+motor
            + "&tacometro="+tacometro
            + "&observaciones="+observaciones
            );
    }
}

function validaciones(){
      if(document.getElementById("kilometrajeperitaje").value == '')
      {
         alert("Digite Kilometraje..") ;  
         document.getElementById("kilometrajeperitaje").focus();
         return 0;
      }
    //   if(document.getElementById("amortiguadores").value == 0)
    //   {
    //      alert("Escoja estado Amortiguadores") ;  
    //      document.getElementById("amortiguadores").focus();
    //      return false
    //   }
    //   if(document.getElementById("exosto").value == 0)
    //   {
    //      alert("Escoja estado exosto") ;  
    //      document.getElementById("exosto").focus();
    //      return false
    //   }
    //   if(document.getElementById("arrastre").value == 0)
    //   {
    //      alert("Escoja estado kit de arrastre") ;  
    //      document.getElementById("arrastre").focus();
    //      return false
    //   }
    //   if(document.getElementById("llantas").value == 0)
    //   {
    //      alert("Escoja estado llantas") ;  
    //      document.getElementById("llantas").focus();
    //      return false
    //   }
    //   if(document.getElementById("sillin").value == 0)
    //   {
    //      alert("Escoja estado sillin") ;  
    //      document.getElementById("sillin").focus();
    //      return false
    //   }
    
    //   if(document.getElementById("velocimetro").value == 0)
    //   {
    //      alert("Escoja estado velocimetro") ;  
    //      document.getElementById("velocimetro").focus();
    //      return false
    //   }
    //   if(document.getElementById("frenos").value == 0)
    //   {
    //      alert("Escoja estado frenos") ;  
    //      document.getElementById("frenos").focus();
    //      return false
    //   }
    //   if(document.getElementById("luces").value == 0)
    //   {
    //      alert("Escoja estado luces") ;  
    //      document.getElementById("luces").focus();
    //      return false
    //   }
    
    //   if(document.getElementById("motor").value == 0)
    //   {
    //      alert("Escoja estado motor") ;  
    //      document.getElementById("motor").focus();
    //      return false
    //   }
    //   if(document.getElementById("tacometro").value == 0)
    //   {
    //      alert("Escoja estado tacometro") ;  
    //      document.getElementById("tacometro").focus();
    //      return false
    //   }
    
      if(document.getElementById("observacionesPeritaje").value == '')
      {
         alert("Digite Observaciones") ;  
         document.getElementById("observacionesPeritaje").focus();
         return 0;
      }
    return 1;
  }

  
function muestreDetallePeritaje(id){
    
    var id = id;
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
             //var respuesta = JSON.parse(this.responseText);
            // console.log(respuesta.marca);
				// alert(respuesta[0]+' '+ respuesta[1]);
            //		document.getElementById("tipooperacion").text = respuesta[1];
           document.getElementById("cuerpoModal").innerHTML  = this.responseText;
           
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=consultaPeritajeId"
        +'&id='+id);

}