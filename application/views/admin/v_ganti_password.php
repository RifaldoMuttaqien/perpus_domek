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
                            echo "<div class='alert alert-success'>Password berhasil diganti</div>";
                        }
                    }
                    ?>

                    <?php echo validation_errors(); ?>
                    <form action="<?php echo base_url() . 'admin/ganti_password_aksi'; ?>" method="post">
                        <div class="form-group">
                            <label for="password_baru" class="font-weight-blog">Password Baru</label>
                            <input type="password" class="form-control" name="password_baru" id="" placeholder="Masukkan password Baru">
                        </div>
                        <div class="form-group">
                            <label for="password_ulang" class="font-weight-blog">Ulangi Password</label>
                            <input type="password" class="form-control" name="password_ulang" id="" placeholder="Masukkan password Baru">
                        </div>
                        <input type="submit" class="btn btn-danger" value="Ubah Password">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>