function showChartTotIncapacidadesECE(data) {
    //console.log(data);

    var datosTotIncapacidadesECE = [
        { label: data[0], data: data[1], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[2], data: data[3], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} },
        { label: data[4], data: data[5], lines: { show: true, fill: false, lineWidth: 5 }, points: {show: true, radius: 5} }
    ];

    var legendContIncapacidadesECE = document.getElementById("legendTotIncapacidadesECE");
    var charOptions = {
        legend: {
            show: true,
            position: "se",
            noColumns: 1,
            container: legendContIncapacidadesECE
        },

        series: {
            lines:
                {
                    show: false
                }
        },

        grid: {
            hoverable: true,
            clickable: true
        },

        zoom: {
            interactive: true
        },

        pan: {
            interactive: true,
            enableTouch: true
        },

        xaxis: {
            position: 'bottom',
            axisLabel: 'No. de Semana',
            axisLabelUseCanvas: true,
            color: 'black'
        },

        yaxis: {
            axisLabel: '% de Uso'
        }
    };
    $.plot("#tot-incapacidades-ece", datosTotIncapacidadesECE, charOptions);
}