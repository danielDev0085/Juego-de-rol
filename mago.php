<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mago</title>
</head>
<body>
    <?php
    //session_start();
        class Mago extends Personaje {
            private $secretosDescubiertos;
            private $hechizosLanzados;

            function __Construct($nombre, $especie, $experiencia, $secretosDescubiertos, $hechizosLanzados){
                parent::__Construct($nombre, $especie, $experiencia);
                $this->secretosDescubiertos=$secretosDescubiertos;
                $this->hechizosLanzados=$hechizosLanzados;
            }

            function __toString(){
                return parent::__toString() . '
                        <li>Secretos descubiertos: '. $this->secretosDescubiertos . '</li>
                        <li>Hechizos lanzados: ' . $this->hechizosLanzados .'</li></ul><br>';
            }
            function puntuacion(){
                $secretos = $this->secretosDescubiertos*5;
                $hechizos = $this->hechizosLanzados*10;
                $puntuacion = $secretos+$hechizos;

                return '<ul class="puntuacion"><strong><u>Puntuación ' . $this->nombre . ' (Mago)</u></strong>
                            <li>Secretos descubiertos = ' . $secretos . '</li>
                            <li>Hechizos lanzados = ' . $hechizos . '</li>
                            <li><strong>Total = ' . $puntuacion . '</strong></li>
                        </ul><br>';
            }

            function getPuntuacion(){
                return $this->puntuacion;
            }

            function getNombre(){
                return $this->nombre;
            }

            function setSecretosDescubiertos($numero){
                $this->secretosDescubiertos=$numero;
            }

            function setHechizosLanzados($numero){
                $this->hechizosLanzados=$numero;
            }
        }
    ?>
</body>
</html>