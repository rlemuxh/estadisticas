<?php
require_once '../class/ConsultasEstadisticas.php';

$buscaUsoSimf = new ConsultasEstadisticas();
$listaUnidades = $buscaUsoSimf->consultaUnidades();
$longitudArrayUnidades = count($listaUnidades);

for($i=0; $i<$longitudArrayUnidades; $i++){

    // AQUI SE RECORRERA EL LISTADO DE UNIDADES
    $numTotalIncap[] = $listaUnidades[$i]['nombre_unidad'];
    $idUnidad = $listaUnidades[$i]['num_unidad'];

    $listaTotRecResurt = $buscaUsoSimf->consultaTotRecetaResurtible($idUnidad);
    $longitudArray = count($listaTotRecResurt);

    $concentradoTotRecResurt = array();
    for($recorreoTotRecResurt=0; $recorreoTotRecResurt<$longitudArray; $recorreoTotRecResurt++) {
        $concentradoTotRecResurt[] = array(intval($listaTotRecResurt[$recorreoTotRecResurt]["semana"]),intval($listaTotRecResurt[$recorreoTotRecResurt]["tot_recetas_resurtibles"]));
    }

    $numTotalIncap[] = $concentradoTotRecResurt;
}

echo json_encode($numTotalIncap);