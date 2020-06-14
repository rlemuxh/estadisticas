<?php

require_once '../class/ConsultasEstadisticas.php';

$buscaUsoECE = new ConsultasEstadisticas();
$listaUnidades = $buscaUsoECE->consultaUnidadesECE();
$longitudArrayUnidades = count($listaUnidades);

for ($i = 0; $i < $longitudArrayUnidades; $i++) {

    // AQUI SE RECORRERA EL LISTADO DE UNIDADES
    $numTotalConsultasECE[] = $listaUnidades[$i]['nombre_unidad'];
    $idUnidad = $listaUnidades[$i]['num_unidad'];

    $listaTotConsultasECE = $buscaUsoECE->consultaUsoConsultasECE($idUnidad);
    $longitudArray = count($listaTotConsultasECE);

    $concentradoTotConsultasECE = array();
    for ($recorreoTotConsultasECE = 0; $recorreoTotConsultasECE < $longitudArray; $recorreoTotConsultasECE++) {
        $concentradoTotConsultasECE[] = array(intval($listaTotConsultasECE[$recorreoTotConsultasECE]["semana"]), (floatval($listaTotConsultasECE[$recorreoTotConsultasECE]["uso_consultas"])*100));
    }

    $numTotalConsultasECE[] = $concentradoTotConsultasECE;
}
//var_dump($numTotalConsultasECE);

echo json_encode($numTotalConsultasECE);