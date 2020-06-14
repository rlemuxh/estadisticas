<?php
require_once '../class/ConsultasEstadisticas.php';

$buscaUsoSimf = new ConsultasEstadisticas();
$listaUnidades = $buscaUsoSimf->consultaUnidades();
$longitudArrayUnidades = count($listaUnidades);

for($i=0; $i<$longitudArrayUnidades; $i++){

    // AQUI SE RECORRERA EL LISTADO DE UNIDADES
    $numTotalRecTranscrip[] = $listaUnidades[$i]['nombre_unidad'];
    $idUnidad = $listaUnidades[$i]['num_unidad'];

    $listaTotRecTranscrip = $buscaUsoSimf->consultaTotRecetaTranscripcion($idUnidad);
    $longitudArray = count($listaTotRecTranscrip);

    $concentradoTotRecTranscrip= array();
    for($recorreoTotRecTranscrip=0; $recorreoTotRecTranscrip<$longitudArray; $recorreoTotRecTranscrip++) {
        $concentradoTotRecTranscrip[] = array(intval($listaTotRecTranscrip[$recorreoTotRecTranscrip]["semana"]),intval($listaTotRecTranscrip[$recorreoTotRecTranscrip]["tot_rec_transcripcion"]));
    }

    $numTotalRecTranscrip[] = $concentradoTotRecTranscrip;
}

echo json_encode($numTotalRecTranscrip);