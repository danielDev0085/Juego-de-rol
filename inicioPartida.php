<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inicioPartida.css">
    <title>Inicio de partida</title>
</head>
<body>
        <form method="post">
            <fieldset>
                <legend>Selecciona personaje</legend>
                <label for="nombre">Nombre:
                    <input type="text" name="nombre" id="nombre">
                </label><br>
                <label for="experiencia">Experiencia: 
                    <input type="text" name="experiencia" id="experiencia">
                </label><br>
            
                <div id="radio-buttons">
                    <label for="guerrero">
                        <input type="radio" name="especie" id="guerrero" value="guerrero" checked>
                    </label>Guerrero<br>
                    <label for="mago">
                        <input type="radio" name="especie" id="mago" value="mago">
                    </label>Mago<br>
                    <label for="explorador">
                        <input type="radio" name="especie" id="explorador" value="explorador">
                    </label>Explorador<br>
                </div>
                <div>  
                    <button type="submit" name="añadir">Añadir jugador</button>
                    <button type="submit" id="empezar" name="empezar">Empezar partida</button>
                </div>
            </fieldset>
        </form>

    <?php
      
        require_once("personajes.php");
        require_once("guerrero.php");
        require_once("mago.php");
        require_once("explorador.php");

        session_start();

        if (!isset($_SESSION['numJugadores'])) {
            $_SESSION['numJugadores'] = 0;
            $_SESSION['jugador'] = array();
        }        
            
        if(isset($_POST["añadir"])){
            //Obtener valores del formulario
            $nombre=$_POST["nombre"];
            $experiencia=$_POST["experiencia"];
            $especie=$_POST['especie'];
            
            if(!empty($nombre) && !empty($experiencia) && !empty($especie)){ //Si no están vacíos
            
                if ($_SESSION['numJugadores']<4) {
                    
                    //Crear el personaje según la especie introducida en el formulario
                    switch ($especie) {
                        case 'guerrero':
                            $_SESSION['jugador'][$_SESSION['numJugadores']]=new Guerrero($nombre, $especie, $experiencia, 0, 0);
                            echo 'Guerrero creado <br>';
                            break;
                        
                        case 'mago':
                            $_SESSION['jugador'][$_SESSION['numJugadores']]=new Mago($nombre, $especie, $experiencia, 0, 0);
                            echo 'Mago creado <br>';
                            break;

                        case 'explorador':
                            $_SESSION['jugador'][$_SESSION['numJugadores']]=new Explorador($nombre, $especie, $experiencia, 0, 0);
                            echo 'Explorador creado<br>';
                            break;
                    }
                
                    $_SESSION['numJugadores']++;  

                }else{
                    echo 'Máximo de jugadores permitido, haz click en "Empezar partida" <br>';
                }
                
            }else{
                echo '<p>Personaje incompleto.</p><br>';
            }
        }

        if(isset($_POST["empezar"])){
            if ($_SESSION['numJugadores']<2) {
                echo 'Seleccione un mínimo de dos jugadores para empezar la partida';
            }else{
                header("location:finalPartida.php");
            }
        }
    ?>
    
</body>
</html>