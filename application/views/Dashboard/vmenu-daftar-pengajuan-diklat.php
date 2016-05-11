  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">

    <!-- BEGIN PAGE TITLE -->
    <div class="page-title dash">
      <h3>Daftar Pengajuan</h3>
    </div>
    <!-- END OF PAGE TITLE -->

    <!-- BEGIN BREADCRUMB -->
    <ol class="breadcrumb dash">
      <li><a href="<?php echo base_url().'dashboard/insight';?>">Halaman Utama</a></li>
      <li class="active">Daftar Pengajuan Unit Kerja</li>
    </ol>
    <!-- END OF BREADCRUMB -->

    <div class="row">
      <!-- BEGIN PORTLET -->
      <div class="col-md-12">
        <div class="portlet box blue">
          <!-- PORTLET TITLE -->
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-th-list"></i>Daftar Pengajuan Unit Kerja
            </div>
          </div>
          <div class="portlet-body">
            <div class="table-toolbar">
              <div class="row">
                <div class="col-md-8" >
                  <div class="filter-table">
                    <label class="control-label">Total:</label>
                    <input type="text" style="width:100px;border-radius:4px;padding-left:10px" class="filter-status"  placeholder="50" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="pull-right">
                    <span class="badge badge-danger">1</span>
                    <a href="<?php echo base_url().'dashboard/detail_pengajuan_unit';?>"><button class="btn btn-danger"><i class="fa fa-th-list"></i> Ajukan</button></a>
                    <button id="tg" class="btn btn-success"><i class="fa fa-eye"></i> View</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- BEGIN TABLE -->
            <table class="table table-striped table-bordered table-hover" id="berkas">
              <thead>
                <tr>
                  <th class="center">No</th>
                  <th width="150px" class="shows" id="hide-table">Nomer Induk</th>
                  <th width="50px" class="center">ID Member</th>
                  <th class="center">Nama</th>
                  <th class="center">SMK/Mahasiswa</th>
                  <th class="center">Instansi</th>
                  <th class="shows" id="hide-table">Hak Akses</th>
                  <th class="shows" id="hide-table">Bidang</th>
                  <th class="shows" id="hide-table">Tujuan</th>
                  <th class="shows" id="hide-table">Proposal</th>
                  <th width="200" class="center">Unit Kerja</th>
                  <th class="center">Pembimbing</th>
                  <th class="center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($data as $key): ?>

                <tr id="data<?=$no?>">
                  <td class="center"><?=$no?></td>
                  <td class="shows" id="hide-table"><?=$key['no_induk']?></td>
                  <td class="center"><input type="text" style="font-size:14px;width:100px" class="filter-status-sm" id="id_member<?=$no?>" name="id_member" value='<?=$key['id']?>' readonly></td>
                  <td class="center"><a href="<?=base_url()?>dashboard/info_member?id=<?=$key['id']?>" target="_blank"><?=$key['nama']?></a></td>
                  <td class="center"><?=($key['jenis']=='smk')?'Siswa':'Mahasiswa' ?></td>
                  <td class="center"><?=$key['instansi']?></td>
                  <td class="shows" id="hide-table">Hak Akses</td>
                  <td class="shows" id="hide-table"><?=$key['bagian']?></td>
                  <td class="shows" id="hide-table"><?=$key['tujuan']?></td>
                  <td class="shows" id="hide-table">Proposal</td>
                    <td class="center">
                      <select class="form-control" name="unit_kerja" id="unit<?=$no?>" onchange="ambil('<?=$no?>')">
                        <option value="">Pilih Unit Kerja</option>
                        <?php foreach ($unit_kerja as $unit):?>
                          <option value="<?=$unit['id']?>"><?=ucwords(strtolower($unit['deskripsi']))?></option>
                      <?php endforeach; ?>
                      </select>
                    </td>
                    <td class="center">
                      <select class="form-control" name="pembina" id="pembina<?=$no?>"></select>
                    </td>
                  <td class="center">
                    <button class="btn btn-success" onclick="simpan('<?=$no?>')">Simpan</button>
                  </td>
                </tr>
              <?php $no++; endforeach; ?>
            </tbody>
          </table>
          <!-- END OF TABLE -->
        </div>
      </div>
      <!-- END PORTLET TITLE -->
    </div>
    <!-- END OF PORTLET -->
    <!-- BEGIN PORTLET -->
      <div class="col-md-12">
        <div class="portlet box red-thunderbird">
          <!-- PORTLET TITLE -->
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-lg fa-times-circle"></i>Revisi Penolakan Unit Kerja
            </div>
          </div>
          <!-- END PORTLET TITLE -->
          <!-- PORTLET BODY -->
          <div class="portlet-body">
            <!-- TABLE TOOLBAR -->
            <div class="table-toolbar">
              <div class="row">
              <div class="col-md-8" >
                <div class="filter-table">
                  <label class="control-label">Total:</label>
                  <input type="text" style="width:100px;border-radius:4px;padding-left:10px" class="filter-status"  placeholder="50" readonly>
                </div>
              </div>
              </div>
            </div>
            <!-- END TABLE TOOLBAR -->
            <!-- BEGIN TABLE -->
              <table class="table table-striped table-bordered table-hover" id="setujuUK">
                <thead>
                  <tr>
                    <th class="center">No</th>
                    <th width="50px" class="center">ID Member</th>
                    <th class="center">Nama</th>
                    <th class="center">Instansi</th>
                    <th class="center">Ditolak Dari</th>
                    <th class="center">Alasan Penolakan</th>
                    <th width="200" class="center">Unit Kerja</th>
                    <th class="center">Pembimbing</th>
                    <th class="center" width="150">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($revisi as $key): ?>

                  <tr id="data<?=$no?>">
                    <td class="center"><?=$no?></td>
                    <td class="center"><input type="text" style="font-size:14px;width:100px" class="filter-status-sm" id="id_member<?=$no?>" name="id_member" value='<?=$key['id']?>' readonly></td>
                    <td class="center"><a href="<?=base_url()?>dashboard/info_member?id=<?=$key['id']?>" style="color:#F57869" target="_blank"><?=$key['nama']?></a></td>
                    <td class="center"><?=$key['instansi']?></td>
                    <td class="center"><?=$key['deskripsi']?></td>
                    <td class="center">
                      <?php $alasan = $key['alasan']; ?>
                      <button data-toggle="modal" href="#alasan" onclick="show_alasan('<?=$alasan?>')" class="btn btn-primary">Lihat</button>
                    </td>
                    <td class="center">
                      <select class="form-control" name="unit_kerja" id="unit<?=$no?>" onchange="ambil('<?=$no?>')">
                        <option value="">Pilih Unit Kerja</option>
                        <?php foreach ($unit_kerja as $key):?>
                          <option value="<?=$key['id']?>"><?=ucwords(strtolower($key['deskripsi']))?></option>
                      <?php endforeach; ?>
                      </select>
                    </td>
                    <td class="center">
                      <select class="form-control" name="pembina" id="pembina<?=$no?>"></select>
                    </td>
                    <td class="center" width="160px"><button class="btn btn-xs green-jungle" onclick="simpan('<?=$no?>')">ajukan</button>
                    <button data-toggle="modal" class="btn btn-xs red-thunderbird" onclick="muncul(<?=$no?>)">tolak final</button></td>
                  </tr>
                <?php $no++; endforeach; ?>
              </tbody>
            </table>
            <!-- END OF TABLE -->

            <!-- BEGIN MODAL -->
            <div id="alternatif" class="modal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><span><i class="fa fa-send "></i></span> Penolakan Final</h4>
                  </div>
                <!-- BEGIN FORM  -->
                <form action="<?php echo base_url().'p/member/alternatif';?>" role="form" method="POST">
                <!-- BEGIN MODAL BODY -->
                  <div class="modal-body">
                    <div style="height:300px" data-always-visible="1" data-rail-visible="1">

                      <div class="form-body">

                        <div class="form-group">
                          <label>ID Member</label>
                            <input type="text" class="form-control login-input" style="text-alignment:center" name="id_mem" readonly>
                        </div>

                        <div class="form-group">
                          <label>Tanggal</label>
                            <input type="text" id="datepicker" class="form-control" name="tanggal" required>
                        </div>

                        <div class="form-group">
                          <label>Alasan</label>
                            <textarea type="text" class="form-control" name="alasan_penolakan" rows="2" required></textarea>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- END OF MODAL BODY -->

                  <!-- BEGIN MODAL FOOTER -->
                  <div class="modal-footer">
                    <button type="button" data-toggle="modal" href="#alternatif" class="btn btn-default">Batal</button>
                    <input type="submit" class="btn btn-success" name="tb" class="btn btn-primary" value="Ajukan">
                  </div>
                  <!-- END OF MODAL FOOTER -->
                </form>
                <!-- ENF OF FORM -->
                </div>
              </div>
            </div>
            <!-- END MODAL -->

            <!-- BEGIN MODAL ALASAN -->
            <div id="alasan" class="modal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><span><i class="fa fa-info"></i></span> Alasan</h4>
                  </div>
                <!-- BEGIN FORM  -->
                <!-- BEGIN MODAL BODY -->
                  <div class="modal-body">
                    <div style="height:250px" data-always-visible="1" data-rail-visible="1">
                      <div class="form-body">
                        <div class="form-group">
                            <!-- <textarea class="form-control" id="alasan" rows="5" readonly>lol</textarea> -->
                            <h4 id="alasan_text"></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- END OF MODAL BODY -->
                  <!-- BEGIN MODAL FOOTER -->
                  <div class="modal-footer">
                    <button type="button" data-toggle="modal" data-dismiss="modal" href="" class="btn btn-danger">Keluar</button>
                  </div>
                  <!-- END OF MODAL FOOTER -->
                <!-- ENF OF FORM -->
                </div>
              </div>
            </div>
            <!-- END MODAL ALASAN -->

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

