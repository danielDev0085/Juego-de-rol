<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personajes</title>
</head>
<body>
    <?php
        class Personaje {
            protected $nombre;
            protected $especie;
            protected $experiencia;


            function __Construct ($nombre,$especie,$experiencia){
                $this -> nombre=$nombre;
                $this -> especie=$especie;
                $this -> experiencia=$experiencia;
            }

            function __toString(){
                return '<ul class="datos"><strong>JUGADOR</strong>
                        <li>Nombre: '. $this->nombre .'</li>
                        <li>Especie: '. $this->especie . '</li>
                        <li>Experiencia: '. $this->experiencia . '</li>';
            }
        }
    ?>
    
</body>
</html>