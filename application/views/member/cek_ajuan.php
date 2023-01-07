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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $this->db->select('form_pengajuan.*, status_ajuan.status');
                        $this->db->join('status_ajuan', 'form_pengajuan.id_status = status_ajuan.id_status');
                        $this->db->where('form_pengajuan.id_user', $id_user);
                        $this->db->where('form_pengajuan.id_status', 1);
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

<div id="orderModal" class="modal hide fade" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Ajuan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                foreach ($pengajuan as $p) {
                    echo '
                <ul style="list-style-type:none;">
                    <li>Registrasi:' . $p['no_reg'] . '</li>
                    <li>Nama: ' . $p['nama'] . '</li>
                    <li>' . $p['luas'] . '</li>
                    <li>' . $p['jenis_jualan'] . '</li>
                    <li>' . $p['kecamatan'] . '</li>
                    <li>' . $p['kelurahan'] . '</li>
                    <li>' . $p['jalan'] . '</li>
                    <li>' . date("d-m-Y", strtotime($p['izin_dibuat'])) . '</li>
                    <li>' . $p['status'] . '</li>
                </ul>
                ';
                }
                ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>