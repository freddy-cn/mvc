<h1 class="page-header">
    <?php
    echo $reservaciones->id_reservacion != null ? $reservaciones->id_reservacion : 'Nueva Reservacion'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Reservacion">Reservacion</a></li>
  <li class="active"><?php echo $reservaciones->id_reservacion != null ? $reservaciones->id_reservacion : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Reservacion&a=Guardar&id_reservacion=<?php echo $reservaciones->id_reservacion; ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>ID.</label>
      <input type="text" name="id_reservacion" value="<?php echo $reservaciones->id_reservacion; ?>" class="form-control" disabled/>
    </div>

    <div class="form-group">
        <label>Establecimiento</label>
        <input type="text" name="id_estab" value="<?php echo $reservaciones->id_estab; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Numero de Mesa</label>
        <input type="text" name="num_mesa" value="<?php echo $reservaciones->num_mesa; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Cantidad de Personas</label>
        <input type="text" name="cantidad_personas" value="<?php echo $reservaciones->cantidad_personas; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Hora de Reservacion</label>
        <input type="text" name="hora_reservacion" value="<?php echo $reservaciones->hora_reservacion; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Hora de Registro</label>
        <input type="text" name="hora_registro" value="<?php echo $reservaciones->hora_registro; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

 <div class="form-group">
        <label>Id Cliente</label>
        <input type="text" name="id_cte" value="<?php echo $reservaciones->id_cte; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

     <div class="form-group">
        <label>Status</label>
        <input type="text" name="status_reservacion" value="<?php echo $reservaciones->status_reservacion; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
