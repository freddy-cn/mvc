<h1 class="page-header">Menú de alimentos y bebidas</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Alimento&a=Crud">Agregar alimento/bebida</a>
    <a class="btn btn-primary" href="view/pedido/reporte.php" target="_blank">Imprimir</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Identificador</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Unidad</th>
            <th>Tiempo prep.</th>
            <th>Precio</th>
            <th>Estilo</th>
            <th>Tiempo de menú</th>
            <th>existencia</th>
            <th/th>
        </tr>
    </thead>
    <tbody>

    <?php
    $modelo = $this->model->Listar();
     foreach($modelo->datos as $alimento):
        ?>
        <tr>
            <td><?php echo $alimento->id_alim;?></td>
            <td><?php echo $alimento->nombre_alim;?></td>
            <td><textarea style="resize:none;" readonly> <?php echo $alimento->descripcion_alim;?> </textarea></td>
            <td><?php echo $alimento->u_medida;?></td>
            <td><?php echo $alimento->tiempo_prep;?></td>
            <td><?php echo $alimento->precio_unit;?></td>
            <td><?php echo $alimento->id_tipo_cocina;?></td>
            <td><?php echo $alimento->tiempo_menu;?></td>
            <td><?php echo $alimento->foto_alim;?></td>
            <td><?php echo $alimento->existencia;?></td>
            <td>
                <a href="?c=Alimento&a=Crud&id_alim=<?php echo $alimento->id_alim; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Alimento&a=Eliminar&id_alim=<?php echo $alimento->id_alim; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
