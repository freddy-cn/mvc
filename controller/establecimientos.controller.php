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

        $id_estab = $_REQUEST['id_estab'];
        $pedido->id_estab = $_REQUEST['id_estab'];
        $pedido->nombre_estab = $_REQUEST['nombre_estab'];
        $pedido->num_exterior_estab = $_REQUEST['num_exterior_estab'];
        $pedido->calle_estab = $_REQUEST['calle_estab'];
        $pedido->cruzamiento1_calle_estab = $_REQUEST['cruzamiento1_calle_estab'];
        $pedido->cruzamiento2_calle_estab = $_REQUEST['cruzamiento2_calle_estab'];
        $pedido->colonia_estab = $_REQUEST['colonia_estab'];
        $pedido->ciudad_estab = $_REQUEST['ciudad_estab'];
        $pedido->telefono_estab = $_REQUEST['telefono_estab'];
        $pedido->correo_estab = $_REQUEST['correo_estab'];
        $pedido->horarios = $_REQUEST['horarios'];
        $pedido->descripcion_estab = $_REQUEST['descripcion'];
        $pedido->id_tipo_cocina = $_REQUEST['id_tipo_cocina'];
        $pedido->serv_domicilio = $_REQUEST['serv_domicilio'];
        $pedido->serv_reserv = $_REQUEST['serv_reserv'];
        $pedido->calificacion = $_REQUEST['calificacion'];
        $pedido->id_tipo_rest = $_REQUEST['id_tipo_rest'];
        $pedido->ubicacion_gps_estab = $_REQUEST['ubicacion_gps_estab'];
        $pedido->foto_estab = $_REQUEST['foto_estab'];
        $pedido->logo_estab = $_REQUEST['logo_estab'];
    
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
        var_dump($datos_json);
        $id_estab > 0
            ? $this->model->Actualizar($datos_json,$folio)
            : $this->model->Registrar($datos_json);

        header('Location: index.php?c=Establecimientos');
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
