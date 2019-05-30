<h1 class="page-header">
    <?php  
    $test = $pedido->datos[0];    
    echo $test->folio != null ? $test->folio : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Pedido">Pedidos</a></li>
  <li class="active"><?php echo $test->folio != null ? $test->id_cte : 'Nuevo Registro'; ?></li>
</ol>   

<form id="frm-alumno" action="?c=Pedido&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="text" name="folio" value="<?php echo $test->folio; ?>" class="form-control" disabled/>
    
    <div class="form-group">
        <label>Id cliente</label>
        <input type="text" name="id_cte" value="<?php echo $test->id_cte; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Id estab</label>
        <input type="text" name="id_estab" value="<?php echo $test->id_estab; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>hora solicitud</label>
        <input type="text" name="hora_solicitud" value="<?php echo $test->hora_solicitud; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Status pedido</label>
        <input type="text" name="status_pedido" value="<?php echo $test->status_pedido; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Forma de pago</label>
        <input type="text" name="forma_pago" value="<?php echo $test->forma_pago; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Total</label>
        <input type="text" name="total" value="<?php echo $test->total; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
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