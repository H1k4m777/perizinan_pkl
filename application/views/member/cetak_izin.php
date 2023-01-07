<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Ajuan Anda</h6>
        </div>
        <div class="card-body">
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
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $this->db->select('form_pengajuan.*, status_ajuan.status');
                        $this->db->join('status_ajuan', 'form_pengajuan.id_status = status_ajuan.id_status');
                        $this->db->where('form_pengajuan.id_user', $id_user);
                        $this->db->where('form_pengajuan.id_status', 2);
                        $pengajuan = $this->db->get('form_pengajuan')->result_array();
                        foreach ($pengajuan as $p) {
                            echo '
                                <tr data-toggle="modal" data-id="1" data-target="#orderModal">
                                    <td>' . $p['no_reg'] . '</td>
                                    <td>' . $p['nama'] . '</td>
                                    <td>' . $p['luas'] . '</td>
                                    <td>' . $p['jenis_jualan'] . '</td>
                                    <td>' . $p['kecamatan'] . '</td>
                                    <td>' . $p['kelurahan'] . '</td>
                                    <td>' . $p['jalan'] . '</td>
                                    <td>' . date("d-m-Y", strtotime($p['izin_dibuat'])) . '</td>
                                    <td>' . $p['status'] . '</td>
                                    <td><a href="" class="btn btn-warning">cetak</a></td>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->