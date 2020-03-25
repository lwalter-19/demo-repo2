<div class="form-group">
    <label>Nombre Usuario</label>
    <input type="text" class="form-control" placeholder="WalterLópez134_JavaDevOne" name="nombre" <?php $validador -> mostrar_nombre()?>>
    <?php
        $validador -> mostrar_error_nombre();
    ?>
</div>
<div class="form-group">
    <label>Email Usuario</label>
    <input type="text" class="form-control" placeholder="JavaDevOne@mail.com" name="email" <?php $validador -> mostrar_email()?>>
    <?php
        $validador -> mostrar_error_email();
    ?>
</div>
<div class="form-group">
    <label>Contraseña</label>
    <input type="password" class="form-control" placeholder="" name="clave1">
    <?php
        $validador -> mostrar_error_clave1();
    ?>
</div>
<div class="form-group">
    <label>Repite tu Contraseña</label>
    <input type="password" class="form-control" placeholder="" name="clave2">
    <?php
        $validador -> mostrar_error_clave2();
    ?>
</div>
<br><br>
<button type="reset" class="btn btn-default btn-primary" name="limpiar">Limpiar Formulario</button>
<br><br>
<button type="submit" class="btn btn-default btn-primary" name="enviar">Enviar Formulario</button>
<br><br>
