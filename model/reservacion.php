<?php
include_once('./httpful.phar');
class Reservacion
{
	private $pdo;

	public $id_reservacion;
	public $id_estab;
	public $num_mesa;
	public $cantidad_personas;
	public $hora_reservacion;
	public $hora_registro;
	public $id_cte;
	public $status_reservacion;

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
			$url = 'http://localhost/webserviceRestaurantes/reservaciones';

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

	public function Obtener($id_reservacion)
	{
		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/reservaciones/'.$id_reservacion;

			$response = \Httpful\Request::get($url)
			->addHeader('authorization', $key)
			->send();
			return json_decode($response);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_reservacion)
	{

		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/reservaciones/'.$id_reservacion;

			$response = \Httpful\Request::delete($url)
			->addHeader('authorization', $key)
			->send();
			return json_decode($response);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}

	}

	public function Actualizar($data,$id_reservacion)
	{
		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/reservaciones/'.$id_reservacion;

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
			$url = 'http://localhost/webserviceRestaurantes/reservaciones';

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
