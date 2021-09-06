<?php

use App\Models\User;

$data = array();
$ci = User::find($ci);

if($ci != null){
    $data['success'] = true;
}else{
    $data['success'] = false;
}

echo json_encode($data);

?>