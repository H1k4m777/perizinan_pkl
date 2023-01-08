<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data PKL <?= $kec; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Luas</th>
                            <th>Jenis Jualan</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Jalan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $query = $this->db->get_where('pkl', array('kecamatan' => $kec));
                        // $data = $query->row();
                        $this->db->select('pkl.*');
                        $this->db->where('pkl.kecamatan', $kec);
                        $data = $this->db->get('pkl')->result_array();
                        foreach ($data as $p) {
                            echo '
                <tr>
                    <td>' . $p['nama'] . '</td>
                    <td>' . $p['nik'] . '</td>
                    <td>' . $p['alamat'] . '</td>
                    <td>' . $p['luas'] . '</td>
                    <td>' . $p['jenis_jualan'] . '</td>
                    <td>' . $p['kecamatan'] . '</td>
                    <td>' . $p['kelurahan'] . '</td>
                    <td>' . $p['jalan'] . '</td>
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