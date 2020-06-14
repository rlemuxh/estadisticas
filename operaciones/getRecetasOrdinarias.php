<?php

if(isset($_POST['unidad'])) {
require_once '../class/ConsultasEstadisticas.php';

$numeroUnidad = $_POST['unidad'];

$buscaRecetasOrdinarias = new ConsultasEstadisticas();
$listaUnidades = $buscaRecetasOrdinarias->consultaUnidades();
$longitudArrayUnidades = count($listaUnidades);
$recetasConcentrado = array();

for($i=0; $i<$longitudArrayUnidades; $i++){

    // AQUI SE RECORRERA EL LISTADO DE UNIDADES
    $recetasTotalesUnidad[] = $listaUnidades[$i]['nombre_unidad'];
    $idUnidad = $listaUnidades[$i]['num_unidad'];

    $recetasOrdinarias = $buscaRecetasOrdinarias->consultaRecetasOrdinarias($idUnidad);
    $longitudArray = count($recetasOrdinarias);

    $recetasConcentrado = array();
    for($recorreRecetas=0; $recorreRecetas<$longitudArray; $recorreRecetas++) {
        $recetasConcentrado[] = array(intval($recetasOrdinarias[$recorreRecetas]["semana"]),intval($recetasOrdinarias[$recorreRecetas]["num_recetas_simf"]));
    }

    $recetasTotalesUnidad[] = $recetasConcentrado;
}

echo json_encode($recetasTotalesUnidad);
}
else {
    echo "No se recibio el numero de unidad a consultar";
}