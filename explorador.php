<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorador</title>
</head>
<body>
    <?php
    //session_start();
        Class Explorador extends Personaje{
            private $objetivosDescubiertos;
            private $vecesNoDescubierto;

            function __Construct($nombre, $especie, $experiencia, $objetivosDescubiertos, $vecesNoDescubierto){
                parent::__Construct($nombre, $especie, $experiencia);
                $this -> objetivosDescubiertos=$objetivosDescubiertos;
                $this -> vecesNoDescubierto=$vecesNoDescubierto;
            }

            function __toString(){
                return  parent::__toString() . '
                        <li>Objetivos descubiertos: '. $this->objetivosDescubiertos . '</li>
                        <li>Veces sin ser descubierto: '. $this->vecesNoDescubierto . '</li></ul><br>';
            }

            function puntuacion(){
                $objetivos = $this->objetivosDescubiertos*10;
                $noDescubierto = $this->vecesNoDescubierto*5;
                $puntuacion = $objetivos+$noDescubierto;

                return '<ul class="puntuacion"><strong><u>Puntuación ' . $this->nombre . ' (Explorador)</u></strong>
                            <li>Objetivos descubiertos = ' . $objetivos . '</li>
                            <li>Veces sin ser descubiertos = ' . $noDescubierto . '</li>
                            <li><strong>Total = ' . $puntuacion . '</strong></li>
                        </ul><br>';
            }

            function getPuntuacion(){
                return $this->puntuacion;
            }

            function getNombre(){
                return $this->nombre;
            }

            function setObjetivosDescubiertos($numero){
                $this->objetivosDescubiertos=$numero;
            }

            function setvecesNoDescubierto($numero){
                $this->vecesNoDescubierto=$numero;
            }

        }
    ?>
    
</body>
</html>