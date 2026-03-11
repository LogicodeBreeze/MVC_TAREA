<?php ob_start() ?>
	
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-6 col-lg-4">

      <div class="text-center mb-4">
        <h1 class="h3 fw-bold">LOGIN</h1>
        <p class="text-muted mb-0">Accede a tu gestor de tareas</p>
      </div>

      <?php if (isset($params['mensaje'])) : ?>
        <div class="alert alert-danger text-center">
          <?= $params['mensaje'] ?>
        </div>
      <?php endif; ?>

      <div class="card shadow-sm">
        <div class="card-body p-4">
          <form action="index.php?ctl=iniciarSesion" method="post">

            <div class="mb-3">
              <label for="nombreUsuario" class="form-label">Usuario</label>
              <input
                type="text"
                class="form-control"
                id="nombreUsuario"
                name="nombreUsuario"
                required
              >
            </div>

            <div class="mb-3">
              <label for="contrasenya" class="form-label">Contraseña</label>
              <input
                type="password"
                class="form-control"
                id="contrasenya"
                name="contrasenya"
                required
              >
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">
                Entrar
              </button>
            </div>

          </form>
        </div>
      </div>

      <p class="text-center mt-3 mb-0">
        ¿No tienes cuenta? 
        <a href="index.php?ctl=registro">Regístrate</a>
      </p>

    </div>
  </div>
</div>	

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>