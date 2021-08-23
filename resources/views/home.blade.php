@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Dashboard',
'activePage' => 'home',
'activeNav' => '',
])

@section('content')
<div class="panel-header panel-header-lg">
  <canvas id="bigDashboardChart"></canvas>
</div>
<div class="content">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row justify-content-center">

            <div class="col-md-3">
              <div class="statistics">
                <div class="info">
                  <div class="icon icon-info">
                    <i class="now-ui-icons users_single-02"></i>
                  </div>
                  <h3 class="info-title">{{count($users)}}</h3>
                  <h6 class="stats-title">{{ __('Cadastros') }}</h6>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</div>
@endsection


@push('js')
<script language="javascript">
  $(document).ready(function() {

    chart();
  })


  function chart() {
    <?php $js_array = json_encode($chartDatas) ?>
    var chart = <?php print_r($js_array) ?>;

    var count = chart
    var myHistory = [];

    for (var i = 0; i < count.length; i++) {
      var listItem = document.createElement('li');
      myHistory[i] = count[i]['count'];
     
    }
    


    chartColor = "#FFFFFF";

    // General configuration for the charts with Line gradientStroke
    gradientChartOptionsConfiguration = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      tooltips: {
        bodySpacing: 4,
        mode: "nearest",
        intersect: 0,
        position: "nearest",
        xPadding: 10,
        yPadding: 10,
        caretPadding: 10
      },
      responsive: 1,
      scales: {
        yAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }],
        xAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }]
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 15,
          bottom: 15
        }
      }
    };

    ctx = document.getElementById('bigDashboardChart').getContext("2d");

    gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, chartColor);

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");
console.log(myHistory[0])


    myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
          label: "Active Users",
          borderColor: "#f96332",
          pointBorderColor: "#FFF",
          pointBackgroundColor: "#f96332",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          backgroundColor: gradientFill,
          borderWidth: 2,
          data: [myHistory[0],myHistory[1],myHistory[2],myHistory[3],myHistory[4],myHistory[5],myHistory[6],myHistory[7],myHistory[8],myHistory[9],myHistory[10],myHistory[11],myHistory[12]]
        }]
      },
      options: gradientChartOptionsConfiguration
    });
  }
</script>
@endpush