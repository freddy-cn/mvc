<?php
include_once('./httpful.phar');
class Establecimiento
{
	private $pdo;

	public $id_estab;
	public $nombre_estab;
	public $num_exterior_estab;
    public $calle_estab;
    public $cruzamiento1_calle_estab;
	public $cruzamiento2_calle_estab;
	public $colonia_estab;
    public $ciudad_estab;
    public $telefono_estab;
    public $correo_estab;
    public $horarios;
    public $descripcion_estab;
    public $id_tipo_cocina;
    public $serv_domicilio;
    public $serv_reserv;
    public $calificacion;
    public $id_tipo_rest;
    public $ubicacion_gps_estab;
    public $foto_estab;
    public $logo_estab;

	public $response;
	public $key;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/establecimientos';

			$response = \Httpful\Request::get($url)
			->addHeader('authorization', $key)
			->send();

			return json_decode($response);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($folio)
	{
		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/establecimientos/'.$folio;
			$response = \Httpful\Request::get($url)
			->addHeader('authorization', $key)
			->send();
			return json_decode($response);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtenerSoap($folio){

		//mandar datos por post
		require_once('core/nusoap-0.9.5/lib/nusoap.php');
		require_once('core/VistaJson.php');
		
		$cliente = new nusoap_client("http://localhost/webserviceRestaurantesSoap/server.php",false);

$array = [
    "controlador" => "establecimientos",
    "opcion" => "selectid",
    "id_estab" => "$folio"
];

//lo convierto en objeto
$oParam = (object)$array;

//compara ya sea el array que se hace manual o el array de post man
switch($oParam->controlador){
    case 'establecimientos':
    $metodo = 'usuario.post';
    break;
    case 'reservaciones':
    $metodo = 'reservaciones.post';
    break;
    case 'alimentos':
    $metodo = 'alimentos.post';
    break;
    case 'pedidos':
    $metodo = 'pedidos.post';
    break;
    default:
    break;
}

 //var_dump( $respuesta = $cliente->call($metodo,array('parametros'=>$array)));
 $respuesta = $cliente->call($metodo,array('parametros'=>$array));
 $oParam2 = (object)$respuesta;
 return $oParam2;

		/*

			require_once('core/nusoap-0.9.5/lib/nusoap.php');
			require_once('core/VistaJson.php');

			$url = 'http://localhost/webserviceRestaurantesSoap/cliente';

			$array = [
				"controlador" => "establecimientos",
				"opcion" => "selectid",
				"id_estab" => "12"
			];
			
			$oParam = (object)$array;
			
			$respuesta = $cliente->call('usuarios.post',array('parametros'=>$array));*/



	}

	public function Eliminar($folio)
	{
		var_dump($folio);
		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/establecimientos/'.$folio;

			$response = \Httpful\Request::delete($url)
			->addHeader('authorization', $key)
			->send();
			return json_decode($response);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}

	}

	public function Actualizar($data,$folio)
	{
		
		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/establecimientos/'.$folio;

			$response = \Httpful\Request::put($url)
			->addHeader('authorization', $key)
			->body($data)
			->send();

			return json_decode($response);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar($data)
	{
		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/establecimientos';

			$response = \Httpful\Request::post($url)
			->addHeader('authorization', $key)
			->body($data)
			->send();
			return json_decode($response);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
