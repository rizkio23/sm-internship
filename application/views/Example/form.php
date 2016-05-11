  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">

    <!-- BEGIN PAGE TITLE -->
    <div class="page-title dash">
      <h3>Profil</h3>
    </div> 
    <!-- END OF PAGE TITLE -->

    <!-- BEGIN BREADCRUMB -->
    <ol class="breadcrumb dash">
      <li><a href="#">Home</a></li>
      <li class="active">Profil User</li>
    </ol>
    <!-- END OF BREADCRUMB -->

    <div class="row">
      <!-- BEGIN PORTLET -->
      <div class="col-md-12">
        <div class="portlet box red">
          <!-- PORTLET TITLE -->
          <div class="portlet-title">
            <div class="caption">
              <i class=""></i>Titel
            </div>
          </div>
          <!-- END PORTLET TITLE -->
          <!-- PORTLET BODY -->
          <div class="portlet-body form">
            <!-- BEGIN FORM -->
            <form class="form-horizontal" role="form">
              <div class="form-body">
              <!-- Input Text -->
                <div class="form-group">
                  <label class="col-md-2 control-label">Input</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="nip" placeholder="NIP">
                    <!-- Name dicocokkan database -->
                  </div>
                </div>

              <!-- Dropdown  -->
                <div class="form-group">
                  <label class="col-md-2 control-label">Dropdown</label>
                  <div class="col-md-3">
                    <select class="form-control" name="unit">
                    <!-- Name dicocokkan database -->
                      <option></option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Textarea</label>
                  <div class="col-md-4">
                    <textarea class="form-control dash" name="alamat" ></textarea>
                    <!-- Name dicocokkan database -->
                  </div>
                </div>                  

                <div class="form-group">
                  <label class="col-md-2 control-label">Captcha</label>
                  <div class="col-md-4">
                    <!-- <?php echo $captcha['image']; ?> -->
                    <br>
                    <input type="text" class="form-control dash" name="captcha" placeholder='Captcha'>
                  </div>
                </div>  
                
                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-offset-2 col-md-9">
                      <button type="submit" class="btn btn-primary">Tambah</button>
                      <button type="button" class="btn btn-danger">Batal</button>
                    </div>
                  </div>
                </div>

            </form>
            <!-- END FORM -->
          </div>  
          <!-- END PORTLET BODY -->
        </div>  
      </div>     
      <!-- END OF PORTLET -->
    </div>
    <!-- END OF ROW -->
  </div>  
  <!-- END OF CONTENT -->
</div>  
<!-- END OF PAGE -->