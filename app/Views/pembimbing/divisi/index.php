<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Tabel Absensi-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="font-weight-bold">Divisi</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <a class="btn btn-primary" href="<?= base_url('dashboard/pembimbing/data/divisi/tambah/'); ?>">Tambah divisi</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Divisi</th>
                            <th>Kuota</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($content as $key => $value) : ?>
                            <tr>
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><?= $value->name; ?></td>
                                <td><?= $value->quota; ?></td>
                                <td>
                                    <a class="btn btn-primary" href="<?= base_url('dashboard/pembimbing/data/divisi/update/'.$value->id); ?>"> <i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('dashboard/pembimbing/data/divisi/delete/'.$value->id) ?>" onclick="return confirm('Apakah anda yakin? Anda tidak akan dapat memulihkan file!')" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->