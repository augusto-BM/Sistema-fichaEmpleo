/*     const getOptionChart1 = () => {
        return {
            tooltip: {
                show: true,
                trigger: "axis",
                triggerOn: "mousemove|click"
            },
            dataZoom: {
                show: true,
                start: 50
            },
            xAxis: [
                {
                    type: "category",
                    data: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"]
                }
            ],
            yAxis: [
                {
                    type: "value"
                }
            ],
            series: [
                {
                    data: [0, 10, 15, 18, 21, 24, 29],
                    type: "line"
                }
            ]
        };
    }; */

    const getOptionChart2 = () => {
        return {
            
            color: ["#3246a8", "#00cc66", "#ff5050", "#c6de76", "#D96A8D"],
            tooltip: {
                show: true,
                trigger: "axis"
            },
            legend: {
                data: ["IMFCA CONTACTO", "JBG OPERATOR", "BKN"]
            },
            grid: {
                left: "3%",
                right: "4%",
                bottom: "3%",
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: [
                {
                    type: "category",
                    boundaryGap: false,
                    data: ["Bumeran", "Facebook", "Instagram", "Tiktok", "Otros"],
                    axisLine: { show: false },
                    axisTick: { show: false },
                    axisPointer: { type: "shadow" }
                }
            ],
            yAxis: [
                {
                    type: "value"
                }
            ],
            series: [
                {
                    name: "IMFCA CONTACTO",
                    type: "line",
                    stack: "Total",
                    data: [120, 132, 101, 134, 90, 230, 210]
                },
                {
                    name: "JBG OPERATOR",
                    type: "line",
                    stack: "Total",
                    data: [220, 182, 191, 234, 290, 330, 310]
                },
                {
                    name: "BKN",
                    type: "line",
                    stack: "Total",
                    data: [150, 232, 201, 154, 190, 330, 410]
                },
            ]
        };
    };

/*     const getOptionChart3 = () => {
        return {
            tooltip: {
                show: true
            },
            xAxis: {
                type: "category",
                data: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]
            },
            yAxis: {
                type: "value"
            },
            series: [
                {
                    data: [120, 200, 150, 80, 70, 110, 130],
                    type: "bar"
                }
            ]
        };
    }; */

    const getOptionChart4 = () => {
        return {
            tooltip: {
                trigger: "item"
            },
            legend: {
                top: "5%",
                left: "center"
            },
            series: [
                {
                    name: "General - Total de Postulantes",
                    type: "pie",
                    radius: ["40%", "70%"],
                    avoidLabelOverlap: false,
                    itemStyle: {
                        borderRadius: 10,
                        borderColor: "#fff",
                        borderWidth: 2
                    },
                    label: {
                        show: false,
                        position: "center"
                    },
                    emphasis: {
                        label: {
                            show: true,
                            fontSize: "40",
                            fontWeight: "bold"
                        }
                    },
                    labelLine: {
                        show: false
                    },
                    data: [
                        { value: 1048, name: "IMFCA CONTACTO" },
                        { value: 735, name: "JGB OPERATOR" },
                        { value: 580, name: "BROKERS " },

                    ]
                }
            ]
        };
    };

    function updateChart3(data) {
            
        // Configuración del gráfico
        var optionChart3 = {
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
                name: 'Direct',
                type: 'bar',
                barWidth: '60%',
                data: data.conteos,
                itemStyle: {
                    color: function(params) {
                        // Array de colores
                        var colorList = ['#c23531', '#2f4554', '#61a0a8', '#d48265', '#749f83', '#ca8622', '#bda29a'];
                        return colorList[params.dataIndex]; // Asignar color según el índice de datos
                    }
                }
            }, ]
        };

        // Obtener el gráfico y aplicar la nueva configuración
        var chart3 = echarts.init(document.getElementById("chart3"));
        chart3.setOption(optionChart3);
    }

    const initCharts = () => {
        const chart1 = echarts.init(document.getElementById("chart1"));
        const chart2 = echarts.init(document.getElementById("chart2"));
        const chart3 = echarts.init(document.getElementById("chart3"));
        const chart4 = echarts.init(document.getElementById("chart4"));

/*         chart1.setOption(getOptionChart1());
 */        chart2.setOption(getOptionChart2());
/*         chart3.setOption(getOptionChart3());
 */        chart4.setOption(getOptionChart4());

/*         chart1.resize();
 */        chart2.resize();
/*         chart3.resize();
 */        chart4.resize();
    };

    window.addEventListener("load", () => {
        initCharts();
    });