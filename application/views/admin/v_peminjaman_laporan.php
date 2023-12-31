<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
            <h4>Laporan Peminjaman Buku</h4>
        </div>
        <div class="card-body">
            <br />
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h6>Filter Berdasarkan Tanggal</h6>
                        </div>
                        <div class="card-body">

                            <form action="" method="get">
                                <div class="form-group">
                                    <label for="tanggal_mulai" class="font-weight-bold">Tanggal Mulai Pinjam</label>
                                    <input type="date" class="form-control" name="tanggal_mulai" placeholder="Masukkan tanggal mulai pinjam">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_sampai" class="font-weight-bold">Tanggal Pinjam Sampai</label>
                                    <input type="date" class="form-control" name="tanggal_sampai" placeholder="Masukkan tanggal pinjam sampai">
                                </div>
                                <input type="submit" class="btn btn-success" value="Filter">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <?php
            // membuat tombol cetak jika data sudah di filter
            if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
                $mulai = $_GET['tanggal_mulai'];
                $sampai = $_GET['tanggal_sampai'];
            ?>
                <a class="btn btn-primary" target="_blank" href="<?php echo base_url() . 'admin/peminjaman_cetak/?tanggal_mulai=' . $mulai . '&tanggal_sampai=' . $sampai ?>"><i class="fa fa-print"></i>Cetak</a>
            <?php
            }
            ?>
            <br />
            <br />
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-datatable">
                    <thead>
                        <tr>
                            <th width="1%">NO</th>
                            <th>Buku</th>
                            <th>Peminjaman</th>
                            <th>Muali Pinjam</th>
                            <th>Pinjam Sampai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($peminjaman as $p) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $p->judul; ?></td>
                                <td><?php echo $p->nama; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($p->peminjaman_tanggal_mulai)); ?></td>
                                <td><?php echo date('d-m-Y', strtotime($p->peminjaman_tanggal_sampai)); ?></td>
                                <td>
                                    <?php
                                    if ($p->peminjaman_status == "1") {
                                        echo "<div class='badge badge-info'>Selesai</div>";
                                    } else if ($p->peminjaman_status == "2") {
                                        echo "<div class='badge badge-warning'>Dipinjam</div>";
                                    }
                                    ?>
                                </td>
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