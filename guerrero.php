<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guerrero</title>
</head>
<body>
    <?php
    //session_start();
        class Guerrero extends Personaje{
            private $enemigosAbatidos;
            private $dañoSufrido;

            function __Construct($nombre, $especie, $experiencia, $enemigosAbatidos, $dañoSufrido){
                parent::__Construct($nombre, $especie, $experiencia);
                $this->enemigosAbatidos=$enemigosAbatidos;
                $this->dañoSufrido=$dañoSufrido;
            }

            function __toString(){
                return parent::__toString() . '
                        <li>Enemigos abatidos: '. $this->enemigosAbatidos . '</li>
                        <li>Daño sufrido: ' . $this->dañoSufrido . '</li></ul><br>';
            }

            function puntuacion(){
                $abatidos = $this->enemigosAbatidos*10;
                $sufrido = $this->dañoSufrido*5;
                $puntuacion = $abatidos+$sufrido;

                return '<ul class="puntuacion"><strong><u>Puntuación ' . $this->nombre . ' (Guerrero)</u></strong>
                            <li>Enemigos abatidos = ' . $abatidos . '</li>
                            <li>Daño sufrido = ' . $sufrido . '</li>
                            <li><strong>Total = ' . $puntuacion . '</strong></li>
                        </ul><br>';
            }

            function getPuntuacion(){
                return $this->puntuacion;
            }

            function getNombre(){
                return $this->nombre;
            }

            function setEnemigosAbatidos($numero){
                $this->enemigosAbatidos=$numero;
            }

            function setDañoSufrido($numero){
                $this->dañoSufrido=$numero;
            }
        }
    ?>
    
</body>
</html>