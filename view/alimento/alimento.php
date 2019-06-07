<h1 class="page-header">Alimentos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Alimento&a=Crud">Agregar alimento</a>
    <a class="btn btn-primary" href="view/pedido/reporte.php" target="_blank">Imprimir</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:90px;">Id</th>
            <th style="width:120px;">Nombre</th>
            <th style="width:120px;">U. Medida</th>
            <th style="width:100px;">Hora solicitud</th>
            <th style="width:120px;">Tiempo prep.</th>
            <th style="width:120px;">Precio</th>
            <th style="width:120px;">Existencia</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>

    <?php
    $modelo = $this->model->Listar();        
     foreach($modelo->datos as $pedido):         
        ?>        
        <tr>
            <td><?php echo $pedido->folio; ?></td>
            <td><?php echo $pedido->id_cte; ?></td>
            <td><?php echo $pedido->id_estab; ?></td>
            <td><?php echo $pedido->hora_solicitud; ?></td>
            <td><?php echo $pedido->status_pedido;?></td>
            <td><?php echo $pedido->forma_pago; ?></td>
            <td><?php echo $pedido->total; ?></td>
            <td>
                <a href="?c=Pedido&a=Crud&folio=<?php echo $pedido->folio; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Pedido&a=Eliminar&id=<?php echo $pedido->folio; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    
    </tbody>
</table> 
