<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Ganti Password</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "sukses") {
                            echo "<div class='alert alert-success'>Password berhasil diganti.</div>";
                        }
                    }
                    ?>

                    <?php echo validation_errors(); ?>
                    <form method="post" action="<?php echo base_url() . 'petugas/ganti_password_aksi'; ?>">
                        <div class="form-group">
                            <label class="font-weight-bold" for="password_baru">Password baru</label>
                            <input type="password" class="form-control" name="password_baru"
                                placeholder="Masukkan password Baru">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="password_ulang">Ulangi Password baru</label>
                            <input type="password" class="form-control" name="password_ulang"
                                placeholder="Ulangi Masukkan password Baru">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Ubah Password">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>