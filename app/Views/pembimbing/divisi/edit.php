<!-- Begin Page Content -->
<div class="container-fluid">
    <?php $val = Service('validation'); ?>
    <div class="row m-2">
        <div class="col">
            <div class="card card-olive shadow">
                <div class="card-header">
                    <h3 class="card-title">Ubah Data Pembimbing</h3>
                </div>
                <div class="card-body">
                    <!-- display flash data message -->
                    <?php
                    if (session()->getFlashdata('failed')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('failed') ?>
                        </div>
                    <?php endif; ?>
                    <form action="" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Divisi</label><small class="text-danger">*</small>
                            <input type="text" name="name" class="form-control" value="<?= $content['name']; ?>">
                            <?= ($val->hasError('name')) ? '<small class="text-danger">' . $val->getError('name') . '</small>' : ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Kuota Mahasiswa</label><small class="text-danger">*</small>
                            <input type="number" name="quota" class="form-control" value="<?= $content['quota']; ?>">
                            <?= ($val->hasError('quota')) ? '<small class="text-danger">' . $val->getError('quota') . '</small>' : ''; ?>
                        </div>
                        <button type=" submit" name="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script>
    $('.alert').delay(5000).slideUp('slow');
</script>
</div>
<!-- End of Main Content -->