function updateRedesSociales(data) {          
    // Configuración del gráfico
    var optionRedesSociales = {
        title: {
            text: 'Redes Sociales mas solicitados como fuente de trabajo',
            left: 'center' // Puedes ajustar la alineación según tu preferencia
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: "category",
            data: data.redes_sociales,
            axisTick: {
                alignWithLabel: true
            }
        },
        yAxis: {
            type: "value"
        },
        series: [{
            name: 'Total:',
            type: 'bar',
            barWidth: '60%',
            data: data.conteos,
            itemStyle: {
                color: function(params) {
                    // Array de colores
                    var colorList = ['#c23531', '#2f4554', '#61a0a8', '#d48265', '#749f83', '#ca8622', '#bda29a'];
                    return colorList[params.dataIndex]; // Asignar color según el índice de datos
                }
            },
            label: {
                show: true,
                position: 'inside', // Coloca las etiquetas dentro de las barras
                formatter: '{c}' // Muestra el valor de los datos
            }
        }]
    };

    // Obtener el gráfico y aplicar la nueva configuración
    var chartRedesSociales = echarts.init(document.getElementById("chart3"));
    chartRedesSociales.setOption(optionRedesSociales);
}

function updateTotal(data) {          
    // Configuración del gráfico
    var optionTotal = {
        title: {
            text: 'TOTAL DE POSTULANTES - GENERAL',
            left: 'center',
            padding: [0, 0, 0, 0]
          },
          tooltip: {
            trigger: 'item'
          },
          legend: {
            top: '5%',
            left: 'center'
          },
          series: [
            {
              name: 'Total de postulantes:',
              type: 'pie',
              radius: ['40%', '70%'],
              avoidLabelOverlap: false,
              padAngle: 5,
              itemStyle: {
                borderRadius: 10
              },
              label: {
                show: true,
                position: 'center', // Aquí es donde se configura la posición del valor
                fontSize: 40,
                fontWeight: 'bold',
                formatter: '{c}' // Esto mostrará el valor en lugar del nombre
              },
              emphasis: {
                label: {
                  show: true,
                  fontSize: 40,
                  fontWeight: 'bold'
                }
              },
              labelLine: {
                show: false
              },
              data: [
                { value: data.total, name: data.nombre_empresa }
              ]
            }
          ]
    };

    // Obtener el gráfico y aplicar la nueva configuración
    var chartTotal = echarts.init(document.getElementById("chart4"));
    chartTotal.setOption(optionTotal);
}