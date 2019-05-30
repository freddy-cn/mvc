<h1 class="page-header">Pedidos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Pedido&a=Crud">Agregar pedido</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:90px;">Folio</th>
            <th style="width:120px;">Id cliente</th>
            <th style="width:120px;">Id estab</th>
            <th style="width:100px;">Hora solicitud</th>
            <th style="width:120px;">Status</th>
            <th style="width:120px;">Forma de pago</th>
            <th style="width:120px;">Total</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->folio; ?></td>
            <td><?php echo $r->id_cte; ?></td>
            <td><?php echo $r->id_estab; ?></td>
            <td><?php echo $r->hora_solicitud; ?></td>
            <td><?php echo $r->status_pedido;?></td>
            <td><?php echo $r->forma_pago; ?></td>
            <td><?php echo $r->total; ?></td>
            <td>
                <a href="?c=Pedido&a=Crud&folio=<?php echo $r->folio; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Pedido&a=Eliminar&id=<?php echo $r->folio; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
