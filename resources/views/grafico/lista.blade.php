@extends('layout/principal')

@section('conteudo')

<div class="chart-container" style="float: left; height:10vh; width:40vw">
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
<div class="barchar-container" style="float: right; ">
<canvas id="myChart" width="400" height="400"></canvas>
</div>


<script type="text/javascript">
	
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["X-Burguer", "X-egg", "X-Salada", "Refrigerante", "Açai"],
    datasets: [{
      label: 'Quantidade vendida',
      data: [12, 19, 3, 5, 2],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    responsive: false,
    scales: {
      xAxes: [{
        ticks: {
          maxRotation: 90,
          minRotation: 80
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});

</script>

@stop
