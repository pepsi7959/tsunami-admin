
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">

 <!-- Content Wrapper. Contains page content -->


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title;?></h1>
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
    
    <div class="card"  id ="search-dashboard">
    <div class="box">
        
        <div class="meter position-relative">
            <img src="<?php echo base_url("assets/img/meter-bg.png");?>" alt="" class="img-fluid">
            <span class="num" id="num_1"></span>
            <span class="num" id="num_2"></span>
            <span class="num" id="num_3"></span>
            <span class="num" id="num_4"></span>
            <span class="num" id="num_5"></span>
            <span class="num" id="num_6"></span>
            <span class="num" id="num_7"></span>
            <img src="<?php echo base_url("assets/img/meter-hand.png");?>" alt="" class="meter-hand" id="hand">
        </div>
        <div class="text-center mt-2">
            <div class="speed"><span id="speedtest"></span></div>
            <div class="unit">RPS</div>
        </div>



        
    </div>

    <div class="card-body">
           
  </div>
	<div class="row justify-content-center" style = "min-height:400px;">
                        <div class="col-12 col-md-10 col-lg-8">
                            <div class = "info">
                                <h1>Distributed performance Testing, <p>apps and APIs faster</h1>
                                <p>
                           
                            </div>
                            <form class="card-body" id = "search">

                            <input type='hidden' id="ipshooting" value="<?php echo $ip; ?>" />
                            <div>
                                    <div class="card-body row no-gutters align-items-center">
                                        <div class = "row" style = "width:100%">
                                        <div class = "col-2 col-md-2 col-lg-2" style="padding:0px">
                                        <div class="input-group input-group-lg type-loadtest" >
                                        <select class="selectpicker" id = "type" width = "100%" >
                                            <option value = "GET">GET</option>
                                            <option value = "POST">POST</option>
                                        
                                        </select>

                                        </div>
                                        </div>
                                        <div class = "col-6 col-md-6 col-lg-6" style="padding:0px">
                                            <div class="input-group input-group-lg"  style="height: 100%;">
                                                <input type="text"  id = "data-load" class="form-control form-control-lg form-control-borderless">
                                                
                                            </div>
                                        </div>
                                        <div class = "col-2 col-md-2 col-lg-2" style="padding:0px">
                                            <div class="input-group input-group-lg"   style="height: 100%;">
                                                <input type="text"  id = "data-concerrence" class="form-control form-control-lg form-control-borderless" placeholder = "concerrence">
                                                
                                            </div>
                                        </div>
                                        <div class = "col-2 col-md-2 col-lg-2" style="padding:0px">
                                            <div class="input-group input-group-lg" style="height: 100%;">
                                                <span class="input-group-append" style="width:100%">
                                                <input type="button"  class="btn btn-lg btn-success" style="width: inherit" id = "load-btn"   value="Start"/> 
                                                </span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-body row no-gutters align-items-center">
                                    <div class="row" id = "advance"  style =  "widht:1000px;">
                                        <div class="col-lg-12 "  style =  "widht:1000px;">
                                            <nav>
                                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Header</a>
                                                    <a class="nav-item nav-link" id="nav-body-tab" data-toggle="tab" href="#nav-body" role="tab" aria-controls="nav-body" aria-selected="false">Body</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <textarea class="form-control" id = "header" style="resize: both;" rows="5" placeholder = "{'Content-Type': 'x-www-form-urlencoded'}"></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="nav-body" role="tabpanel" aria-labelledby="nav-body-tab" >
                                                <textarea class="form-control" id = "body" style="resize: both;" rows="5" ></textarea>
                                            </div>
                                                
                                            </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                            </div>
                            
                            
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
    </div>
        
      
  
    </section>
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
                
              
        </div>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
    
  </div>  
  <!-- /.content-wrapper -->

