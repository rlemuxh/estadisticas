<?php
require_once '../class/ConsultasEstadisticas.php';

$buscaUsoECE = new ConsultasEstadisticas();
$listaUnidades = $buscaUsoECE->consultaUnidadesECE();
$longitudArrayUnidades = count($listaUnidades);

for ($i = 0; $i < $longitudArrayUnidades; $i++) {

    // AQUI SE RECORRERA EL LISTADO DE UNIDADES
    $numTotalRecetasECE[] = $listaUnidades[$i]['nombre_unidad'];
    $idUnidad = $listaUnidades[$i]['num_unidad'];

    $listaTotRecetasECE = $buscaUsoECE->consultaUsoRecetasECE($idUnidad);
    $longitudArray = count($listaTotRecetasECE);

    $concentradoTotRecetasECE = array();
    for ($recorreoTotRecetasECE = 0; $recorreoTotRecetasECE < $longitudArray; $recorreoTotRecetasECE++) {
        $concentradoTotRecetasECE[] = array(intval($listaTotRecetasECE[$recorreoTotRecetasECE]["semana"]), intval($listaTotRecetasECE[$recorreoTotRecetasECE]["uso_recetas"]));
    }

    $numTotalRecetasECE[] = $concentradoTotRecetasECE;
}
//var_dump($numTotalConsultasECE);

echo json_encode($numTotalRecetasECE);