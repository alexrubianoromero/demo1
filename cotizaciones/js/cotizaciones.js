
function muestreDetalleCotizacion(id){
    
    var id = id;
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("cuerpoModal").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=consultaCotizacionId"
        +'&id='+id);

}

function nuevaCotizacion(){
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

function buscarPlacaCotizacion(){
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


function grabarCotizacion(){
    valida = validacionesCotizacion();
    if(valida != 0)
    {
        var idcarro = document.getElementById("idCarroPeritaje").value;
        var observaciones = document.getElementById("observacionesCotizacion").value;
        var placa = document.getElementById("placaPeritaje").value;
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
        http.send("opcion=grabarCotizacion"
        + "&idcarro="+idcarro
        + "&observaciones="+observaciones
        + "&placa="+placa
        );
    }
}


function validacionesCotizacion(){
    
    // if(document.getElementById("tacometro").value == 0)
    // {
        //    alert("Escoja estado tacometro") ;  
        //    document.getElementById("tacometro").focus();
        //    return false
        // }
        
    if(document.getElementById("observacionesCotizacion").value == '')
    {
       alert("Digite Observaciones") ;  
       document.getElementById("observacionesCotizacion").focus();
       return 0;
    }
  return 1;
}

function pedirInfoItem(placa){
    // alert(placa);
    const http=new XMLHttpRequest();
	const url = 'index.php';
	http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
			document.getElementById("cuerpoModalItem").innerHTML = this.responseText;
		}
	};
	http.open("POST",url);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("opcion=pedirInfoItem"+ "&placa="+placa);
}


function adicionarItem(){
    valida = validacionesAgregarItem();
    if(valida != 0)
    {
        $('#myModalItem').modal('hide');
        var placa = document.getElementById("placaItem").value;
        var codigo = document.getElementById("codItem").value;
        var descripcion  = document.getElementById("descripItem").value;
        var vunitarioItem  = document.getElementById("vunitarioItem").value;
        var cantidad  = document.getElementById("canItem").value;
        var vtotalItem  = document.getElementById("vtotalItem").value;
        
        const http=new XMLHttpRequest();
        const url = 'index.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("div_items_cotizacion").innerHTML = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=adicionarItem"
        + "&codigo="+codigo
        + "&descripcion="+descripcion
        + "&vunitarioItem="+vunitarioItem
        + "&cantidad="+cantidad
        + "&vtotalItem="+vtotalItem
        + "&placa="+placa
        );
    }    
}

function validacionesAgregarItem(){
    if(document.getElementById("codItem").value == '')
    {
       alert("Digite Codigo Item") ;  
       document.getElementById("codItem").focus();
       return 0;
    }
    if(document.getElementById("descripItem").value == '')
    {
       alert("Digite Descripcion Item") ;  
       document.getElementById("descripItem").focus();
       return 0;
    }
    if(document.getElementById("vunitarioItem").value == '')
    {
       alert("Digite Valor Unitario Item") ;  
       document.getElementById("vunitarioItem").focus();
       return 0;
    }
    if(document.getElementById("canItem").value == '')
    {
       alert("Digite Valor Cantidad Item") ;  
       document.getElementById("canItem").focus();
       return 0;
    }
    if(document.getElementById("vtotalItem").value == '')
    {
       alert("Digite Valor Total Item") ;  
       document.getElementById("vtotalItem").focus();
       return 0;
    }
  return 1;

}

function  eliminarItemTemporal(id_item){
    var placa = document.getElementById("placaItem").value;
    const http=new XMLHttpRequest();
	const url = 'index.php';
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status ==200){
			console.log(this.responseText);
			document.getElementById("div_items_cotizacion").innerHTML = this.responseText;
		}
	};
	http.open("POST",url);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("opcion=eliminarItemTemporal"
    + "&id_item="+ id_item
    + "&placa="+ placa
    );
}

function calcularTotalItem(){
    var vunitarioItem  = document.getElementById("vunitarioItem").value;
    var cantidad  = document.getElementById("canItem").value;

    totalItem = parseInt(vunitarioItem)*parseInt(cantidad);
    var vtotalItem  = document.getElementById("vtotalItem").value = totalItem ;
}

function consultaCotizacion(){
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


function correoCotizacion(id){
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("divAvisosPeritaje").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=generarCorreoCotizacion"
            + "&id="+id
             );

}