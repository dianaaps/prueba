<?php
/*************************************************************/
/* conexion.php
 * Objetivo: clase que encapsula el acceso a la base de datos octacore
 * Autor: 
 *************************************************************/

class conexion{

	private $server="bxsfgr8aslg2nqfrct2a-mysql.services.clever-cloud.com";
	private $user="uutpkdtnylufvrag";
	private $password="SiVOlELwqYtebLFrc4NB";
	private $db="bxsfgr8aslg2nqfrct2a";
	private $oConexion=null;
	
	// public AccesoDatos(){
	// }

	 
	/*Realiza la conexión a la base de datos*/
	function conectar(){
		$bRet = false;
		try{
			$oConexion=new mysqli($server,$user,$password,$db);
			if ($oConexion->connect_errorno){
				;echo "Conectado exitosamente";
				$bRet = true;
			}
			else{
				echo "No se logró conectar a la BD";
			}
		}catch(Exception $e){
			throw $e;
		}
		return $bRet;
	}
	/*Realiza la desconexión de la base de datos*/
	function desconectar(){
		$bRet = true;
		if ($this->oConexion != null){
			$this->oConexion=null;
		}
		return $bRet;
	}
		
	/*Ejecuta en la base de datos la consulta que recibió por parámetro.
	Regresa
	Nulo si no hubo datos
	Un arreglo bidimensional de n filas y tantas columnas como campos se hayan
	solicitado en la consulta*/
	function ejecutarConsulta($psConsulta){
		$arrRS = null;
		$rst = null;
		$oLinea = null;
		$sValCol = "";
		$i=0;
		$j=0;
		if ($psConsulta == ""){
			throw new Exception("AccesoDatos->ejecutarConsulta: falta indicar la consulta");
		}
		if ($this->oConexion == null){
			throw new Exception("AccesoDatos->ejecutarConsulta: falta conectar la base");
		}
		try{
			$rst = $this->oConexion->query($psConsulta); //un objeto PDOStatement o falso en caso de error
		}catch(Exception $e){
			throw $e;
		}
		if ($rst){
			foreach($rst as $oLinea){ 
				foreach($oLinea as $llave=>$sValCol){
					if (is_string($llave)){
						$arrRS[$i][$j] = $sValCol;
						$j++;
					}
				}
				$j=0;
				$i++;
			}
		}
		return $arrRS;
	}
		
	/*Ejecuta en la base de datos el comando que recibió por parámetro
	Regresa el número de registros afectados por el comando*/
	function ejecutarComando($psComando){
	$nAfectados = -1;
		if ($psComando == ""){
			throw new Exception("AccesoDatos->ejecutarComando: falta indicar el comando");
		}
		if ($this->oConexion == null){
			throw new Exception("AccesoDatos->ejecutarComando: falta conectar la base");
		}
		try{
			$nAfectados =$this->oConexion->exec($psComando);
		}catch(Exception $e){
			throw $e;
		}
		return $nAfectados;
	}
}
?>