<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Notifikasi Pengajuan-->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card bg-c-white m-3 shadow">
                <div class="row align-items-center ml-3">
                    <i class="fa-light fa-bells"></i>
                    <div class="p-3">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty(session()->getFlashdata('success'))) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                        <h4>
                            <span class="m-b-5 font-weight-bold">Hallo ! <br>Proses pengajuan pendaftaran magang anda telah berhasil. <br> Saat ini akun ada sedang dalam proses peninjauan, mohon kembali beberapa saat lagi. <?= session()->nama; ?> !</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- End of Main Content -->