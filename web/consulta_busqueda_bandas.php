<!DOCTYPE html>

<?php
include('head.php');
 ?>
<?php
    require("conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

    $nombre = $_POST["nombre_banda"];  # nombre de la banda/artista

    # consulta a las bd 33
    $query33 = "SELECT b.id as id_banda, null as id_integrante_actual, p.aid as id_integrante_pasado, correo, disco
                FROM bandas b, participado p, artista a, contactos, publicado pu, disco d
                WHERE b.id = p.bid AND p.aid = a.id AND a.id = contactos.aid AND
                pu.bid = b.id AND pu.did = d.did AND p.fecha_termino < NOW() AND b.nombre = '$nombre'
                UNION
                SELECT b.id as id_banda, p.aid as id_integrante_actual, null as id_integrante_pasado, correo, disco
                FROM bandas b, participado p, artista a, contactos, publicado pu, disco d
                WHERE b.id = p.bid AND p.aid = a.id AND a.id = contactos.aid AND
                pu.bid = b.id AND pu.did = d.did AND (NOW() BETWEEN p.fecha_inicio AND p.fecha_temrmino) AND b.nombre = '$nombre';";
    $result33 = $db33 -> prepare($query33);
    $result33 -> execute();
    $row33 = $result33 -> fetch()
    # consulta la bd 4
    $query4 = "SELECT id_b as b.id_banda, n.titulo as noticia, c.nombre as concierto
               FROM banda b, banda_involucrada bo, noticia n, banda_invitada bi, concierto c
               WHERE b.id_b = bo.id_b AND bo.id_n = n.id_n AND bi.id_b = b.id_b AND bi.id_c = c.id_c AND c.fecha > NOW() AND b.nombre = '$nombre'
               UNION
               SELECT id_b as b.id_banda, n.titulo as noticia, c.nombre as concierto
               FROM banda b, banda_involucrada bo, noticia n, concierto_banda cb, concierto c
               WHERE b.id_b = bo.id_b AND bo.id_n = n.id_n AND cb.id_b b.id_b AND cb.id_c = c.id_c AND c.fecha > NOW() AND b.nombre = '$nombre';";
    $data = array()
    while ($row33) {
        $result4 = $db4 -> prepare($query4);
        $result4 -> execute();
        $row4 = $result4 -> fetch()
        while ($row4) {
            if ($row4[0] = $row33[0]) {
                array_push ($data, array(
                    "id_banda" => $row33[0],
                    "integrante_actual" => $row33[1],
                    "integrante_pasado" => $row33[2],
                    "correo" => $row33[3],
                    "disco" => $row33[4],
                    "noticia" => $row4[1],
                    "concierto" => $row4[2]
                    ))
            }
        }
    }
?>

<?php
echo "<h2>$nombre</h2>"
?>

<?php
    foreach ($data as $p) {
        echo "<tr> <td>$p['id_banda']</td>
                    <td>$p['integrante_actual']</td>
                    <td>$p['integrante_pasado']</td>
                    <td>$p['correo']</td>
                    <td>$p['disco']</td>
                    <td>$p['noticia']</td>
                    <td>$p['concierto']</td>
                    </tr>";
    }
?>

</table>


<form action="index.php" method="post">
    <input type="submit" value="Volver">
</form>

<?php
include('final.php');
?>
