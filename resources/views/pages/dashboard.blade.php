@include('component.header')
@include('component.sidebar')

<div class="content-wrapper" style="height: max-content !important; max-height: max-content !important; min-height: calc(100vh - calc(3.5rem + 1px) - calc(3.5rem + 1px)) !important;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <a class="col-12 col-sm-6 col-md-4" style="cursor:pointer; color: black;" href="./main-index.html">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-briefcase"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Products</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
          <!-- /.col -->
          <a class="col-12 col-sm-6 col-md-4" style="cursor:pointer; color: black;" href="./main-index.html">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-print"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Label Printing</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <a class="col-12 col-sm-6 col-md-4" style="cursor:pointer; color: black;" href="./main-index.html">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-network-wired"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Categories</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-7">
            <div class="card p-2" id="bar">
                <h5 class="pl-3 pt-2">Top 5 contendors</h5>
              <div id="chart"></div>
              <script>
                  var options = {
                    series: [{
                    data: [44, 55, 41, 64, 22, 43, 21]
                  }, {
                    data: [53, 32, 33, 52, 13, 44, 32]
                  }],
                    chart: {
                    type: 'bar',
                    height: 430
                  },
                  plotOptions: {
                    bar: {
                      horizontal: false,
                      dataLabels: {
                        position: 'top',
                      },
                    }
                  },
                  dataLabels: {
                    enabled: true,
                    offsetX: 0,
                    offsetY: -15,
                    style: {
                      fontSize: '12px',
                      colors: ['#000000']
                    }
                  },
                  stroke: {
                    show: true,
                    width: 1,
                    colors: ['#fff']
                  },
                  tooltip: {
                    shared: true,
                    intersect: false
                  },
                  xaxis: {
                    categories: [2001, 2002, 2003, 2004, 2005, 2006, 2007],
                  },
                  };
                  var chart = new ApexCharts(document.querySelector("#chart"), options);
                  chart.render();
              </script>
            </div>
          </div>
          <div class="col-12 col-md-5">
            <div class="card p-2" id="pie">
                <h5 class="pl-3 pt-2">Top 5 contendors</h5>
                <div id="chart2" ></div>
                <script>
                    var options = {
                      series: [44, 55, 13, 43, 22],
                      chart: {
                        toolbar: {
                          show: true,
                          tools: {
                              download: true,
                            },
                        },
                      width: '100%',
                      type: 'donut',
                    },
                    dataLabels: {
                      enabled: true,
                    },
                    fill: {
                      type: 'gradient',
                    },
                    legend: {
                      position: 'bottom'
                    },
                    labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
                    responsive: [{
                      breakpoint: 480,
                        options: {
                          chart: {
                            width: '80%'
                          },
                        }
                    }]
                    };
                    var chart = new ApexCharts(document.querySelector("#chart2"), options);
                    chart.render();

                    let bar = document.getElementById('bar').clientHeight;
                    bar = parseFloat(bar).toFixed(2);
                    console.log(bar);
                    document.getElementById('pie').setAttribute("style",`height:${bar}px`);
                </script>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h5>Table For Dimak</h5>
              </div>
              <div class="card-body ">
                <table class="table table-bordered table-hover">
                  <thead class="table-active">
                    <tr>
                      <td>Dimak0</td>
                      <td>Dimak01</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>01</td>
                      <td>02</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td>Dimak0</td>
                      <td>Dimak01</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>


@include("component.footer");


 