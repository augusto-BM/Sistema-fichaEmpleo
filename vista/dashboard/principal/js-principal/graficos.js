function updateRedesSociales(data) {
  // Configuración del gráfico
  var optionRedesSociales = {
    color: ["#3246a8", "#00cc66", "#ff5050", "#c6de76", "#D96A8D"],
    tooltip: {
      show: true,
      trigger: "axis",
    },
    title: {
      text: "REDES SOCIALES MAS SOLICITADOS COMO FUENTE DE TRABAJO",
      left: "center",
      padding: [25, 0, 0, 0],
    },
    legend: {
      data: [], // Los nombres de las sedes se llenarán dinámicamente
    },
    grid: {
      left: "3%",
      right: "4%",
      bottom: "3%",
      containLabel: true,
    },
    toolbox: {
      feature: {
        saveAsImage: {
          pixelRatio: 2, // Definir la resolución de la imagen
          name: 'grafico_redes_sociales', // Nombre del archivo de imagen
          backgroundColor: 'white', // Color de fondo de la imagen
          title: 'Descargar', // Texto del botón de descarga
        },
      },
    },
    xAxis: [
      {
        type: "category",
        boundaryGap: false,
        data: ["Bumeran", "Facebook", "Instagram", "Tiktok", "Otros"],
        axisLine: { show: false },
        axisTick: { show: false },
        axisPointer: { type: "shadow" },
      },
    ],
    yAxis: [
      {
        type: "value",
      },
    ],
    series: [], // Los datos de las series se llenarán dinámicamente
  };

  // Llenar dinámicamente la leyenda con los nombres de las sedes
  for (var i = 0; i < data.length; i++) {
    optionRedesSociales.legend.data.push(data[i].sede);
  }

  // Llenar dinámicamente los datos de las series
  for (var i = 0; i < data.length; i++) {
    var serie = {
      name: data[i].sede,
      type: "line",
      stack: "Total",
      data: [], // Los datos se llenarán dinámicamente
    };

    // Llenar los datos de la serie con los totales por red social
    for (var j = 0; j < data[i].redes_sociales.length; j++) {
      serie.data.push(data[i].redes_sociales[j].total);
    }

    optionRedesSociales.series.push(serie);
  }

  // Obtener el gráfico y aplicar la nueva configuración
  var chartRedesSociales = echarts.init(
    document.getElementById("graficoRedesSociales")
  );
  chartRedesSociales.setOption(optionRedesSociales);
}

function updateTotal(data) {
  // Configuración del gráfico
  var optionTotal = {
    title: {
      text: "TOTAL DE POSTULANTES - GENERAL",
      left: "center",
      padding: [0, 0, 0, 0],
    },
    tooltip: {
      trigger: "item",
    },
    legend: {
      top: "5%",
      left: "center",
    },
    series: [
      {
        name: "Total de Postulantes:",
        type: "pie",
        radius: ["40%", "70%"],
        avoidLabelOverlap: false,
        itemStyle: {
          borderRadius: 10,
          borderColor: "#fff",
          borderWidth: 2,
        },
        label: {
          show: false,
          position: "center",
        },
        emphasis: {
          label: {
            show: true,
            fontSize: "40",
            fontWeight: "bold",
          },
        },
        labelLine: {
          show: false,
        },
        data: data,
      },
    ],
  };
  // Obtener el gráfico y aplicar la nueva configuración
  var chartTotal = echarts.init(document.getElementById("graficoTotal"));
  chartTotal.setOption(optionTotal);
}
