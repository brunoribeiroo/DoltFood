@extends('layout/principal')

@section('conteudo')

<h2> Relatórios </h2>
<div class="chart-container" style="float: left; height:10vh; width:40vw;">
<h2> Pedidos realizados por funcionários no mês</h2>
<canvas id="pie-chart" width="800" height="450"></canvas>
</div>
<script type="text/javascript">


new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Bruno", "Renato", "Rafael", "Luiz Felipe", "Valentino"],
      datasets: [{
        label: "Pedidos X funcionários (mês)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [5267,2478,734,784,433]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Pedidos realizados por funcionários no mês'
      }
    }
});
</script>
<div class="barchar-container" style="float: right; margin-right: 150px">
<h2> Lanches mais vendidos</h2>
<canvas id="bar" width="400" height="400"></canvas>
</div>


<script type="text/javascript">
	
var ctx = document.getElementById("bar");
var bar = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["X-Burguer", "X-egg", "X-Salada", "Refrigerante", "Açai"],
    datasets: [{
      label: 'Lanches',
      data: [200, 140, 200, 190, 110, 90],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(75, 192, 192, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(75, 192, 192, 0.2)'
      ],
      borderWidth: 2
    }]
  },
  options: {

    title: {
        display: true,
        text: 'Lanches mais vendidos no mês'
      }
  }
});
</script>

<div style="float: left; margin-top: 500px; margin-left: 150px">
<h2> Ciclo de vida dos lanches</h2>
<canvas id="line" width="400" height="400"></canvas>
</div>

<script type="text/javascript">
var ctx2 = document.getElementById('line').getContext("2d");

var line = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ["JAN", "FEV", "MAR", "ABR", "MAI", "JUN", "JUL", "AGO", "SET","OUT", "NOV", "DEZ"],
        datasets: [{
            label: "X-Egg",
            borderColor: "#80b6f4",
            pointBorderColor: "#80b6f4",
            pointBackgroundColor: "#80b6f4",
            pointHoverBackgroundColor: "#80b6f4",
            pointHoverBorderColor: "#80b6f4",
            pointBorderWidth: 10,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: false,
            borderWidth: 4,
            data: [100, 120, 150, 170, 180, 170, 160,150,180,190,130,140]
        },
        {
            label: "X-Salada",
            borderColor: "#3e95cd",
            pointBorderColor: "#3e95cd",
            pointBackgroundColor: "#3e95cd",
            pointHoverBackgroundColor: "#3e95cd",
            pointHoverBorderColor: "#3e95cd",
            pointBorderWidth: 10,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: false,
            borderWidth: 4,
            data: [90, 100, 120, 150, 190, 160, 180, 170, 130, 140, 180, 200]
        },
        {
            label: "X-Burguer",
            borderColor: "#c45850",
            pointBorderColor: "#c45850",
            pointBackgroundColor: "#c45850",
            pointHoverBackgroundColor: "#c45850",
            pointHoverBorderColor: "#c45850",
            pointBorderWidth: 10,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: false,
            borderWidth: 4,
            data: [100, 120, 140, 150, 170, 190, 200, 210, 210, 200, 190, 200]
        },
        {
            label: "Refrigerante",
            borderColor: "#3cba9f",
            pointBorderColor: "#3cba9f",
            pointBackgroundColor: "#3cba9f",
            pointHoverBackgroundColor: "#3cba9f",
            pointHoverBorderColor: "#3cba9f",
            pointBorderWidth: 10,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: false,
            borderWidth: 4,
            data: [120, 130, 140, 150, 170, 190, 185, 175, 195, 180, 180, 190]
        },
        {
            label: "Açai",
            borderColor: "#8e5ea2",
            pointBorderColor: "#8e5ea2",
            pointBackgroundColor: "#8e5ea2",
            pointHoverBackgroundColor: "#8e5ea2",
            pointHoverBorderColor: "#8e5ea2",
            pointBorderWidth: 10,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: false,
            borderWidth: 4,
            data: [90, 100, 80, 70, 80, 90, 80, 70, 100, 110, 120, 110]
        },],

    },
    options: {
        title: {
            display: true,
            text: 'Ciclo de vida dos lanches'
        },
        legend: {
            position: "top"
        },
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold",
                    beginAtZero: true,
                    maxTicksLimit: 5,
                    padding: 20
                },
                gridLines: {
                    drawTicks: false,
                    display: false
                }

            }],
            xAxes: [{
                gridLines: {
                    zeroLineColor: "transparent"
                },
                ticks: {
                    padding: 20,
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold"
                }
            }]
        }
    }
});
</script>

@stop
