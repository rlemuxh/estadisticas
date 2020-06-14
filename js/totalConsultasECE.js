function showChartTotConsultasECE(data) {
    //console.log(data);

    var datosTotConsultasECE = [
        { label: data[0], data: data[1], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[2], data: data[3], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[4], data: data[5], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} }
    ];

    var legendContConsultasECE = document.getElementById("legendTotConsultasECE");
    $.plot("#tot-consul-ece", datosTotConsultasECE, {legend: { show: true, position: "se", noColumns: 1, container: legendContConsultasECE }, series: {lines: {show: false } }, grid: { hoverable: true, clickable: true }, zoom: {interactive: true}, pan: {interactive: true, enableTouch: true} });
}