<?php

use App\Models\Paciente;

$data = array();

$ci = $_POST['nuevocipaciente'];

$paciente = Paciente::find($ci);

if($paciente != null){
    $data['success'] = true;
}else{
    $data['success'] = false;
}

echo json_encode($data);

?>