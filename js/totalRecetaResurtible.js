function showChartTotRecResurt(data) {

    var datosTotRecResurt = [
        { label: data[0], data: data[1], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[2], data: data[3], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[4], data: data[5], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[6], data: data[7], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[8], data: data[9], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[10], data: data[11], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[12], data: data[13], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[14], data: data[15], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[16], data: data[17], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[18], data: data[19], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[20], data: data[21], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[22], data: data[23], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[24], data: data[25], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[26], data: data[27], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[28], data: data[29], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[30], data: data[31], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} }
    ];

    var legendContUsoSimf = document.getElementById("legendTotRecResurt");
    $.plot("#tot-rec-resurt", datosTotRecResurt, {legend: { show: true, position: "se", noColumns: 1, container: legendContUsoSimf }, series: {lines: {show: false } }, grid: { hoverable: true, clickable: true }, zoom: {interactive: true}, pan: {interactive: true, enableTouch: true}, xaxis: { axisLabel: 'No. de Semana' }, yaxis: { axisLabel: '% de Uso' } });
}