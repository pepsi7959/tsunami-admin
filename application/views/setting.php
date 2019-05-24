
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1><?php echo $section ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo $title ?></a></li>
              <li class="breadcrumb-item active"><?php echo $section ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Config Form</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <div class="col-md-6">
          <form method="post" id="" class="form-horizontal" >
             <div class="form-group">

              
                  <label>Multiple</label>
                  <!-- <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                          style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select> -->
                </div>
              <div class = "form-group">
              <input type="text" class="form-control" id="tokenfield" value="<?php echo $listIP; ?>" />
              </div>
              <input type="button" id = "submit" value = "Submit" class="btn btn-primary">
            </form>
            </div>
          </div>
         <!-- /.card-body -->
        </div>
        </div>
    </section>
</div>

