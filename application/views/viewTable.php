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

$status = array('-1'=>'Draft', '0'=>'Ditolak','1'=>'Menunggu',
                '2'=>'Persetujuan tahap 1', '3'=>'Diterima');

?>
          <h1>REPORT PENDAFTAR</h1>
          <table border="1" class="table table-striped table-bordered table-hover">
            <thead style="background-color: #EEE">
              <tr >
                <th class="center">ID</th>
                <th class="center">Nama</th>
                <th class="center">Jenis Kelamin</th>
                <th class="center">Instansi</th>
                <th class="center">Tanggal Lahir</th>
                <th class="center">Email</th>
                <th class="center">HP</th>
                <th class="center">Alamat</th>
                <th class="center">Jurusan</th>
                <th class="center">Jenis</th>
                <th class="center">Durasi</th>
                <th class="center">Tujuan</th>
                <th class="center">Bagian</th>
                <th class="center">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $key): ?>
              <tr style="padding-right:10px">
                <td nowrap><?=$key['id_user']?></td>
                <td nowrap><?=$key['nama']?></td>
                <td nowrap><?=($key['jk']==1)?'Laki-Laki':'Perempuan'?></td>
                <td nowrap><?=$key['instansi']?></td>
                <td nowrap><?=$key['tgl_lahir']?></td>
                <td nowrap><?=$key['email']?></td>
                <td nowrap><?=$key['hp']?></td>
                <td nowrap><?=$key['alamat']?></td>
                <td nowrap><?=$key['jurusan']?></td>
                <td nowrap><?=$key['jenis']?></td>
                <td nowrap><?=$key['durasi']?> Bulan</td>
                <td nowrap><?=$key['tujuan']?></td>
                <td nowrap><?=$key['bagian']?></td>
                <td nowrap><?=$status[$key['status']]?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
