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

			echo "respuesta: <br>";
			echo $response;

			/*if ($response->hasBody()){
			        echo $response->$raw_body;        
			    }*/
			return json_decode($response);
			//------------------
			/*$stm = $this->pdo->prepare("SELECT * FROM pedidos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);*/
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
			$stm = $this->pdo
			          ->prepare("SELECT * FROM pedidos WHERE folio = ?");
			          

			$stm->execute(array($folio));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($folio)
	{
		/*		 
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM pedidos WHERE folio = ?");			          

			$stm->execute(array($folio));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}*/

		// adaptación a web service
		$url = 'http://localhost/webService/empleados/login/';
//echo $_SERVER["REQUEST_METHOD"];
if($_SERVER["REQUEST_METHOD"] == "DELETE"){         
   $datos_post = json_encode(
      array(
         "correo_emp" => $_REQUEST['email'],
         "password_emp" => $_REQUEST['password']
         )
      );   

   $opciones = array(
      'http' => array(      
         'method'=>"DELETE",
         'max_redirects' => '0',
         'ignore_errors' => '1',
         'header'=>"Accept-language: es\r\n" . 
                  "Cookie: val=unknown\r\n" .
                  "content-type: application/text\r\n ",
         'content' => $datos_post
         )
      );
   
   $contexto = stream_context_create($opciones);
   $fp = fopen($url, 'r',1, $contexto);
   //var_dump($meta = stream_get_meta_data($fp));
   $respuesta = stream_get_contents($fp);
   $contenido = array();
   $contenido = json_decode($respuesta, true);
         
   if($contenido["empleado"]["claveApi"]){
      // variables de sesión
      session_id("nuevaSesion");
      session_start();
      $_SESSION['sesion_iniciada'] = true;
      $_SESSION['usuario'] = $contenido["empleado"]["correo_emp"];      
      $_SESSION['claveApi'] = $contenido["empleado"]["claveApi"];      
      
      fclose($fp);      
      header('Location: index.php');
      exit();   
   }else{
      header('Location: #');
   }
}
		// adaptación a web service		
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE pedidos SET 				
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
				);
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