<?php 
include_once("../modelo/archivo_Class.php");

$archivo = new Archivo();
$searchText = "";
if(isset($_GET['search_text'])){
	$searchText = $_GET['search_text'];
}

if(isset($_GET['pagina'])){
	$pag = $_GET['pagina'];
}

if(isset($_GET['filas_por_pagina'])){
	$filasPorPaginas = $_GET['filas_por_pagina'];
}
$paginar = true;
$archivos = $archivo->listar_usuarios($searchText, $pag, $filasPorPaginas, $paginar);
?>
	<?php $cont = 0; $userId = -1; foreach ($archivos as $fila) {
		$id = split("-", $fila["identity"]);
		?>
	<div class="box-user" id="reporte_usuarios_fila_<?=($cont + 1) ?>">
		<img src="../libreriasEmpresa/img/img-<?=strtolower(trim($fila["name"]))?>.jpg" width="70px">
		<p>
			<strong class="name-user"><?=$fila["name"] ?> <?=$fila["last_name"] ?></strong>
			<br>
			<a href="javascript:ajaxBuscarUsuario('&identity_prefix=<?=$id[0] ?>&identity_number=<?=$id[1] ?>', '<?=$cont ?>');"><b>Show Documents</b></a>
		</p>
		
		<!-- LISTA -->
		<form class="lista" action="?" method="get" id="listadoc1_<?=$cont ?>" name="listadoc" style="display:none"
		 onsubmit="solicitarDescargarArchivos(this, <?=$cont ?>); return false">
		
			<span id="listadoc_<?=$cont ?>" style="display:none"></span>
			<br>
			<a href="javascript:close(<?=$cont ?>)"><span class="icon-cross"></span>Close</a>
			<button><span class="icon-mobile"></span>Send Code</button>
	
			<span id="colocar_codigo_<?=$cont ?>"></span>
			<!-- <input class="campo-codigo" style="text-align:center" type="text" name="" placeholder="Código">
			<button class="enviar-cod"><span class="icon-floppy-disk"></span>Descargar</button> -->
		</form>
		
	</div>
	<?php $cont++;}
	if($paginar) {
		$archivos = $archivo->listar_usuariosCount($searchText, $pag, $filasPorPaginas);
		foreach ($archivos as $fila) {
			$cont = $fila["count"];
		}
	}
	$archivo->cerrar();?>
	<?php //for ($cont = $cont; $cont < 200; $cont++) {?>
	 <!-- <div id="reporte_usuarios_fila_<?//=($cont + 1) ?>" class="box-user" style="visibility: visible;">
		<img width="70px" src="../libreriasEmpresa/img/img-luis.jpg">
		<p>
			<strong class="name-user">luis hernandez <?//=($cont + 1) ?></strong>
			<br>
			<a href="javascript:ajaxBuscarUsuario('&amp;identity_prefix=V&amp;identity_number=18368110', '<?//=$cont ?>');"><b>Show Documents</b></a>
		</p>
		
		
		<form onsubmit="solicitarDescargarArchivos(this, <?//=$cont ?>); return false" style="display:none" name="listadoc" id="listadoc1_<?=($i-1) ?>" method="get" action="?" class="lista">
		
			<span style="display:none" id="listadoc_<?//=$cont ?>"></span>
			<br>
			<a href="javascript:close(<?//=$cont ?>)"><span class="icon-cross"></span>Cerrar</a>
			<button><span class="icon-mobile"></span>Enviar código</button>
	
			<span id="colocar_codigo_<?//=$cont ?>"></span>
		</form>
		
	</div> -->
	<?php /*}*/ //echo "total filas: ".$cont; ?>

<nav id="paginas" class="paginas">
<?php
if($paginar) { 
	$numPagMostrar = 3;
	
	$fila = $cont;
    $cont = intval($fila /$filasPorPaginas, 10);
    if($fila % $filasPorPaginas != 0){
        $cont++;
    }

    if($pag <= $cont){
    	
        $trPaginas = "";
        if($cont > 1){
        	
            $inicio = $pag - intval($numPagMostrar/2, 10);
            $fin = $pag + intval($numPagMostrar/2, 10);
            
            $quite = 0;
            if($inicio < 1){
                $quite = $inicio - 1;
                $inicio = 1;
                $fin -= $quite;
            }
            
            if($fin > $cont){
                $quite = $fin - $cont;
                $fin = $cont;
                $inicio -= $quite; 
                if($inicio < 1){
                    $inicio = 1;
                }
            }
            
            if($inicio > 1){
                //strPaginas += "<a href=\"javascript: colocarPaginaDiv(1, '" + prefijo + "');\" >1</a>...&nbsp;&nbsp;&nbsp;";
            	$trPaginas .= "<li><a href=\"javascript: colocarPaginaBD(1);\" ><-First Page</a></li>";
            }
            
            if($pag > 1){
                //strPaginas += "<b style='color: blue;'>"+i+"</b>&nbsp;&nbsp;&nbsp;";
            	$trPaginas .= "<li><a href=\"javascript: colocarPaginaBD(".($pag-1).");\"><< Previous</a></li>";
            }
            
            
            
            $i = $inicio;
            for ($i = $inicio; $i<= $cont && $i<=$fin; $i++) {
                if($i == $pag){
                    //strPaginas += "<b style='color: blue;'>"+i+"</b>&nbsp;&nbsp;&nbsp;";
                	$trPaginas .= "<li><a href=\"javascript: return false;\"><b>".$i."</b></a></li>";
                }else{
                    //strPaginas += "<a href=\"javascript: colocarPaginaDiv("+i+", '" + prefijo + "');\" >"+i+"</a>&nbsp;&nbsp;&nbsp;";
                	$trPaginas .= "<li><a href=\"javascript: colocarPaginaBD(".$i.");\" >".$i."</a></li>";
                }
            }
            //strPaginas = strPaginas.substring(0, strPaginas.lastIndexOf("&nbsp;&nbsp;&nbsp;"));
            
            if($pag < $cont){
                //strPaginas += "<b style='color: blue;'>"+i+"</b>&nbsp;&nbsp;&nbsp;";
            	$trPaginas .= "<li><a href=\"javascript: colocarPaginaBD(".($pag+1).");\">Next >></a></li>";
            }
            
            if($i < $cont + 1){
                //strPaginas += "&nbsp;&nbsp;&nbsp;...<a href=\"javascript: colocarPaginaDiv("+cont+", '" + prefijo + "');\" >"+cont+"</a>";
            	$trPaginas .= "<li><a href=\"javascript: colocarPaginaBD(".$cont.");\" >Last Page -></a>";
            }
            $trPaginas = "<ul>" . $trPaginas . "</ul>";
            
           echo $trPaginas;
        }
    }else{
        //return false;
    }
}
?>
</nav>


<script>
//colocarPaginaDiv(1, "reporte_usuarios_fila");
</script>
<br>