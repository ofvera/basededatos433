<!DOCTYPE html>

<!--FINALIDAD: Mostrar conciertos, ultimos discos, noticias de las bandas favoritas -->

<?php
include('head.php');
 ?>
<?php
    require("conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

    $usuario = $_POST["usuario"];  # usuario 

    # dividimos la consulta en 3 partes
    # 1. obtener las bandas favoritas 
    $query_favoritas33 = "SELECT F.bid FROM favoritos F WHERE F.user_name = '$usuario';"

    $result33 = $db33 -> prepare($query_favoritas33);
    $result33 -> execute();
    $row_favorita33 = $result33 -> fetch()

    $noticias = array()
    $conciertos = array()
    $discos = array()
    
    if (is_null($row_favorita33)){
    	echo "No tienes bandas en tus favoritos"

    }
    else {
    	
    	while ($row_favorita33)	{

    		# a partir de las bandas 
   			# 2. obtenemos las noticias relacionadas a las bandas y los conciertos
    		$query_noticias4 = "SELECT B.nombre, N.titulo, N.contenido FROM banda B, banda_involucrada BI, noticia N WHERE N.id_n = BI.id_n AND BI.id_b = B.id_b AND B.id_b = '$row_favorita33[0]';"
	    	$result_n4 = $db4 -> prepare($query_noticias4);
   			$result_n4 -> execute();
    		$row_noticias4 = $result_n4 -> fetch()
    		
    		while ($row_noticias4){
    			array_push ($noticias, array(
                	    "banda" => $row_noticias4[0],
                    	"noticia" => $row_noticias4[1],
                    	"contenido" => $row_noticias4[2]
                    	))
    			$row_noticias4 = $result_n4 -> fetch()
    		}
    	
    		$query_conciertos4 = "SELECT B.nombre, C.nombre, C.lugar, C.fecha FROM concierto C, banda_invitada BI, concierto_banda CB, banda B WHERE ((C.id_c = BI.id_c AND BI.id_b = B.id_b) AND B.id_b = '$row_favorita33[0]'
    			UNION
    			SELECT B.nombre, C.nombre, C.lugar, C.fecha FROM concierto C, banda_invitada BI, concierto_banda CB, banda B WHERE (C.id_c = CB.id_c AND CB.id_b = B.id_b)) AND B.id_b = '$row_favorita33[0]';"
    		$result_c4 = $db4 -> prepare($query_conciertos4);
    		$result_c4 -> execute();
    		$row_conciertos4 = $result_c4 -> fetch()
    		while ($row_conciertos4){
    			array_push ($conciertos, array(
                	    "banda" => $row_conciertos4[0],
                    	"concierto" => $row_conciertos4[1],
                	    "lugar" => $row_conciertos4[2],
                    	"fecha" => $row_conciertos4[3]
                    	))
    			$row_conciertos4 = $result_c4 -> fetch()
    		}

    		# 3. obtenemos los discos
    		$query_discos33 = "SELECT B.nombre, D.nombre, D.sello FROM disco D, publicado P, banda B WHERE D.did = P.bid AND P.bid = B.bid AND B.bid = '$row_favorita33[0]' "
	    	$result_d33 = $db33 -> prepare($query_discos33);
    		$result_d33 -> execute();
    		$row_discos33 = $result_d33 -> fetch()
	    	while ($row_discos33){
    			array_push ($discos, array(
        	            "banda" => $row_discos33[0],
            	        "disco" => $row_discos33[1],
                	    "sello" => $row_discos33[2],
                    	))
    			$row_discos33 = $result_d33 -> fetch()
    		}
    		$row_favorita33 = $result33 -> fetch()
    	}
    }
 ?>  
    
    <?php
    echo "<h3>Noticias</h3>
    <table>
    <tr> <td>Banda</td> <td>Noticia</td> </tr>";
    foreach ($noticias as $p) {
        echo "<tr>
        <td>$p[banda]</td>
        <td>$p[titulo]</td>
        </tr>";
    }
    echo "</table>
    <h3>Conciertos</h3>
    <table>
    <tr> <td>Banda</td> <td>Concierto</td> <td>Lugar</td> <td>Fecha</td> </tr>";
    foreach ($conciertos as $p) {
        echo "<tr>
        <td>$p[banda]</td>
        <td>$p[concierto]</td>
        <td>$p[lugar]</td>
        <td>$p[fecha]</td>
        </tr>";
    }
    echo "</table>";
    echo "<table>
    <h3>Discos</h3>
    <table>
    <tr> <td>Banda</td> <td>Disco</td> <td>Sello</td> </tr>";
    foreach ($discos as $p) {
        echo "<tr>
        <td>$p[banda]</td>
        <td>$p[disco]</td>
        <td>$p[sello]</td>
        </tr>";
    }
    echo "</table>";
?>

<form action="usuario.php" method="post">
    <input type="submit" value="Volver">
</form>

<?php
include('footer.php');
?>