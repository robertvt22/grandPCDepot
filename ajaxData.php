<?php
include 'mysql.php';

if(!empty($_POST["id_marca"])){
    $query = $db->query("SELECT * FROM model_pc WHERE id_marca = ".$_POST['id_marca']." ");

    $rowCount = $query->num_rows;

    if($rowCount > 0){
        echo '<option value="">Selecteaza modelul</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['id_model'].'">'.$row['nume'].'</option>';
        }
    }else{
        echo '<option value="">Nici un model adaugat</option>';
    }
}elseif(!empty($_POST["id_model"])){

    $query = $db->query("SELECT * FROM caracteristici_model WHERE id_model_pc = ".$_POST['id_model']."");

    $rowCount = $query->num_rows;

    $data = array();
    while($row = $query->fetch_assoc()){
        $data[]= array(
            'id' => $row['id_caracteristica'],
            'procesor' => $row['procesor'],
            'capacitate_ssd' => $row['capacitate_ssd'],
            'placa_video' => $row['placa_video']
        );
    }
    echo json_encode($data);
}
?>
