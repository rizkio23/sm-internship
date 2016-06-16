<?php
header('Pragma: public');
/////////////////////////////////////////////////////////////
// prevent caching....
/////////////////////////////////////////////////////////////
// Date in the past sets the value to already have been expired.
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');     // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0');    // HTTP/1.1
header ("Pragma: no-cache");
header("Expires: 0");
/////////////////////////////////////////////////////////////
// end of prevent caching....
/////////////////////////////////////////////////////////////
header('Content-Transfer-Encoding: none');
// This should work for IE & Opera
header('Content-Type: application/vnd.ms-excel;');
 // This should work for the rest
header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=laporan-peserta.xls");
$no = 1;
?>
          <div style="font-size:25px; text-align:center"><b>PT. Semen Indonesia (Persero) Tbk.</b></div>
          <div style="font-size:17px; text-align:center"><b>Jl. Veteran Gresik, 6122 Jawa Timur Indonesia</b></div>
          <hr>
          <h2 style="text-align:center">ABSENSI PENDAFTAR</h2>
          <h3 style="text-align:center">Bulan <?=date('F Y')?></h3>
          <table border="1" class="table table-striped table-bordered table-hover">
            <thead style="background-color: #EEE">
              <tr >
                <th class="center">No</th>
                <th class="center">ID</th>
                <th class="center">Nama</th>
                <th class="center">Instansi</th>
                <th class="center">Durasi</th>
                <th class="center">Tanda Tangan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $key): ?>
              <tr style="height:50px; vertical-align:middle">
                <td nowrap><?=$no++?></td>
                <td nowrap><?=$key['id_user']?></td>
                <td nowrap><?=$key['nama']?></td>
                <td nowrap><?=$key['instansi']?></td>
                <td nowrap><?=$key['durasi']?> Bulan</td>
                <td nowrap></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
