<?php
require_once 'model/establecimiento.php';

class EstablecimientosController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Establecimiento();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/establecimientos/establecimientos.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $pedido = new Establecimiento();
        if(isset($_REQUEST['folio'])){
            $datos = $this->model->Obtener($_REQUEST['folio'])->datos[0];
            $pedido->folio = $datos->folio;
            $pedido->id_cte = $datos->id_cte;
            $pedido->id_estab = $datos->id_estab;
            $pedido->hora_solicitud = $datos->hora_solicitud;
            $pedido->status_pedido = $datos->status_pedido;
            $pedido->forma_pago = $datos->forma_pago;
            $pedido->total = $datos->total;
            //$pedido->folio = $this->model->Obtener($_REQUEST['folio'])->folio;
        }
        require_once 'view/header.php';
        require_once 'view/establecimientos/establecimiento-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $pedido = new Establecimiento();

        $folio = $_REQUEST['folio'];
        $pedido->id_cte = $_REQUEST['id_cte'];
        $pedido->id_estab = $_REQUEST['id_estab'];
        $pedido->hora_solicitud = $_REQUEST['hora_solicitud'];
        $pedido->status_pedido = $_REQUEST['status_pedido'];
        $pedido->forma_pago = $_REQUEST['forma_pago'];
        $pedido->total = $_REQUEST['total'];

        $datos_json = json_encode(
            array(
                //'folio' => $pedido->folio,
                'id_cte' => $pedido->id_cte,
                'id_estab' =>$pedido->id_estab,
                'hora_solicitud'=>$pedido->hora_solicitud,
                'status_pedido'=>$pedido->status_pedido,
                'forma_pago'=>$pedido->forma_pago,
                'total'=>$pedido->total
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
