<?php 

header("Access-Control-Allow-Origin: *");
?>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
 <style type = "text/css">
 /*** COLORS ***/
 @import url(https://fonts.googleapis.com/css?family=Open+Sans);


button.stop_button {
    background: red !important;
    
}
 .form-control-lg .form-control-borderless {
    border: none;
    
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;

}

#search {
    margin-top: 100px;
}
#data-load{
    border-bottom-left-radius: 30px !important;
border-top-left-radius: 30px !important;
}
element.style {
}
.input-group {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 100%;
}
.info h1 {
    font-size: 32px !important;
    line-height: 42px !important;
    color: #fff;
    font-weight: 600;
    text-align: center;
    text-shadow: 0px 2px rgba(0, 0, 0, 0.2);
}
#search-dashboard{
    background: linear-gradient(20deg, #25a1d7 20%, #218db3 100%) !important;
    /* min-height: 60vh; */
}
#load-btn{
    border-bottom-right-radius: 30px !important;
border-top-right-radius: 30px !important;
}
/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 30%;
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display:table;width:100%;height:100%;
}
.justify-content-center .info{
    text-align: center;
    font-size: 16px;
    line-height: 24px;
    color: #eee;
    font-weight: 400;
    padding-top : 10px;
}

.input-group-append {
    margin-left: -1px;
}
.btn-shadow.btn-shadow-primary {
    background: #f4871e;
    margin: 0px -8px 0px;
    min-width: 185px;
    color: #fff;
    display: inline-block;
    border-radius: 38px;
    font-size: 13px;
    font-weight: 800;
    margin: 0;
    border-radius: 0 38px 38px 0;
}
.input-group > .form-control {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.box {
    width: 500px;
    max-width: 90%;
    margin: 0 auto;
    padding: 3rem;
    display: block;
    border-radius: 1.5rem;
    background-color : rgba(34, 151, 198, 0);
   /* box-shadow: 0px 0px 15.84px 0.16px rgba(35, 31, 32, 0.1);*/
}

.meter {
    width: 188px;
    margin: 30px auto 0;
    position: relative;
}

.meter-hand {
    position: absolute;
    left: 50%;
    bottom: 6px;
    margin-left: -44px;
    z-index: 1;
    transition: all 2s ease-in-out;
    transform-origin: 94% 48%;
}

.speed {
    font-size: 3.2rem;
    font-weight: 700;
    line-height: 1;
}

#speed {
    min-width: 100px;
    display: inline-block;
}

.unit {
    font-size: 2rem;
    font-weight: 500;
    color: #bbe697;
}

.meter .num {
    font-size: 1rem;
    font-weight: 600;
    position: absolute;
}

#num_1 {
    left: 25px;
    top: 80px;
}

#num_2 {
    left: 37px;
    top: 56px;
}

#num_3 {
    left: 55px;
    top: 35px;
}

#num_4 {
    left: 87px;
    top: 25px;
}

#num_5 {
    right: 55px;
    top: 35px;
}

#num_6 {
    right: 37px;
    top: 56px;
}

#num_7 {
    right: 25px;
    top: 80px;
}


/* 
.input-group > .form-control:not(:last-child), .input-group > .custom-select:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.url.form-control {
    height: 52px;
    border-radius: 38px 0px 0px 38px;
    font-size: 16px;
    font-weight: 500;
    line-height: 34px;
   color: #aaa;
}
.border-radius{
  border-radius: 0 38px 38px 0;
  background: #f4871e;
    margin: 0px -8px 0px;
    min-width: 185px;
    color: #fff;
      font-size: 13px;
    font-weight: 800;
}
.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
} */
 </style>
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
    
    <div class="card"  id ="search-dashboard">
    <div class="box">
        <h2 class="mb-4 text-center">Speedometer</h2>
        <div class="meter position-relative">
            <img src="https://3.bp.blogspot.com/-Yo4A1PpnlqU/WwzvPaRfdRI/AAAAAAAAAsU/B9TOcrsmu_40LTL-JWHdzUNyeURz22FiACLcBGAs/s1600/meter-bg.png" alt="" class="img-fluid">
            <span class="num" id="num_1"></span>
            <span class="num" id="num_2"></span>
            <span class="num" id="num_3"></span>
            <span class="num" id="num_4"></span>
            <span class="num" id="num_5"></span>
            <span class="num" id="num_6"></span>
            <span class="num" id="num_7"></span>
            <img src="https://1.bp.blogspot.com/-46OIskSGdZc/WwzuFQ4Z24I/AAAAAAAAAsE/r-ElKrZKPNARDFGl5bY7-DHo7B-DSeJAgCLcBGAs/s1600/meter-hand.png" alt="" class="meter-hand" id="hand">
        </div>
        <div class="text-center mt-2">
            <div class="speed"><span id="speedtest"></span></div>
            <div class="unit">RPS</div>
        </div>
    </div>
	<div class="row justify-content-center" style = "min-height:400px;">
                        <div class="col-12 col-md-10 col-lg-8">
                            <div class = "info">
                                <h1>Distributed performance Testing, <p>apps and APIs faster</h1>
                                <p>
                           
                            </div>
                            <form class="card-body" id = "search">

                           
                            <div>
                                    <div class="card-body row no-gutters align-items-center">
                                        <div class = "row" style = "width:100%">
                                        <div class = "col-7 col-md-5 col-lg-10">
                                            <div class="input-group input-group-lg">
                                                <input type="text"  id = "data-load" style="height:70px;" class="form-control form-control-lg form-control-borderless">
                                                
                                            </div>
                                        </div>
                                        <!-- <div class = "col-3 col-md-3 col-lg-3">
                                            <div class="input-group input-group-lg" style="margin-left:-10px;">
                                            <button type="button" class="btn btn-warning input-group-lg dropdown-toggle"  style="height:70px;" data-toggle="dropdown">
                                            Action
                                            </button>
                                            <ul class="dropdown-menu">
                                            <li class="dropdown-item"><a href="#">Action</a></li>
                                            <li class="dropdown-item"><a href="#">Another action</a></li>
                                            <li class="dropdown-item"><a href="#">Something else here</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li class="dropdown-item"><a href="#">Separated link</a></li>
                                            </ul>
                                            </div>
                                        </div> -->
                                        <div class = "col-2 col-md-2 col-lg-2">
                                            <div class="input-group input-group-lg" style="margin-left:-20px;">
                                                
                                                <span class="input-group-append">
                                                <!-- <button class="btn btn-lg btn-success" id = "load-btn" type="button">Start Clock</button> -->
                                                <input type="button"   style="height:70px;" class="btn btn-lg btn-success" id = "load-btn"   value="Start Load Test"/> 
                                                </span>
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

