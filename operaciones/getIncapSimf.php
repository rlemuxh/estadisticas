<?php
require_once '../class/ConsultasEstadisticas.php';

$numeroUnidad = $_POST['unidad'];

$buscaUsoSimf = new ConsultasEstadisticas();
$listaUnidades = $buscaUsoSimf->consultaUnidades();
$longitudArrayUnidades = count($listaUnidades);
//$usoSistemaSimf = array();

for($i=0; $i<$longitudArrayUnidades; $i++){

    // AQUI SE RECORRERA EL LISTADO DE UNIDADES
    $numTotalIncap[] = $listaUnidades[$i]['nombre_unidad'];
    $idUnidad = $listaUnidades[$i]['num_unidad'];

    $listaNumIncap = $buscaUsoSimf->consultaNumIncap($idUnidad);
    $longitudArray = count($listaNumIncap);

    $concentradoNumIncap = array();
    for($recorreoNumIncap=0; $recorreoNumIncap<$longitudArray; $recorreoNumIncap++) {
        $concentradoNumIncap[] = array(intval($listaNumIncap[$recorreoNumIncap]["semana"]),intval($listaNumIncap[$recorreoNumIncap]["num_incap_simf"]));
    }

    $numTotalIncap[] = $concentradoNumIncap;
}

echo json_encode($numTotalIncap);