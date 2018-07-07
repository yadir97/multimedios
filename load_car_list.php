<?php 

	include("conexion.php");
	$html="";
	$user_id;
	

	$sql = "SELECT id from m_usuarios where usuario='$_POST[username]'";

	$resultado =mysqli_query($conexion,$sql);

	//Obtención del id del usuarios para traer los pedidos que ha realizado dicho usuario
	while ($row = mysqli_fetch_array($resultado)) {
		$user_id=$row['id'];
	}


	$sql="SELECT p.nombre, p.tipo, pd.talla, pd.cant, pd.estado, pd.monto, pd.id
		  FROM m_usuarios u, m_deportiva p, m_pedidos_deportiva pd
		  WHERE pd.user = u.id and
		  		pd.prenda = p.id and
		  		pd.user = $user_id";

	$resultado = mysqli_query($conexion,$sql); 
	//Extración de los pedidos desde la base de datos
	while ($row = mysqli_fetch_array($resultado)) {
	    
	    $html.="<tr>" .
		    	  	"<td>" .
		    			"$row[nombre]". 
		        	"</td>".
		    	  	"<td>" .
		    			"$row[tipo]". 
		        	"</td>".
		    	  	"<td>" .
		    			"$row[talla]". 
		        	"</td>".
		    	  	"<td>" .
		    			"$row[cant]". 
		        	"</td>".
		    	  	"<td>" .
		    			"$row[estado]". 
		        	"</td>".
		    	  	"<td>" .
		    			"₡$row[monto]". 
		        	"</td>".
		        	"<td>";

		        	if($row['estado']=="Pendiente"){
		    			$html.="<button id='btn_cancelar_pedido' name='deportiva' value='$row[id]' class='btn btn-danger'>Cancelar</button>";
		        	}
		    		else{
		    			$html.="<button id='btn_cancelar_pedido' name='deportiva' value='$row[id]' class='btn btn-danger' disabled='disabled'>Cancelar</button>";
		    		}

		        	$html.="</td>".
	    	  "</tr>";				
	}


	$sql="SELECT p.nombre, p.tipo, pd.talla, pd.cant, pd.estado, pd.monto, pd.id
		  FROM m_usuarios u, m_casual p, m_pedidos_casual pd
		  WHERE pd.user = u.id and
		  		pd.prenda = p.id and
		  		pd.user = '$user_id'";

	$resultado = mysqli_query($conexion,$sql); 
	//Extración de los pedidos desde la base de datos
	while ($row = mysqli_fetch_array($resultado)) {
	    
	    $html.="<tr>" .
		    	  	"<td>" .
		    			"$row[nombre]". 
		        	"</td>".
		    	  	"<td>" .
		    			"$row[tipo]". 
		        	"</td>".
		    	  	"<td>" .
		    			"$row[talla]". 
		        	"</td>".
		    	  	"<td>" .
		    			"$row[cant]". 
		        	"</td>".
		    	  	"<td>" .
		    			"$row[estado]". 
		        	"</td>".
		    	  	"<td>" .
		    			"₡$row[monto]". 
		        	"</td>".
		        	"<td>";

		        	if($row['estado']=="Pendiente"){
		    			$html.="<button id='btn_cancelar_pedido' name='deportiva' value='$row[id]' class='btn btn-danger'>Cancelar</button>";
		        	}
		    		else{
		    			$html.="<button id='btn_cancelar_pedido' name='deportiva' value='$row[id]' class='btn btn-danger' disabled='disabled'>Cancelar</button>";
		    		}

		        	$html.="</td>".
	    	  "</tr>";				
	}


	echo($html);
 ?>