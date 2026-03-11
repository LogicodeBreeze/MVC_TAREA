<?php ob_start(); ?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-7 col-lg-5">

      <div class="text-center mb-4">
        <h1 class="h3 fw-bold">Registro</h1>
        <p class="text-muted mb-0">Crea tu cuenta</p>
      </div>

      <?php if (!empty($params['mensaje'])): ?>
        <div class="alert alert-danger text-center"><?= htmlspecialchars($params['mensaje']) ?></div>
      <?php endif; ?>

      <div class="card shadow-sm">
        <div class="card-body p-4">
          <form action="index.php?ctl=registro" method="post">

            <div class="mb-3">
              <label for="nombreUsuario" class="form-label">Usuario</label>
              <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
              <?php if (!empty($params['errores']['nombreUsuario'])): ?>
                <div class="text-danger small mt-1"><?= htmlspecialchars($params['errores']['nombreUsuario']) ?></div>
              <?php endif; ?>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
              <?php if (!empty($params['errores']['email'])): ?>
                <div class="text-danger small mt-1"><?= htmlspecialchars($params['errores']['email']) ?></div>
              <?php endif; ?>
            </div>

            <div class="mb-3">
              <label for="contrasenya" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="contrasenya" name="contrasenya" required>
              <?php if (!empty($params['errores']['contrasenya'])): ?>
                <div class="text-danger small mt-1"><?= htmlspecialchars($params['errores']['contrasenya']) ?></div>
              <?php endif; ?>
            </div>

            <div class="mb-3">
              <label for="contrasenya2" class="form-label">Repite contraseña</label>
              <input type="password" class="form-control" id="contrasenya2" name="contrasenya2" required>
              <?php if (!empty($params['errores']['contrasenya2'])): ?>
                <div class="text-danger small mt-1"><?= htmlspecialchars($params['errores']['contrasenya2']) ?></div>
              <?php endif; ?>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-success">Crear cuenta</button>
            </div>

          </form>
        </div>
      </div>

      <p class="text-center mt-3 mb-0">
        ¿Ya tienes cuenta?
        <a href="index.php?ctl=iniciarSesion">Inicia sesión</a>
      </p>

    </div>
  </div>
</div>

<?php $contenido = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
