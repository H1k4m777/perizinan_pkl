<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
        </div>
        <div class="card-body">
            <!-- Page Heading -->
            <!-- <h1 class="h3 mb-4 text-gray-800">Blank index</h1> -->
            <p>Selamat datang, <?php echo $nama ?></p>
            <div class="row">
                <div class="card bg-warning m-2" style="width: 300px;">
                    <div class="card-body text-light">
                        <h3 class="card-title">Jumlah Pengajuan :</h3>
                        <p class="card-text"><?= $form ?></p>
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>
                </div>
                <div class="card bg-success m-2" style="width: 300px;">
                    <div class="card-body text-light">
                        <h3 class="card-title">Jumlah Data PKL :</h3>
                        <p class="card-text"><?= $pkl ?></p>
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>
                </div>
                <div class="card bg-info m-2" style="width: 300px;">
                    <div class="card-body text-light">
                        <h3 class="card-title">Jumlah User Member :</h3>
                        <p class="card-text">1</p>
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>
                </div>
                <div class="card bg-danger m-2" style="width: 300px;">
                    <div class="card-body text-light">
                        <h3 class="card-title">Jumlah User Admin :</h3>
                        <p class="card-text"><?= $jumlah_admin ?></p>
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>
                </div>
            </div>
            <a href="<?= base_url('auth/logout'); ?>">logout</a>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>

</div>
<!-- End of Main Content -->