<?php
require_once 'model/pedido.php';

class PedidoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Pedido();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/pedido/pedido.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $pedido = new Pedido();
        
        if(isset($_REQUEST['folio'])){
            $pedido = $this->model->Obtener($_REQUEST['folio']);
        }
        
        require_once 'view/header.php';
        require_once 'view/pedido/pedido-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $pedido = new Pedido();
        
        $pedido->folio = $_REQUEST['folio'];
        $pedido->id_cte = $_REQUEST['id_cte'];
        $pedido->id_estab = $_REQUEST['id_estab'];
        $pedido->hora_solicitud = $_REQUEST['hora_solicitud'];
        $pedido->status_pedido = $_REQUEST['status_pedido'];
        $pedido->forma_pago = $_REQUEST['forma_pago'];
        $pedido->total = $_REQUEST['total'];

        $pedido->folio > 0 
            ? $this->model->Actualizar($pedido)
            : $this->model->Registrar($pedido);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}