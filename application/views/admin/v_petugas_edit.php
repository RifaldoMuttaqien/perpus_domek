<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Petugas</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url() . 'admin/petugas' ?>"
                class="btn btn-sm btn-light btn-outline-dark pull-right"><i class="fa fa-arrow-left">Kembali</i></a>
        </div>
        <br />
        <br />

        <?php foreach ($petugas as $p) { ?>
        <form action="<?php echo base_url() . 'admin/petugas_update'; ?>" method="post">
            <div class="form-group">
                <label for="nama" class="font-weight-bold">Nama Lengkap</label>
                <input type="hidden" class="form-control" value="<?php echo $p->id; ?>" name="id">
                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap"
                    required="required" value="<?php echo $p->nama; ?>">
            </div>
            <div class="form-group">
                <label for="username" class="font-weight-bold">Username</label>

                <input type="text" class="form-control" name="username" placeholder="Masukkan nama lengkap"
                    required="required" value="<?php echo $p->username; ?>">
            </div>
            <div class="form-group">
                <label for="password" class="font-weight-bold">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>


            <button type="submit" class="btn btn-info">Simpan</button>
        </form>
        <?php } ?>
    </div>
</div>