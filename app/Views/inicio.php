<?php ob_start() ?>

<br><br>
<h3 class="text-center">
  <b><?php echo $params['titulo'] ?></b>
</h3>
<br>  

<div class="d-flex justify-content-center align-items-center">
  <img src="img/tarea_ilustracion.jpg" alt="Gestor de tareas" width="20%">
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>