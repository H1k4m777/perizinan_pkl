<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Pengajuan Izin PKL</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('member/ajukan'); ?>" method="post">
                <input type="hidden" name="id_user" value="<?= $id_user ?>">
                <input type="hidden" name="id_status" value="1">
                <input type="hidden" name="izin_dibuat" value="<?= date("Y-m-d"); ?>">
                <input type="hidden" name="no_reg" value="<?= date('dmy') . rand(1000, 9999); ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama lengkap anda" name="nama">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="NIK">NIK</label>
                        <input type="text" class="form-control" id="NIK" placeholder="Nomor Induk Kependudukan" name="nik">
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" placeholder="Alamat Rumah" name="alamat">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="luas">Luas</label>
                        <input type="number" class="form-control" id="luas" placeholder="Luas area yang ditempati /m²" name="luas">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jenis_jualan">Jenis jualan</label>
                        <input type="text" class="form-control" id="jenis_jualan" placeholder="Jenis barang yang dijual" name="jenis_jualan">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="kecamatan">Kecamatan</label>
                        <select id="kecamatan" class="form-control" name="kecamatan">
                            <option selected>Pilih kecamatan yang ditempati...</option>
                            <option value="semarangbarat">Semarang Barat</option>
                            <option value="semarangtengah">Semarang Tengah</option>
                            <option value="semarangselatan">Semarang Selatan</option>
                            <option value="semarangtimur">Semarang Timur</option>
                            <option value="semarangutara">Semarang Utara</option>
                            <option value="candisari">Candisari</option>
                            <option value="gayamsari">Gayamsari</option>
                            <option value="genuk">Genuk</option>
                            <option value="gunungpati">Gunungpati</option>
                            <option value="gajahmungkur">Gajahmungkur</option>
                            <option value="tembalang">Tembalang</option>
                            <option value="mijen">Mijen</option>
                            <option value="pedurungan">Pedurungan</option>
                            <option value="ngaliyan">Ngaliyan</option>
                            <option value="tugu">Tugu</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="kelurahan">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="jalan">Jalan</label>
                        <input type="text" class="form-control" id="jalan" name="jalan">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="formFile" class="form-label">KTP</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ajukan Formulir</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->