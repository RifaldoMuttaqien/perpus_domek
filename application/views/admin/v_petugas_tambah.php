<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Tambah Petugas Baru</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url() . 'admin/petugas' ?>"
                class="btn btn-sm btn-light btn-outline-dark pull-right"><i class="fa fa-arrow-left">Kembali</i></a>
        </div>
        <br />
        <br />

        <form action="<?php echo base_url() . 'admin/petugas_tambah_aksi'; ?>" method="post">
            <div class="form-group">
                <label for="nama" class="font-weight-bold">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap"
                    required="required">
            </div>
            <div class="form-group">
                <label for="nama" class="font-weight-bold">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Masukkan username"
                    required="required">
            </div>
            <div class="form-group">
                <label for="nama" class="font-weight-bold">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan Password"
                    required="required">
            </div>

            <button type="submit" class="btn btn-info">Simpan</button>
        </form>
    </div>
</div>