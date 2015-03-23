/**
 * 
 */
var pagina  = 1;
var volverPagina = false;
function colocarPagina(pag) {
    pagina = parseInt(pag);
    var obj_reporte = document.getElementById("reporte");
    var filas = obj_reporte.getElementsByTagName("TR");
    var ultima_fila = pag*10;
    var primera_fila = ultima_fila - 9;
    
    for ( var i = 1; i < filas.length; i++) {
        if(i < primera_fila || i > ultima_fila){
            filas[i].style.visibility = "hidden";
            filas[i].style.width = "0px";
            filas[i].style.height = "0px";
            filas[i].style.display = "none";
        }else{
            filas[i].style.visibility = "visible";
            filas[i].style.width = "";
            filas[i].style.height = "";
            filas[i].style.display = "";
        }
    }
    
    
    var fila = filas.length - 1;
    var cont = parseInt(fila /10, 10);
    if(fila%10 != 0){
        cont++;
    }
    if(pag <= cont){
        var strPaginas = "";
        if(cont > 1){
            var inicio = pag - 10;
            var fin = pag + 10;
            
            var quite = 0;
            if(inicio < 1){
                quite = inicio - 1;
                inicio = 1;
                fin -= quite;
            }
            
            if(fin > cont){
                quite = fin - cont;
                fin = cont;
                inicio -= quite; 
                if(inicio < 1){
                    inicio = 1;
                }
            }
            
            if(inicio > 1){
                strPaginas += "<a href='javascript: colocarPagina(1);' >1</a>...&nbsp;&nbsp;&nbsp;";
            }
            
            var i = inicio;
            for (i = inicio; i<= cont && i<=fin; i++) {
                if(i == pag){
                    strPaginas += "<b style='color: blue;'>"+i+"</b>&nbsp;&nbsp;&nbsp;";
                }else{
                    strPaginas += "<a href='javascript: colocarPagina("+i+");' >"+i+"</a>&nbsp;&nbsp;&nbsp;";
                }
            }
            strPaginas = strPaginas.substring(0, strPaginas.lastIndexOf("&nbsp;&nbsp;&nbsp;"));
            if(i < cont + 1){
                strPaginas += "&nbsp;&nbsp;&nbsp;...<a href='javascript: colocarPagina("+cont+");' >"+cont+"</a>";
            }
            document.getElementById("paginas").innerHTML = strPaginas;
        }
    }else{
        return false;
    }
    
}

function colocarPaginaOtraVez() {
    var pag = pagina;
    var obj_reporte = document.getElementById("reporte");
    var filas = obj_reporte.getElementsByTagName("TR");
    var ultima_fila = pag*10;
    var primera_fila = ultima_fila - 9;
    
    for ( var i = 1; i < filas.length; i++) {
        if(i < primera_fila || i > ultima_fila){
            filas[i].style.visibility = "hidden";
            filas[i].style.width = "0px";
            filas[i].style.height = "0px";
            filas[i].style.display = "none";
        }else{
            filas[i].style.visibility = "visible";
            filas[i].style.width = "";
            filas[i].style.height = "";
            filas[i].style.display = "";
        }
    }
    
    
    var fila = filas.length - 1;
    var cont = parseInt(fila /10, 10);
    if(fila%10 != 0){
        cont++;
    }
    var strPaginas = "";
    if(cont > 0){
        var inicio = pag - 10;
        var fin = pag + 10;
        
        var quite = 0;
        if(inicio < 1){
            quite = inicio - 1;
            inicio = 1;
            fin -= quite;
        }
        
        if(fin > cont){
            quite = fin - cont;
            fin = cont;
            inicio -= quite; 
            if(inicio < 1){
                inicio = 1;
            }
        }
        
        if(inicio > 1){
            strPaginas += "<a href='javascript: colocarPagina(1);' >1</a>...&nbsp;&nbsp;&nbsp;";
        }
        
        var i = inicio;
        for (i = inicio; i<= cont && i<=fin; i++) {
            if(i == pag){
                strPaginas += "<b style='color: blue;'>"+i+"</b>&nbsp;&nbsp;&nbsp;";
            }else{
                strPaginas += "<a href='javascript: colocarPagina("+i+");' >"+i+"</a>&nbsp;&nbsp;&nbsp;";
            }
        }
        strPaginas = strPaginas.substring(0, strPaginas.lastIndexOf("&nbsp;&nbsp;&nbsp;"));
        if(i < cont + 1){
            strPaginas += "&nbsp;&nbsp;&nbsp;...<a href='javascript: colocarPagina("+cont+");' >"+cont+"</a>";
        }
        document.getElementById("paginas").innerHTML = strPaginas;
    }
}

function ordenarCampos(campo, ascendente) {
    document.getElementById("campo_ordenar").value=campo;
    document.getElementById("ascendente").value=ascendente;
    document.getElementById("f").onsubmit();
}

function eliminarFila(campos, valores) {
    for ( var i = 0; i < campos.length; i++) {
        document.getElementById(campos[i]).value=valores[i];
    }
    
    volverPagina = true;
    
    //document.getElementById("fila_eliminar").value=fila;
    //document.getElementById("correo_eliminar").value=correo;
    document.getElementById("f").onsubmit();
}

function chequearSiVolverPagina() {
    
    if(volverPagina == true){
        var resultado = false;
        do{
            resultado = colocarPagina(pagina);
            pagina--;
        }while (resultado == false);
        pagina++;
    }
    
    volverPagina = false;
}

function cargarSelects(datos) {
    //alert(datos.length);
    var num_select = -1;
    if(arguments[1] != null){
        num_select = arguments[1];
    }
    
    var separador = "<sepa>";
    var obj_select = document.getElementById("f");
    //var obj_select = document.getElementsByName("filtro");
    //alert(obj_select.length);
    for (var i = 0; i < datos.length; i++) {
        //if(obj_select[i].tagName.toLowerCase() == "select"){
        if(i != num_select){
            var valor_colocar = obj_select[i].options[obj_select[i].selectedIndex].value.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
            //alert("valor_colocar = "+valor_colocar);
            obj_select[i].options.length = 1;
            var valores = datos[i].substring(0, datos[i].length-separador.length).split(separador);
            //obj_select[i].options[obj_select[i].options.length]= new Option("Todos", "");
            for ( var j = 0; j < valores.length; j++) {
                if(valores[j].indexOf("=") != -1){
                    var valor = valores[j].split("=");
                    //var opcion = new Option(valor[1], valor[0]);
                    var opcion = null;
                    if(valor[0].replace(/^\s\s*/, '').replace(/\s\s*$/, '') == valor_colocar){
                        //opcion.setAttribute("selected", "selected");
                        opcion = new Option(valor[1].replace(/^\s\s*/, '').replace(/\s\s*$/, ''), valor[0].replace(/^\s\s*/, '').replace(/\s\s*$/, ''), true);
                    }else{
                        opcion = new Option(valor[1].replace(/^\s\s*/, '').replace(/\s\s*$/, ''), valor[0].replace(/^\s\s*/, '').replace(/\s\s*$/, ''));
                    }
                    obj_select[i].options[obj_select[i].options.length]= opcion;
                }
            }
        }
        //}
    }
}