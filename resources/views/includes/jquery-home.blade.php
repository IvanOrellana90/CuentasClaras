<script>
    $(document).ready(function() {

        $.ajax({
            type: 'get',
            url: '{!!URL::to('getGastosMensuales')!!}',
            dataType: "json",
            data:{'id':1},
            success: function (gastosMensuales) {

                var meses = [], montosActivos = [], montosPasivos = [];

                for (var i = 0; i < gastosMensuales.length; i++) {
                    meses.push(gastosMensuales[i].mes.toString());
                    montosActivos.push(gastosMensuales[i].monto.toString());
                }

                var LINECHART = $('#chartUno');
                var myLineChart = new Chart(LINECHART, {
                    type: 'bar',
                    data: {
                        labels: meses,
                        datasets: [{
                            label: 'Gastos mensuales',
                            data: montosActivos,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            },
            error:function(){
                alert("Ocurrio un problema cargando la informción del servidor");
            }
        });
    });
</script>