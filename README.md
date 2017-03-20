# intelligent

Guia para la estructura.

En la vista se incluira un archivo js que servira como nuestro controlador

<script type="text/javascript" src="controlador/operacion.js"></script>

El controlador se conectara a los modelos para poder responder a la peticion del usuario
<script type="text/javascript">
$(".boton").on("click", function () {
	$.ajax({
        url:"modelo/procesoDAO/modelo_get_procesos.php",
        type:"POST",
        data:""
    }).done(function(respuesta){  
        
        var resultado = $.parseJSON(respuesta);
       	console.info(resultado);
      
    }).fail(function(respuesta){

    });
});
</script>

En el modelo los archivos modelo.php se encargaran de hacer la peticion al clase DAO 


	include ("modeloDAO.class.php");
	$controlador = new ModeloDAO();
	$resultado = $controlador->get_modelos();
	echo json_encode($resultado);

En el DAO tenemos nuestras funciones que ejecutaran los query en la bd

public function get_marcas()
{
    try {       
        
        $sql = "SELECT * FROM marc_marcas";
        $query = $this->con->prepare($sql);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->con->close_con();
        return $resultado;       

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}