
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">

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
                                        <div class = "col-2 col-md-2 col-lg-2">
                                        <div class="input-group input-group-lg type-loadtest">
                                        <select class="selectpicker" id = "type" width = "100%">
                                            <option value = "get">GET</option>
                                            <option value = "post">POST</option>
                                          
                                        </select>

                                        </div>
                                        </div>
                                        <div class = "col-8 col-md-6 col-lg-8">
                                            <div class="input-group input-group-lg"  style="margin-left:-15px;">
                                                <input type="text"  id = "data-load" style="height:60px;" class="form-control form-control-lg form-control-borderless">
                                                
                                            </div>
                                        </div>
                                       
                                        <div class = "col-2 col-md-2 col-lg-2">
                                            <div class="input-group input-group-lg" style="margin-left:-30px;">
                                                
                                                <span class="input-group-append">
                                                <!-- <button class="btn btn-lg btn-success" id = "load-btn" type="button">Start Clock</button> -->
                                                <input type="button"   style="height:60px;" class="btn btn-lg btn-success" id = "load-btn"   value="Start Load Test"/> 
                                                </span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-body row no-gutters align-items-center">
                                    <div class="row" id = "advance">
                                        <div class="col-xs-12 ">
                                            <nav>
                                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Header</a>
                                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Body</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                                                </div>
                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                                                </div>
                                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                                                </div>
                                                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
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

