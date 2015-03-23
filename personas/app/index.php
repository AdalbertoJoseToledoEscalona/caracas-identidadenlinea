<?php session_start();
       
if ($_SESSION['id']==''){
    session_destroy(); 
    echo '<SCRIPT>window.location.href="../index.php"</SCRIPT>';
}

if($_SESSION['alert'] != "")
	print "<script>alert('Registro Exitoso');</script>";
unset($_SESSION['alert']);
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
	<!-- METAS -->
	<meta charset="utf8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- LINKS -->
	<link rel="stylesheet" type="text/css" href="../librerias/css/identidad.css">
        <link rel="stylesheet" type="text/css" href="../librerias/css/style.css">

	<title>Identiad en línea</title>
</head>
<body>
	<!-- HEADER -->
	<?php include('../librerias/include/header-identidad.php'); ?>

	<section class="cont-all">
		<!-- MENÚ VERTICAL -->
		<?php include('../librerias/include/menu-vertical.php'); ?>

		<!-- CONTENIDO -->
		<?php include('../librerias/include/carga_doc.php'); ?>		
	</section>
        
        <script src="../librerias/js/jquery.js"></script>
        <script src="../librerias/js/AjaxUpload.2.0.min.js"></script>
	<script>


            $(function(){
                $('.container').on('dragover',function(e){
                    e.preventDefault();
                    this.classList.add('over');
                    //return false;
                });
                
                $('.container').on('dragleave',function(e){
                    e.preventDefault();
                    this.classList.remove('over');
                    //return false;
                });
                
                $('.container').on('dragenter',function(e){
                    e.stopPropagation();
                    e.preventDefault();
                    this.classList.add('over');
                });
                

                $('.container').on('drop',function(e){
                    e.preventDefault();
                    var files = e.originalEvent.dataTransfer.files;
                    var box = this;
                    var msj = $(this).data('doc');
                    var etiqueta = $(this).attr('id');
                    for(var i = 0;i<files.length;i++){
                            var file = files[i];
                            var fD = new FormData();
                            fD.append('user_file',file);
                            fD.append('tipo_doc',msj);
                            fD.append('etiqueta',etiqueta);
                            //alert('Etiqueta '+etiqueta);
                            var ajax = new XMLHttpRequest();
                            ajax.open('POST','../controller/registro_controller.php?acc=N',true);
                            ajax.addEventListener('load',function(e){
                                    if(this.status == '200'){
                                            //box.innerHTML = 'Se subió el archivo correctamente :)';
                                            box.classList.remove('over');
                                    }
                                    else{
                                            box.innerHTML = 'No se pudo subir el archivo :(';	
                                    }
                            });
                            box.classList.add('loading');
                            ajax.upload.addEventListener('progress',function(e){
                                    if((e.loaded / e.total) == 1){
                                            //box.classList.remove('loading');
                                            box.classList.add('bg-orange');
                                            alert('Archivo de '+msj+' Cargado');
                                    }
                            });                                

                            ajax.send(fD);
                    }

                    return false;
                });
                
               $('.precarga').click(function(){
                  campo = $(this).data('file');
                  $('#'+campo).click(); 
               });
               
               $('.carga').change(function(e){
                    e.preventDefault();
                    var files = e.target.files;
                    var box = this;
                    var msj = $(this).data('doc');
                    var etiqueta = $(this).attr('id');
                    for(var i = 0;i<files.length;i++){
                            var file = files[i];
                            var fD = new FormData();
                            fD.append('user_file',file);
                            fD.append('etiqueta',etiqueta);
                            alert('Etiqueta '+etiqueta);
                            var ajax = new XMLHttpRequest();
                            ajax.open('POST','../controller/registro_controller.php?acc=N',true);
                            ajax.addEventListener('load',function(e){
                                    if(this.status == '200'){
                                            //box.innerHTML = 'Se subió el archivo correctamente :)';
                                            box.classList.remove('over');
                                    }
                                    else{
                                            box.innerHTML = 'No se pudo subir el archivo :(';	
                                    }
                            });
                            box.classList.add('loading');
                            ajax.upload.addEventListener('progress',function(e){
                                    if((e.loaded / e.total) == 1){
                                            //box.classList.remove('loading');
                                            box.classList.add('bg-orange');
                                            alert('Archivo de '+msj+' Cargado');
                                    }
                            });                                

                            ajax.send(fD);
                    }

                    return false;


               });
                
            });
	</script>        
        
        
</body>
</html>
