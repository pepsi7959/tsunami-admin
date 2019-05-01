  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Dashboard</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 id="numOfSDevices"><?php echo $data['numOfS']; ?></h3>

                        <p>S-Series</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa fa-plug"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="numOfMDevices"><?php echo $data['numOfM']; ?></h3>

                        <p>M-Series</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa fa-plug"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="numOfUsers"><?php echo $data['numOfUsers']; ?></h3>
                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-users"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="numOfTransactions"><?php echo $data['numOfTransactions']; ?></h3>
                        <p>Transactions</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
        </div>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->

    <!-- Sale Dashboard -->
    <section class="content">
        <div class="row">

            <!-- right col -->
            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="card bg-warning-gradient" style="position: relative; left: 0px; top: 0px;">
                <div class="card-header no-border ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                    <i class="fa fa-th mr-1"></i>
                    S-Series Sales
                    </h3>
                    <div class="card-tools">
                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-info btn-sm" data-widget="remove">
                        <i class="fa fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart" id="line-chart" style="height: 250px;">
                    <script src="<?php echo base_url()."assets" ?>/highcharts/code/highcharts.js"></script>
                    <script src="<?php echo base_url()."assets" ?>/highcharts/code/modules/series-label.js"></script>
                    <script src="<?php echo base_url()."assets" ?>/highcharts/code/modules/exporting.js"></script>
                    <script src="<?php echo base_url()."assets" ?>/highcharts/code/modules/export-data.js"></script>
                    <!-- <script type="text/javascript">
                        var colors = ['#48535e', '#ffdd00', '#fdb813', '#f17022', '#48535e', '#f15c80'];
                        Highcharts.chart('line-chart', {
                            colors: colors,
                            chart: {
                                backgroundColor:'none' 
                            },
                            title: {
                                text: ''
                            },

                            subtitle: {
                                text: ''
                            },

                            yAxis: {
                                title: {
                                    text: 'Number of S-Series'
                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    label: {
                                        connectorAllowed: false
                                    },
                                    pointStart: 2018
                                }
                            },
                            backgroundColor: null,
                            series: [{
                                name: 'S-Series',
                                data: [0, 5]
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            },

                            credits: {
                                enabled: false
                            },

                            exporting: { enabled: false }
                        });
                        </script> -->
                        </div>
                    </div>
                <!-- /.card-body -->
                </div>
            </section>
            <!-- right col -->

            <!-- Left col -->
            <section class="col-lg-6 connectedSortable ui-sortable">
            <div class="card bg-success-gradient" style="position: relative; left: 0px; top: 0px;">
                <div class="card-header no-border ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                    <i class="fa fa-th mr-1"></i>
                    M-Series Sales
                    </h3>
                    <div class="card-tools">
                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-info btn-sm" data-widget="remove">
                        <i class="fa fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart" id="m-series-line-chart" style="height: 250px;"/>
                    <!-- <script type="text/javascript">
                        var colors = ['#ffffff', '#ffdd00', '#fdb813', '#f17022', '#48535e', '#f15c80'];
                        Highcharts.chart('m-series-line-chart', {
                            colors: colors,
                            chart: {
                                backgroundColor:'none' 
                            },
                            title: {
                                text: ''
                            },

                            subtitle: {
                                text: ''
                            },

                            yAxis: {
                                title: {
                                    text: 'Number of M-Series'
                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    label: {
                                        connectorAllowed: false
                                    },
                                    pointStart: 2018
                                }
                            },
                            backgroundColor: null,
                            series: [{
                                name: 'M-Series',
                                data: [4, 5]
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            },

                            credits: {
                                enabled: false
                            },

                            exporting: { enabled: false },

                        });
                    </script> -->
                <!-- /.card-body -->
                </div>
            </section>
            <!-- Left col -->

        </div>
        <!-- Row -->
    </section>
    <!-- Sale Dashboard -->
  </div>  
  <!-- /.content-wrapper -->

