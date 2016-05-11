              <button data-toggle="modal" href="#responsive">MODAL</button>

              <!-- BEGIN MODAL -->
              <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                      <h4 class="modal-title"><span><i class="fa fa-plus"></i></span> Tambah Menu</h4>
                    </div>
                  <!-- BEGIN FORM  -->
                  <form action="" role="form" method="POST">        

                  <!-- BEGIN MODAL BODY -->
                    <div class="modal-body">
                      <div style="height:350px" data-always-visible="1" data-rail-visible="1">

                        <div class="form-body">

                          <div class="form-group">
                            <label>Menu</label>
                              <input type="text" class="form-control" style="text-alignment:center" name="menu" placeholder="Menu" >
                          </div>

                          <div class="form-group">
                            <label>Link</label>
                              <input type="text" class="form-control" name="nama" placeholder="Link" required>
                          </div>  

                          <div class="form-group">
                            <label>Deskripsi</label>
                              <textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" rows="2" required></textarea>
                          </div>   

                          <div class="form-group">
                            <label>Tampil Di Sidebar</label>
                            <div style="padding: 6px 16px;">  
                              <label class="checkbox-inline"><input type="checkbox" value="option1"> Ya</label>
                              <label class="checkbox-inline"><input type="checkbox" value="option1"> Tidak</label>
                            </div>
                          </div>                                
                        </div>

                      </div>
                    </div>  
                    <!-- END OF MODAL BODY -->
                    
                    <!-- BEGIN MODAL FOOTER -->
                    <div class="modal-footer">
                      <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                      <input type="submit" class="btn btn-success" name="tb" class="btn btn-primary" value="add">
                    </div>
                    <!-- END OF MODAL FOOTER -->
                  </form> 
                  <!-- ENF OF FORM -->
                  </div>
                </div>
              </div>
              <!-- END MODAL -->            