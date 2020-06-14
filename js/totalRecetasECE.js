function showChartTotRecetasECE(data) {
    //console.log(data);

    var datosTotRecetasECE = [
        { label: data[0], data: data[1], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[2], data: data[3], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[4], data: data[5], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} }
    ];

    var legendContRecetasECE = document.getElementById("legendTotRecetasECE");
    $.plot("#tot-recetas-ece", datosTotRecetasECE, {legend: { show: true, position: "se", noColumns: 1, container: legendContRecetasECE }, series: {lines: {show: false } }, grid: { hoverable: true, clickable: true }, zoom: {interactive: true}, pan: {interactive: true, enableTouch: true}, xaxis: { axisLabel: 'No. de Semana' }, yaxis: { axisLabel: '% de Uso' } });
}