<script type="text/javascript">

  function ambil(no)
  {
    getData(no);
  }

  function simpan(no)
  {
    saveData(no);
  }

  function muncul(no)
  {
    munculModal(no);
  }

  function show_alasan(teks)
  {
    // show_alasan(teks);
    alert("text");
  }

  /// JQUERY START

  $(document).ready(function($){

    $("select[name=pembina]").empty();
    $("select[name=pembina]").html('<option value="">Pilih pembina</option>');
    $( "#datepicker" ).datepicker();
    $("#alternatif").hide();

    // ambil data pembina
    window.getData = function(no)
    {
          var unit    = $("#unit"+no);
          var pembina = $("#pembina"+no);
          var link    = '<?=base_url()?>p/member/get_pembina/'+unit.val();

          pembina.empty();
          pembina.append('<option value="">PIlih pembina</option>');

          $.getJSON(link, function(result)
          {
              $.each(result, function(nip, nama)
              {
                pembina.append('<option value="'+nip+'">'+nama+'</option>');
              });
          });
    }

    // simpan data
    window.saveData = function(no)
    {
          var unit      = $("#unit"+no);
          var pembina   = $("#pembina"+no);
          var id        = $("#id_member"+no);
          var link      = '<?=base_url()?>p/member/ajukan_pembina';

          $.ajax({
            type: "POST",
            url: link,
            data:{id_member:id.val(), nip:pembina.val()},
            success: function(data){
              $("tr#data"+no).hide();
            },
            error: function(xhr, ajaxOption, thrownError){
              alert("Error: "+xhr.status+" "+thrownError);
              location.reload();
            }
          });
    }

    window.munculModal = function(no)
    {
      $("input[name='id_mem']").val($("#id_member"+no).val());
      $("#alternatif").toggle('slow');
    }

    window.closeModal = function(no)
    {
      $("#alternatif").hide();
    }

    window.show_alasan = function(t)
    {
      $("#alasan_text").text(t);
    }

  });

  /// JQUERY END

</script>
