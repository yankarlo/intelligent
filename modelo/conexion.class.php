<?php 
include("vars.php");
class Conexion extends PDO
{	
	//nombre base de datos
	private $dbname = BDA;
	//nombre servidor
	private $host = SRV;
	//nombre usuarios base de datos
	private $user = USR;
	//password usuario
	private $pass = PAS;
	//puerto postgreSql
	private $port = PRT;
	private static $instancia;
    private $dbh;
 
	//creamos la conexión a la base de datos
	public function __construct() 
	{
	    try {
 								
	        $this->dbh = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->user);
	        $this->dbh->exec("SET CHARACTER SET utf8");
	    	//echo "conecto";
	    } catch(PDOException $e) {

	         print "Error!: " . $e->getMessage();
            die();
            
	    }

	}
	//metodo que prepara el crud
	public function prepare($sql, $options = NULL)
    {
        return $this->dbh->prepare($sql);
    }
 
    public static function singleton_conexion()
    {
 
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
 
        }
 
        return self::$instancia;
        
    }
     // Evita que el objeto se pueda clonar
    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
 
    }
	//función para cerrar una conexión pdo
	public function close_con() 
	{
    	$this->dbh = null; 
 	}

 	//metodo para probar la conexion
 	public function getDbHandler()
    {
    	//return $this->dbh;
        if ($this->dbh) 
        echo "ENTRO";    
        else echo "paletas";
    }

      public function namesColumns($query)
    {
     
	  $numeroColumnas = $query->columnCount();

	  for ($i=0; $i < $numeroColumnas ; $i++) { 
	    $name[$i] = $query->getColumnMeta($i);
	    $resultado[$i] = $name[$i]['name'];
	   }
	  return $resultado;
	}
     
}

//$dbh = new Conexion();
//$dbh->singleton_conexion()->getDbHandler();
//var_dump($dbh);
//
//$dbh->singleton_conexion()->getDbHandler();
//Conexion::singleton_conexion()->getDbHandler();

//Conexion::getDbHandler();