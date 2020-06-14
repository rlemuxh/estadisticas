<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Estadisticas de Uso UMF - HMF</title>
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> -->
    <link rel="stylesheet" href="css/estadisticas.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>

<body>
<h1 align="center">Estadisticas de uso SIMF - ECE</h1>

<div class="row">
    <div class="col-md-12">
        <h2>Recetas Impresas</h2>
    </div>
    <div class="col-md-9 demo-container" id="demo-container">
        <div id="placeholder" class="demo-placeholder"></div>
    </div>
    <div class="col-md-3">
        <div class="legend" id="legendContainer" style="width:9em;height:8em"></div>
    </div>
</div>
<br/>


    <div class="row">
        <div class="col-md-12">
            <h2>Porcentaje de Uso de SIMF</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 demo-container" id="padre-uso-simf">
            <div id="uso-simf" class="demo-placeholder"></div>
        </div>
        <div class="col-ms-3">
            <div class="legend" id="legendUsoSimf" style="width: 9em;height: 8em;"></div>
        </div>
    </div>
<br/>

<div class="row">
    <div class="col-md-12">
        <h2>Incapacidades Emitidas en SIMF</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-9 demo-container" id="padre-num-incap">
        <div id="num-incap" class="demo-placeholder"></div>
    </div>
    <div class="col-md-3">
        <div class="col-md-3">
            <div class="legend" id="legendNumIncap" style="width: 9em;height: 8em;"></div>
        </div>
    </div>
</div>
<br/>

<div class="row">
    <div class="col-md-12">
        <h2>Recetas Resurtibles Emitidas en SIMF</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-9 demo-container" id="padre-tot-rec-resurt">
        <div id="tot-rec-resurt" class="demo-placeholder"></div>
    </div>
    <div class="col-md-3">
        <div class="col-md-3">
            <div class="legend" id="legendTotRecResurt" style="width: 9em;height: 8em;"></div>
        </div>
    </div>
</div>
<br/>

<div class="row">
    <div class="col-md-12">
        <h2>Recetas de Transcripción Emitidas en SIMF</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-9 demo-container" id="padre-tot-rec-transcrip">
        <div id="tot-rec-transcrip" class="demo-placeholder"></div>
    </div>
    <div class="col-md-3">
        <div class="col-md-3">
            <div class="legend" id="legendTotRecTranscrip" style="width: 9em;height: 8em;"></div>
        </div>
    </div>
</div>
<br/>

<div class="row">
    <div class="col-md-12">
        <h2>Uso ECE</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-9 demo-container" id="padre-tot-consul-ece">
        <div id="tot-consul-ece" class="demo-placeholder"></div>
    </div>
    <div class="col-md-3">
        <div class="col-md-3">
            <div class="legend" id="legendTotConsultasECE" style="width: 9em;height: 8em;"></div>
        </div>
    </div>
</div>
<br/>

<div class="row">
    <div class="col-md-12">
        <h2>Recetas Emitidas en ECE</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-9 demo-container" id="padre-tot-recetas-ece">
        <div id="tot-recetas-ece" class="demo-placeholder"></div>
    </div>
    <div class="col-md-3">
        <div class="col-md-3">
            <div class="legend" id="legendTotRecetasECE" style="width: 9em;height: 8em;"></div>
        </div>
    </div>
</div>
<br/>

<script src="jquery/jquery-1.11.1.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="jquery/jquery.event.drag.js"></script>
<script src="jquery/jquery.mousewheel.js"></script>
<script src="flot/source/jquery.canvaswrapper.js"></script>
<script src="flot/source/jquery.colorhelpers.js"></script>
<script src="flot/source/jquery.flot.js"></script>
<script src="flot/source/jquery.flot.saturated.js"></script>
<script src="flot/source/jquery.flot.browser.js"></script>
<script src="flot/source/jquery.flot.drawSeries.js"></script>
<script src="flot/source/jquery.flot.uiConstants.js"></script>
<script src="flot/source/jquery.flot.resize.js"></script>
<script src="flot/source/jquery.flot.legend.js"></script>
<script src="flot/source/jquery.flot.hover.js"></script>
<script src="flot/source/jquery.flot.selection.js"></script>
<script src="flot/source/jquery.flot.navigate.js"></script>
<script src="flot/source/jquery.flot.touchNavigate.js"></script>
<script src="flot/source/jquery.flot.selection.js"></script>
<script src="flot/source/jquery.flot.touch.js"></script>
<script src="js/recetas.js"></script>
<script src="js/usoSimf.js"></script>
<script src="js/numeroIncapacidades.js"></script>
<script src="js/totalRecetaResurtible.js"></script>
<script src="js/totalRecetasTranscripcion.js"></script>
<script src="js/totalConsultasECE.js"></script>
<script src="js/totalRecetasECE.js"></script>

