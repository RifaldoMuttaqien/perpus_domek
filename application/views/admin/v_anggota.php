<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Anggota</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-datatable">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama</th>
                            <th>Nik</th>
                            <th>Alamat</th>
                            <th width="10%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($anggota as $a) {
                        ?>
                            <tr>
                                <th><?php echo $no++; ?></th>
                                <th><?php echo $a->nama; ?></th>
                                <th><?php echo $a->nik; ?></th>
                                <th><?php echo $a->alamat; ?></th>
                                <th><a target="_blank" href="<?php echo base_url() . 'admin/anggota_kartu/' . $a->id; ?>" class="btn btn-sm btn-primary"><i class="fa fa-address-card"></i>Cetak Kartu</a>
                                </th>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>