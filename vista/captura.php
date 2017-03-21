<?php include("templates/header.php"); ?>
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="card-panel">
	       		<div class="row">
		       		<div class="col s12 m12 l12">
		       			<h4 class="center-align" style="color: #2196F3;">OPERACION<h4>
		       		</div>
		       		<div class="col s12 m5 l4" >
		       			<div class="col s12 m12 l12" >
							<ul class="collection" id="detalle_modelo">
						     
						    </ul>
					    </div>
					    <div class="col s12 m12 l12" >
					    	 <img class="responsive-img" src="../artefactos/img/operaciones/bordado.jpg">
					    </div>
		       		</div>
		       		<form class="col s12 m4 l4"  id="form" action="">
		       			<h4 class="center blue-text">Registra tu captura</h4>
		       			<div class="row">
		       				<div class="col s12 m12 l12" >
		       					<div class="col s12 m8 l12">	
									<h5 class="blue-text">Produccion</h5>
			       				</div>
			       				<div class="col s12 m8 l12">							
									<div class="input-field ">
					            		<input id="captura" type="number" class="validate" name="captura" required="true">
					            		<label for="captura" data-error="wrong" >Cantidad</label>

				          			</div>				          	
								</div>
		       					
		       					<div class="col s12 m12 l12">
		       						<div class="col s4 m12 l6">
		       							<button class="waves-effect waves-light btn blue"  style="width: 100%;" type="submit" id="fturno">
										    Fin Turno
										</button>
		       						</div>
		       						<div class="col s4 m12 l6 ">
		       							<button class="waves-effect waves-light btn blue " style="float: right; width: 100%;"  type="button" id="forden">
										    Fin Orden
										</button>
		       						</div>
		       						<div class="col s4 m12 l12">
		       							<button class="waves-effect waves-light btn blue" type="submit" id="continuar" style="width: 100%">
										    Continuar
										</button>
		       						</div>
		       					</div>
								
					          		
		       				</div>

		       				
		       			</div>
		       		</form>
		       		<div class="col s12 m7 l4" >
		       			<div class="col s12 m7 l12" > 		       			
		       			 	<div class="card-panel green center" id="panel">
					          	<h1><span class="white-text" id="hora">0</span>
					          	<span class="white-text">:</span> 
					          	<span class="white-text" id="minutos">0</span>
					          	<span class="white-text">:</span>
					          	<span class="white-text" id="segundos">0</span>
					          	</h1>
					        </div>
						</div>
						<!--<div class="col s12 m7 l12" > 
							<h3 style="color: #2196F3;">Productividad: <span id="productividad">00</span>%</h3>
							<h3 style="color: #2196F3;">Entregado: <span id="entregado"></span></h3>
							<h3 style="color: #2196F3;">Planeado: <span id="planeado"></span></h3>
						</div>-->
		       		</div>
		       	</div>
	       	</div>
    	</div> 
   </div> 
         
         

<?php include("templates/footer.php"); ?>
<script type="text/javascript" src="../controlador/captura.js"></script> 
<script type="text/javascript">
	//setInterval
	

	var cronometro,contador_s =55, contador_m =0,contador_h =0, fecha;

		function detenerse()
	{
		clearInterval(cronometro);
	}


	function carga(val)
	{	
		if (val) {
			
			s = document.getElementById("segundos");
			m = document.getElementById("minutos");
			h = document.getElementById("hora");
			cronometro = setInterval(
				function(){
					if(contador_s==60)
					{
						contador_s=55;
						contador_m++;
						//m.innerHTML = contador_m;
						$("#minutos").text(contador_m);
						if(contador_m == 60)
						{
							contador_m=0;
							$("#minutos").text(contador_m);
							//m.innerHTML = contador_m;
							contador_h++;
							//h.innerHTML = contador_h;
							$("#hora").text(contador_m);
						}

						if (contador_m == 3) {
							$("#panel").removeClass("green").addClass("yellow");
						}else if(contador_m == 6){
							$("#panel").removeClass("yellow").addClass("red");	
							detenerse();
						}


					}
					$("#segundos").text(contador_s);
					//s.innerHTML = contador_s;
					contador_s++;

				}
				,1000);
		}
	}

	
		

		window.onload = function() {
			

			swal({
			  title: "Comenzar?",   
	            text: "Tendras 30 segundos despues de aceptar.",   
	            type: "warning",   
	            confirmButtonColor: "#2196F3",   
	            confirmButtonText: "Acemptar",   
	            closeOnConfirm: false
			},
			function(){
			   swal("Camenzaste!", "Apurate el tiempo empezara a correr pronto.", "success");
			   setTimeout(function()
				{ 
					date = new Date();					
					fecha = `${date.getFullYear()}-${date.getMonth()+1}-${date.getDate()} ${date.getHours()}:${date.getMinutes()}`;
					//console.info(fecha);
					carga(true);
				},5000);
			});				    	
		}

		  

	
	

	
	</script>
