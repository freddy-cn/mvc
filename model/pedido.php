<?php
include_once('./httpful.phar');
class Pedido
{
	private $pdo;
        
	public $folio;
	public $id_cte;
	public $id_estab;
	public $hora_solicitud;
	public $status_pedido;
	public $forma_pago;
	public $total;

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

			$url = 'http://localhost/webserviceRestaurantes/pedidos';

			$response = \Httpful\Request::get($url)
			->addHeader('authorization', '94574891ab17f57de133627922df93b6')
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
			$url = 'http://localhost/webserviceRestaurantes/pedidos/'.$folio;

			$response = \Httpful\Request::get($url)
			->addHeader('authorization', $key)
			->send();
			return json_decode($response);	
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($folio)
	{
			 
		try 
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/pedidos/'.$folio;

			$response = \Httpful\Request::delete($url)
			->addHeader('authorization', $key)
			->send();
			return json_decode($response);	

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		
	}

	public function Actualizar($data)
	{
		try 
		{

			$url = 'http://localhost/webserviceRestaurantes/pedidos';

			$response = \Httpful\Request::put($url)
			->addHeader('authorization', '94574891ab17f57de133627922df93b6')
			->send();

			return json_decode($response);	
			/*$sql = "UPDATE pedidos SET 				
						id_cte = ?,
						id_estab = ?,
						hora_solicitud = ?,
						status_pedido = ?,
						forma_pago = ?,
						total = ?,						
				    WHERE folio = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->id_cte, 
                        $data->id_estab,
                        $data->hora_solicitud,
                        $data->status_pedido,
						$data->forma_pago,
						$data->total,
                        $data->folio
					)
				);*/
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Pedido $data)
	{
		try 
		{
		$sql = "INSERT INTO pedidos (id_cte,id_estab,hora_solicitud,status_pedido,forma_pago,total) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_cte, 
					$data->id_estab,
					$data->hora_solicitud,
					$data->status_pedido,
					$data->forma_pago,					
					$data->total
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}