
var y1 = $('#y-1').text();
var y2 = $('#y-2').text();
var y3 = $('#y-3').text();
var y4 = $('#y-4').text();
var y5 = $('#y-5').text();
var y6 = $('#y-6').text();

var c1 = $('#c-1').text();
var c2 = $('#c-2').text();
var c3 = $('#c-3').text();
var c4 = $('#c-4').text();
var c5 = $('#c-5').text();
var c6 = $('#c-6').text();

$('.line-chart-data').hide();

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [y6, y5, y4, y3, y2, y1],
    datasets: [{
      label: 'Jumlah',
      data: [c6, c5, c4, c3, c2, c1],
      borderWidth: 2,
      backgroundColor: 'rgba(72, 126, 176,.1)',
      borderColor: '#487eb0',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 4
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 50
        }
      }],
      xAxes: [{
        ticks: {
          display: false
        },
        gridLines: {
          display: false
        }
      }]
    },
  }
});

var sifat1 = $('#sifat-1').text();
var sifat2 = $('#sifat-2').text();
var sifat3 = $('#sifat-3').text();
var sifat4 = $('#sifat-4').text();

var c21 = $('#c_2-1').text();
var c22 = $('#c_2-2').text();
var c23 = $('#c_2-3').text();
var c24 = $('#c_2-4').text();

var ctx = document.getElementById("myChart4").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [
        c21,
        c22,
        c23,
        c24,
      ],
      backgroundColor: [
        '#487eb0',
        '#e84118',
        '#44bd32',
        '#7f8fa6',
      ],
      label: 'Dataset 1'
    }],
    labels: [
      sifat1,
      sifat2,
      sifat3,
      sifat4,
    ],
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});