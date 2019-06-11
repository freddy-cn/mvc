<?php
require_once 'model/detallePedido.php';

class detallepedidoController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new detallePedido();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/pedido/pedido.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $pedido = new detallepedido();
        if(isset($_REQUEST['folio'])){
            $datos = $this->model->Obtener($_REQUEST['folio'])->datos[0];
            $pedido->folio = $datos->folio;
            $pedido->id_alim = $datos->id_alim;
            $pedido->precio_unit_alim = $datos->precio_unit_alim;
            $pedido->cantidad = $datos->cantidad;
            $pedido->subtotal = $datos->subtotal;
            $pedido->lugar_entrega = $datos->lugar_entrega;
            //$pedido->folio = $this->model->Obtener($_REQUEST['folio'])->folio;
        }

        require_once 'view/header.php';
        require_once 'view/pedido/detallePedido-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $pedido = new detallePedido();

        $folio = $_REQUEST['folio'];
        $pedido->id_alim = $_REQUEST['id_alim'];
        $pedido->precio_unit_alim = $_REQUEST['precio_unit_alim'];
        $pedido->cantidad = $_REQUEST['cantidad'];
        $pedido->subtotal = $_REQUEST['subtotal'];
        $pedido->lugar_entrega = $_REQUEST['lugar_entrega'];

        $datos_json = json_encode(
            array(
                //'folio' => $pedido->folio,
                'id_alim' => $pedido->id_alim,
                'precio_unit_alim' =>$pedido->precio_unit_alim,
                'cantidad'=>$pedido->cantidad,
                'subtotal'=>$pedido->subtotal,
                'lugar_entrega'=>$pedido->lugar_entrega,
            )
        );
        $folio > 0
            ? $this->model->Actualizar($datos_json,$folio)
            : $this->model->Registrar($datos_json);

        header('Location: index.php');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['folio']);
        header('Location: index.php');
    }

    public function logout(){
        session_unset();
        session_destroy();
        header('Location: login.php');
    }

    //creacion del reporte
    public function Reporte(){
        require_once 'model/reportes.php';
    }
}
