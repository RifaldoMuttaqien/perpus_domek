<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Proses Transaksi Peminjaman Buku</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url() . 'petugas/peminjam'; ?>" class="btn btn-sm btn-ligh btn-outline-dark"><i
                    class="fa fa-arrow-left"></i>Kembali</a>
            <br />
            <br />

            <form method="post" action="<?php echo base_url() . 'petugas/peminjaman_aksi'; ?>">
                <div class="form-group">
                    <label class="form-control" for="buku">Buku</label>
                    <select name="buku" class="form-control" id="">
                        <option value="">-Pilih Buku</option>
                        <?php foreach ($buku as $b) { ?>
                        <option value="<?php echo $b->id; ?>">
                            <?php echo $b->judul . '|' . $b->tahun . '|' . $b->penulis; ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="anggota" class="form-control">Anggota</label>
                    <select name="anggota" class="form-control" id="">
                        <option value="">-Pilih Anggota</option>
                        <?php foreach ($anggota as $a) { ?>
                        <option value="<?php echo $a->id; ?>"><?php echo "Nama : " . $a->nama . '| NIK : ' . $a->nik; ?>
                        </option>
                        <?php } ?>
                    </select>
                    <div class="form-group">
                        <label for="tanggal_mulai" class="form-control">Tanggal Mulai Pinjam</label>
                        <input type="date" class="form-control" name="tanggal_mulai"
                            placeholder="Masukkan tanggal_mulai pinjam">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_sampai" class="form-control">Tanggal Selesai Pinjam</label>
                        <input type="date" class="form-control" name="tanggal_sampai"
                            placeholder="Masukkan tanggal_sampai pinjam">
                    </div>

                </div>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
</div>