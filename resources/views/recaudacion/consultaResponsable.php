<?php

//header('Content-type:application/json; charset-utf8');

include 'conexion.php';

$data = array();

$ci = $conexion->real_escape_string($_POST['ciresponsable']);

$sql = "SELECT A.nombres, A.apaterno, A.amaterno, B.apcasada, B.fnac, B.sexo, B.idioma, B.idiomamat, B.autopercult, B.ocupacion, B.ocomunitaria, B.ecivil, B.escolaridad, B.nacionalidad, B.telefono
        FROM persona A, paciente B
        WHERE A.ci like B.cipaciente and A.ci like '$ci'";
$consulta = mysqli_query($conexion, $sql);

if(mysqli_num_rows($consulta)>0){
    while($resultado = mysqli_fetch_array($consulta)){
        $responsable['nombres']        = $resultado['nombres'];
        $responsable['apaterno']       = $resultado['apaterno'];
        $responsable['amaterno']       = $resultado['amaterno'];
        $responsable['apcasada']       = $resultado['apcasada'];
        $responsable['fnac']           = $resultado['fnac'];
        $responsable['sexo']           = $resultado['sexo'];
        $responsable['idioma']         = $resultado['idioma'];
        $responsable['idiomamat']      = $resultado['idiomamat'];
        $responsable['autopercult']    = $resultado['autopercult'];
        $responsable['ocupacion']      = $resultado['ocupacion'];
        $responsable['ocomunitaria']   = $resultado['ocomunitaria'];
        $responsable['ecivil']         = $resultado['ecivil'];
        $responsable['escolaridad']    = $resultado['escolaridad'];
        $responsable['nacionalidad']   = $resultado['nacionalidad'];
        $responsable['telefono']       = $resultado['telefono'];
    }
    $data['responsable'] = $responsable;
    $data['success'] = true;
}else{
    $data['success'] = false;
}

echo json_encode($data);

?>