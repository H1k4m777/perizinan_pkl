<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List permintaan persetujuan</h6>
        </div>
        <div class="card-body">
            <form class="mb-5 " action="" method="post">
                <div class="form-group">
                    <label for="tanggal">Filter berdasarkan tanggal izin disetujui:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. Registrasi</th>
                            <th>Nama</th>
                            <th>Luas</th>
                            <th>Jenis Jualan</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Jalan</th>
                            <th>Izin Dibuat</th>
                            <th>Nama User</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $this->db->select('form_pengajuan.*, user.nama AS nama_user, status_ajuan.status');
                        $this->db->join('user', 'form_pengajuan.id_user = user.id_user');
                        $this->db->join('status_ajuan', 'form_pengajuan.id_status = status_ajuan.id_status');
                        $this->db->where('form_pengajuan.id_status', 2);
                        if (isset($_POST['tanggal'])) {
                            $filter_tanggal = $_POST['tanggal'];
                            $this->db->where('izin_dibuat', $filter_tanggal);
                        }
                        $pengajuan = $this->db->get('form_pengajuan')->result_array();
                        foreach ($pengajuan as $p) {
                            echo '
                <tr>
                    <td>' . $p['no_reg'] . '</td>
                    <td>' . $p['nama'] . '</td>
                    <td>' . $p['luas'] . '</td>
                    <td>' . $p['jenis_jualan'] . '</td>
                    <td>' . $p['kecamatan'] . '</td>
                    <td>' . $p['kelurahan'] . '</td>
                    <td>' . $p['jalan'] . '</td>
                    <td>' . date("d-m-Y", strtotime($p['izin_dibuat'])) . '</td>
                    <td>' . $p['nama_user'] . '</td>
                    <td>' . $p['status'] . '</td>
                    <td><a href="' . base_url('admin/batal_setuju/') . $p['id_form'] . '" class="btn btn-danger">Batalkan Setujui</a></td>
                </tr>
            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>