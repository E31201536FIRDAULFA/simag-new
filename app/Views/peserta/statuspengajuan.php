 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Tabel data peserta -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h4 class="font-weight-bold">Data Pengajuan</h4>
             <ul class="nav nav-pills nav-fill">
                 <li class="nav-item">
                     <a class="nav-link active font-weight-bold" aria-current="page" href="#" id="aktif">Data Pengajuan</a>
                 </li>
             </ul>
         </div>


         <div class="card-body">
             <!-- tabel data peserta aktif -->
             <div class="table-responsive" id="tabel-aktif" style="display: none;">
                 <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Nama</th>
                             <th>Instansi/Sekolah</th>
                             <th>Mulai</th>
                             <th>Selesai</th>
                             <th>Keterangan</th>
                             <th>Status Pengajuan</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($aktif as $key => $value) : ?>
                             <tr>
                                 <td><?= $i;
                                        $i++; ?></td>
                                 <td><?= $value['nama']; ?></td>
                                 <td><?= $value['instansi']; ?></td>
                                 <td><?= $value['startDate']; ?></td>
                                 <td><?= $value['endDate']; ?></td>
                                 <td><?= $value['ket']; ?></td>
                                 <td style="background-color: yellow;"><?= $value['ket']; ?></td>
                             </tr>
                         <?php endforeach ?>
                     </tbody>
                 </table>
             </div>