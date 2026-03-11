
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Tareas</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="<?php echo 'css/'.$mvc_vis_css ?>" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">

			<a class="navbar-brand" href="index.php?ctl=inicio">Mi Gestor Tareas</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarNav" aria-controls="navbarNav"
					aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">

			<!-- MENÚ CENTRADO (perfectamente centrado en desktop) -->
			<ul class="navbar-nav navbar-center">
				<?php foreach ($this->menu() as [$texto, $ruta]): ?>
				<?php if ($texto !== 'Iniciar Sesión' && $texto !== 'Registro'): ?>
					<li class="nav-item">
					<a class="nav-link" href="index.php?ctl=<?= $ruta ?>"><?= $texto ?></a>
					</li>
				<?php endif; ?>
				<?php endforeach; ?>
			</ul>

			<!-- LOGIN A LA DERECHA -->
			<ul class="navbar-nav ms-auto">
				<?php foreach ($this->menu() as [$texto, $ruta]): ?>
				<?php if ($texto === 'Iniciar Sesión' || $texto === 'Registro'): ?>
					<li class="nav-item">
					<a class="nav-link" href="index.php?ctl=<?= $ruta ?>"><?= $texto ?></a>
					</li>
				<?php endif; ?>
				<?php endforeach; ?>
			</ul>

			</div>
		</div>
	</nav>
    
    
	<div class="container-fluid">
		<div class="container">
			<div id="contenido">
			
            <?php echo $contenido ?>

			</div>
		</div>
	</div>

</body>
</html>
