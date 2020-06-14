<?php
require_once '../class/ConsultasEstadisticas.php';

$buscaUsoECE = new ConsultasEstadisticas();
$listaUnidades = $buscaUsoECE->consultaUnidadesECE();
$longitudArrayUnidades = count($listaUnidades);

for ($i = 0; $i < $longitudArrayUnidades; $i++) {

    // AQUI SE RECORRERA EL LISTADO DE UNIDADES
    $numTotalIncapacidadesECE[] = $listaUnidades[$i]['nombre_unidad'];
    $idUnidad = $listaUnidades[$i]['num_unidad'];

    $listaTotIncapacidadesECE = $buscaUsoECE->consultaUsoIncapacidadesECE($idUnidad);
    $longitudArray = count($listaTotIncapacidadesECE);

    $concentradoTotIncapacidadesECE = array();
    for ($recorreoTotIncapacidadesECE = 0; $recorreoTotIncapacidadesECE < $longitudArray; $recorreoTotIncapacidadesECE++) {
        $concentradoTotIncapacidadesECE[] = array(intval($listaTotIncapacidadesECE[$recorreoTotIncapacidadesECE]["semana"]), (floatval($listaTotIncapacidadesECE[$recorreoTotIncapacidadesECE]["uso_incapacidades"])*100));
    }

    $numTotalIncapacidadesECE[] = $concentradoTotIncapacidadesECE;
}
//var_dump($numTotalConsultasECE);

echo json_encode($numTotalIncapacidadesECE);