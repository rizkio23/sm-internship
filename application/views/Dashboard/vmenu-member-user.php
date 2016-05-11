  <div class="page-wrapper">
    <div class="page-title dash">
      <h3>Member</h3>
    </div>

    <!-- BREADCRUMB -->
    <ol class="breadcrumb dash">
      <li><a href="#">Halaman Utama</a></li>
      <li class="active">Pengajuan PKL</li>
    </ol>

    <!-- BEGIN PORTLET -->
    <div class="row">
      <div class="col-md-7">
        <div class="portlet box blue">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-book"></i>Daftar Member
            </div>
          </div>

          <div class="portlet-body">
            <div class="table-toolbar">
              <div class="row">
                <div class="col-md-12">
                  <div class="btn-group">
                    <?php if($param): ?>
                    <div class="col-md-6">
                      <a href="<?=base_url()?>dashboard/member_form">
                        <button data-toggle="modal" href="#pengajuan" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Member</button>
                      </a>
                    </div>
                    <div class="col-md-6">
                      <a href="<?=base_url()?>p/member/pengajuan?ref=<?=password_hash('ajukanMagang', PASSWORD_BCRYPT)?>">
                        <button class="btn btn-primary" onclick="return confirm('Apakah anda yakin?\nData tidak dapat diubah setelah diajukan.\nPeriksa kembali data anda sebelum melanjutkan.');">PENGAJUAN</button>
                      </a>
                    </div>
                    <?php endif; ?>

                  </div>
                </div>
              </div>
            </div>

            <!-- BEGIN TABLE  -->
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th class="center">No</th>
                  <th class="center">Nama</th>
                  <th class="center">Nomer Induk</th>
                  <th class="center">Status</th>
                  <th class="center" width="175">Aksi</th>
                </tr>
              </thead>
                <?php $no = 1; foreach($data as $key): ?>
                <tr>
                  <td class="center"><?=$no++?></td>
                  <td class="center"><?=$key['nama']?></td>
                  <td class="center"><?=$key['no_induk']?></td>

                  <td class="center">
                  <?php
                  switch ($key['status']) {
                    case 1:
                        echo "<label class='label label-sm label-default'>Menunggu</label>";
                        break;
                    case 2:
                        echo "<label class='label label-sm label-success'>Menunggu</label>";
                        break;
                    case 3:
                        echo "<label class='label label-sm label-success'>Disetujui</label>";
                        break;
                    case 0:
                        echo "<label data-toggle='modal' href='#tolak' class='label label-sm label-danger'>Ditolak</label>";
                        break;
                    case -1:
                        echo "<label class='label label-sm label-default'>draft</label>";
                        break;
                    default:
                        echo "<label class='label label-sm label-danger'>ERROR</label>";
                        break;
                    }
                  ?>
                  </td>

                  <td class="center">

                  <?php if($key['status'] == 3): ?>
                  <a href="<?=base_url()?>dashboard/daftar_terima?id=<?=$key['id']?>" target="_blank">
                    <button href="" class="btn btn-primary"><i class="fa fa-file"></i></button>
                  </a>
                  <?php endif; ?>

                  <a href="<?=base_url()?>dashboard/member_form?id=<?=$key['id']?>&ref=<?=password_hash('editMember', PASSWORD_BCRYPT)?>">
                    <button href="" class="btn btn-primary"><i class="fa fa-info"></i></button>
                  </a>
                  <?php if($param): ?>
                  <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i></button>
                  <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <!-- END OF TABLE -->
            <!-- BEGIN MODAL -->
            <div id="tolak" class="modal fade" tabindex="-1" aria-hidden="true">
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
                    <div style="height:150px" data-always-visible="1" data-rail-visible="1">

                      <div class="form-body">
                          <div>Pesan Disini</div>
                      </div>
                    </div>
                  </div>
                  <!-- END OF MODAL BODY -->

                  <!-- BEGIN MODAL FOOTER -->
                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Tidak</button>
                    <input type="submit" class="btn btn-success" name="tb" class="btn btn-primary" value="Ya">
                  </div>
                  <!-- END OF MODAL FOOTER -->
                </form>
                <!-- ENF OF FORM -->
                </div>
              </div>
            </div>
            <!-- END MODAL -->
          </div>
        </div>
      </div>
      <!-- BEGIN PORTLET -->
      <div class="col-md-5">
        <div class="portlet box red">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-upload"></i>Proposal PKL
            </div>
          </div>
          <div class="portlet-body">
            <!-- BEGIN TABLE -->
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
                <tr>
                  <td><?=(!empty($berkas))?$berkas[0]['nama_berkas']:'Belum mengunggah'?></td>
                  <td><?=(!empty($berkas))?$berkas[0]['updated_date']:'Belum mengunggah'?></td>
                  <td>
                    <?php if(!empty($berkas)): ?>
                    <a href="<?=base_url()?>download/user/<?=$berkas[0]['file']?>?ref=<?=password_hash(date('dmYh'), PASSWORD_BCRYPT)?>">
                    <button class="btn btn-warning"><i class="fa fa-download"></i></button>
                    </a>
                  <?php endif; ?>
                  </td>
                </tr>
            </table>
            <!-- END OF TABLE -->
            <!-- BEGIN FORM -->

            <form action="<?=base_url()?>p/member/upload_proposal?ref=<?=password_hash('uploadProposal', PASSWORD_BCRYPT)?>"  method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" name="proposal" class="form-control">
                <p class="help-block">File type .pdf, max file 3 mb.</p>
              </div>
              <input type="submit" class="btn btn-success btn-block" name="tb_upload" value="Upload">
            </form>

            <!-- END OF FORM -->
          </div>
        </div>
      </div>
      <!-- END OF PORTLET -->
    </div>
  </div>
</div>
