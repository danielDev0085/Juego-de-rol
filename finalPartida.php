<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="finalPartida.css">
    <title>Partida</title>
</head>
<body>
    <h1>Final de partida</h1>
    
    <?php
        require_once("personajes.php");
        require_once("guerrero.php");
        require_once("mago.php");
        require_once("explorador.php");
        session_start();
        
        echo '<form method="post">';            
        foreach ($_SESSION['jugador'] as $indice=>$jugador){
            echo '<h3>Jugador '.($indice+1).'</h3>';

            //Mostramos formulario según el personaje
            if ($jugador instanceof Guerrero){
                echo'<div>
                        <label for="enemigosAbatidos'.$indice.'">Enemigos abatidos
                            <input type="text" name="enemigosAbatidos'.$indice.'" id="enemigosAbatidos'.$indice.'">
                        </label>
                        <label for="dañoSufrido'.$indice.'">Daño sufrido
                            <input type="text" name="dañoSufrido'.$indice.'" id="dañoSufrido'.$indice.'">
                        </label>
                    </div>><br>';
            }elseif ($jugador instanceof Mago) {
                echo'<div>
                        <label for="secretosDescubiertos'.$indice.'">Secretos descubiertos
                            <input type="text" name="secretosDescubiertos'.$indice.'" id="secretosDescubiertos'.$indice.'">
                        </label>
                        <label for="hechizosLanzados'.$indice.'">Hechizos lanzados
                            <input type="text" name="hechizosLanzados'.$indice.'" id="hechizosLanzados'.$indice.'">
                        </label>
                    </div><br>';
            }
            elseif ($jugador instanceof Explorador) {
                echo'<div>
                        <label for="objetivosDescubiertos'.$indice.'">Objetivos descubiertos
                            <input type="text" name="objetivosDescubiertos'.$indice.'" id="objetivosDescubiertos'.$indice.'">
                        </label>
                        <label for="vecesSinSerDescubierto'.$indice.'">Veces sin ser descubierto
                            <input type="text" name="vecesSinSerDescubierto'.$indice.'" id="vecesSinSerDescubierto'.$indice.'">
                        </label>
                    </div><br>';
            }else{
                echo 'El jugador '.$indice.' no existe';
            }
        }
        echo '<button type="submit" name="resultadoPartida">Resultado de la partida</button>
            </form>';

        if (isset($_POST['resultadoPartida'])) {
            $camposLlenos = true;
            //Comprobar si todos los campos están completos
            foreach ($_SESSION['jugador'] as $indice => $jugador) {
                if (
                    ($jugador instanceof Guerrero && (($_POST["enemigosAbatidos$indice"]==="") || ($_POST["dañoSufrido$indice"]===""))) ||
                    ($jugador instanceof Mago && (($_POST["secretosDescubiertos$indice"]==="") || ($_POST["hechizosLanzados$indice"]===""))) ||
                    ($jugador instanceof Explorador && (($_POST["objetivosDescubiertos$indice"]==="") || ($_POST["vecesSinSerDescubierto$indice"]==="")))
                ) {
                    $camposLlenos = false;
                    break;
                }
            }
            if (!$camposLlenos) {
                echo '<p>Todos los campos deben estar llenos.</p>';
            } else {
                //Si están completos
                foreach($_SESSION['jugador'] as $indice=>$jugador){
                    if ($jugador instanceof Guerrero && isset($_POST["enemigosAbatidos$indice"], $_POST["dañoSufrido$indice"])) {
                        $enemigosAbatidos = $_POST["enemigosAbatidos$indice"];
                        $dañoSufrido = $_POST["dañoSufrido$indice"];
            
                        // Asignar los valores al jugador
                        $jugador->setEnemigosAbatidos($enemigosAbatidos);
                        $jugador->setDañoSufrido($dañoSufrido);
                    } elseif ($jugador instanceof Mago && isset($_POST["secretosDescubiertos$indice"], $_POST["hechizosLanzados$indice"])) {
                        $secretosDescubiertos = $_POST["secretosDescubiertos$indice"];
                        $hechizosLanzados = $_POST["hechizosLanzados$indice"];
            
                        // Asignar los valores al jugador
                        $jugador->setSecretosDescubiertos($secretosDescubiertos);
                        $jugador->setHechizosLanzados($hechizosLanzados);
                    } elseif ($jugador instanceof Explorador && isset($_POST["objetivosDescubiertos$indice"], $_POST["vecesSinSerDescubierto$indice"])) {
                        $objetivosDescubiertos = $_POST["objetivosDescubiertos$indice"];
                        $vecesSinSerDescubierto = $_POST["vecesSinSerDescubierto$indice"];
            
                        // Asignar los valores al jugador
                        $jugador->setObjetivosDescubiertos($objetivosDescubiertos);
                        $jugador->setvecesNoDescubierto($vecesSinSerDescubierto);
                    }
                }

                echo '<table id="tabla">
                        <tbody>';
                            foreach ($_SESSION['jugador'] as $jugador) { 
                                echo '<tr>
                                        <td id="jugador">'. $jugador->__toString() . '</td>
                                        <td id="puntuacion">'. $jugador->puntuacion() . '</td>
                                    </tr>';
                                    }
                    echo '</tbody>
                    </table>';
            }
        }    
    ?>
</body>
</html>