<!--<script src="flot/source/jquery.flot.pie.js"></script>
<script src="flot/source/jquery.flot.categories.js"></script>-->
<script>
    var previousPoint = null;

    $.fn.UseTooltip = function(txtShow) {
        $(this).bind("plothover", function(event,pos,item){
            if(item){
                if(previousPoint != item.dataIndex){
                    previousPoint = item.dataIndex;
                    $("#tooltip").remove();
                    var x = item.datapoint[0];
                    var y = item.datapoint[1];

                    var txtToolTip = "<b>" + item.series.label + "</b></br>Sem. " + x + ", " + txtShow +" "+ y;
                    showTooltip(item.pageX, item.pageY, txtToolTip);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    };

    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 20,
            border: '2px solid #4572A7',
            padding: '2px',
            size: '10',
            'border-radius': '6px 6px 6px 6px',
            'background-color': '#fff',
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
    }

    $(function() {
        $.ajax({
            url: 'operaciones/getRecetasOrdinarias.php',
            type: 'post',
            cache: false,
            data: { unidad: 5 },
            success: function (data) {
                if(data) {
                    //console.log(data);
                    var infoRecetas = JSON.parse(data);
                    //console.log(infoRecetas);
                    showChartRecetas(infoRecetas);

                }
            }
        });

        $.ajax({
            url: 'operaciones/getUsoSimf.php',
            type: 'post',
            cache: false,
            data: { unidad: 5 },
            success: function (data) {
                if(data) {
                    var infoUsoSimf = JSON.parse(data);
                    showChartUsoSimf(infoUsoSimf);
                }
            }
        });

        $.ajax({
            url: 'operaciones/getIncapSimf.php',
            type: 'post',
            cache: false,
            success: function (data) {
                if(data) {
                    var infoIncapSimf = JSON.parse(data);
                    showChartNumIncapacidades(infoIncapSimf);
                }
            }
        })

        $.ajax({
            url: 'operaciones/getTotRecetaResurtible.php',
            type: 'post',
            cache: false,
            success: function (data) {
                if(data) {
                    var infoTotRecResurt = JSON.parse(data);
                    showChartTotRecResurt(infoTotRecResurt);
                }
            }
        });

        $.ajax({
            url: 'operaciones/getRecetasTranscripcion.php',
            type: 'post',
            cache: false,
            success: function (data) {
                if(data) {
                    var infoTotRecTranscrip = JSON.parse(data);
                    showChartTotRecTranscripcion(infoTotRecTranscrip);
                }
            }
        });

        $.ajax({
            url: 'operaciones/getTotConsultasECE.php',
            type: 'post',
            cache: false,
            success: function(data) {
                if(data) {
                    var infoTotConsultECE = JSON.parse(data);
                    showChartTotConsultasECE(infoTotConsultECE);
                }
            }
        });

        $.ajax({
            url: 'operaciones/getTotRecetasECE.php',
            type: 'post',
            cache: false,
            success: function(data) {
                if(data){
                    var infoTotRecetasECE = JSON.parse(data);
                    showChartTotRecetasECE(infoTotRecetasECE);
                }
            }
        });

    });

    $("#demo-container #placeholder").UseTooltip("Recetas :");
    $("#padre-uso-simf #uso-simf").UseTooltip("% Uso :");
    $("#padre-num-incap #num-incap").UseTooltip("Incapacidades: ");
    $("#padre-tot-rec-resurt #tot-rec-resurt").UseTooltip("Recetas :");
    $("#padre-tot-rec-transcrip #tot-rec-transcrip").UseTooltip("Recetas :");
    $("#padre-tot-consul-ece #tot-consul-ece").UseTooltip("% Uso :");
    $("#padre-tot-recetas-ece #tot-recetas-ece").UseTooltip("% Recetas: ");
</script>
</body>
</html>