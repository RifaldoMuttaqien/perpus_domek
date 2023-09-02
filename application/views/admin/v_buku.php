<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
            <h5>Data Buku</h5>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-datatable">
                    <thead>
                        <tr>
                            <td width="1%">No</td>
                            <td>Judul Buku</td>
                            <td>Tahun Terbit</td>
                            <td>Penulis</td>
                            <td width="10%">Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($buku as $b) {
                        ?>
                        <tr>
                            <th><?php echo $no++; ?></th>
                            <th><?php echo $b->judul; ?></th>
                            <th><?php echo $b->tahun; ?></th>
                            <th><?php echo $b->penulis; ?></th>
                            <th>
                                <?php
                                    if ($b->status == "1") {
                                        echo "<span class='badge badge-danger'>Tersedia</span>";
                                    } else if ($b->status == "2") {
                                        echo "<span class='badge badge-primary'>Sedang dipinjam</span>";
                                    }
                                    ?>
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