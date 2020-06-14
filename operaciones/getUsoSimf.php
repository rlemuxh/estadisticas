<?php

if(isset($_POST['unidad'])) {
    require_once '../class/ConsultasEstadisticas.php';

    $numeroUnidad = $_POST['unidad'];

    $buscaUsoSimf = new ConsultasEstadisticas();
    $listaUnidades = $buscaUsoSimf->consultaUnidades();
    $longitudArrayUnidades = count($listaUnidades);
    $usoSistemaSimf = array();

    for($i=0; $i<$longitudArrayUnidades; $i++){

        // AQUI SE RECORRERA EL LISTADO DE UNIDADES
        $usoSimfUnidades[] = $listaUnidades[$i]['nombre_unidad'];
        $idUnidad = $listaUnidades[$i]['num_unidad'];

        $listaUsoSimf = $buscaUsoSimf->consultaUsoSimf($idUnidad);
        $longitudArray = count($listaUsoSimf);

        $concentradoUsoSimf = array();
        for($recorreoUsoSimf=0; $recorreoUsoSimf<$longitudArray; $recorreoUsoSimf++) {
            $concentradoUsoSimf[] = array(intval($listaUsoSimf[$recorreoUsoSimf]["semana"]),(floatval($listaUsoSimf[$recorreoUsoSimf]["uso"])*100));
        }

        $usoSimfUnidades[] = $concentradoUsoSimf;
    }

    echo json_encode($usoSimfUnidades);
}
else {
    echo "No se recibio el numero de unidad a consultar";
}