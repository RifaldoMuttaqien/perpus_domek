<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Buku</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url() . 'petugas/buku' ?>"
                class="btn btn-sm btn-light btn-outline-dark pull-right">Kembali</a>
            <br />
            <br />
            <?php foreach ($buku as $b) { ?>
            <form method="post" action="<?php echo base_url() . 'petugas/buku_update'; ?>">
                <div class="form-group">
                    <label for="judul" class="font-weight-bold">Judul Lengkap</label>
                    <input type="hidden" value="<?php echo $b->id; ?>" name="id">
                    <input type="text" class="form-control" name="judul" placeholder="Masukkan judul lengkap"
                        required="required" value="<?php echo $b->judul; ?>">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="tahun">Tahun Terbit</label>
                    <select class="form-control" name="tahun" id="" required="required">
                        <option value="">Pilih Tahun</option>
                        <?php for ($tahun = date('Y'); $tahun >= 1990; $tahun--) { ?>
                        <option <?php if ($tahun == $b->tahun) {
                                            echo "selected='selected'";
                                        } ?> value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="penulis">Penulis</label>
                    <input class="form-control" name="penulis" required="required" placeholder="Masukkan nama penulis"
                        value="<?php echo $b->penulis; ?>">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="status">Status Buku</label>
                    <select name="status" class="form-control" id="" required="required">
                        <option value="">Pilih Status</option>
                        <option <?php if ($b->status == "1") {
                                        echo "selected-'selected'";
                                    } ?> value="1">Tersedia</option>
                        <option <?php if ($b->status == "2") {
                                        echo "selected-'selected'";
                                    } ?> value="2">Sedang dipinjam</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
            <?php } ?>
        </div>
    </div>
</div>