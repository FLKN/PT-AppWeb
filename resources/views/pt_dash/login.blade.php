
<html>

  <body>

    <form role="form" action="/login" method="post" novalidate>
      <div class="form-group">
        <label for="exampleInputEmail1">Usuario</label>

        <div>
          <div class="controls">
            <input name="usuario" placeholder="Ingresa tu usuario" type="text" class="form-control" maxlength="100" required data-validation-Required-Message="Debes escribir tu Número" data-validation-maxlength-message="El Número solo tiene 5 caracteres.">
            <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />
          </div>
        </div>

      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <div class="control-group">
          <div class="controls">
          <input type="password" name="password" placeholder="Ingresa tu contraseña" class="form-control" required data-validation-Required-Message="Debes escribir tu Contraseña">
          </div>
        </div>

      </div>

      <button id="success1" type="submit" class="btn btn-primary btn-block"><i class='fa fa-fw fa-check-square-o'></i> Entrar</button>

		</form>
  </body>
</html>
