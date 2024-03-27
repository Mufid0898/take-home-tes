<div class="container">
    <div class="form-group col-md-12">
        <h2 class="my-3">Tambah Product</h2>
    </div>
    <form action="<?= base_url('Produk/Save') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="inputState" class="form-label">Kategori</label>
                <select class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori">
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($category as $cate => $valcat) { ?>
                        <?php if (old('kategori') == $valcat['code_kategori']) : ?>
                            <option value="<?= $valcat['code_kategori'] ?>" selected><?= $valcat['nama_kategori'] ?></option>
                        <?php else : ?>
                            <option value="<?= $valcat['code_kategori'] ?>"><?= $valcat['nama_kategori'] ?></option>
                        <?php endif; ?>
                    <?php } ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('kategori'); ?>
                </div>
            </div>

            <div class="form-group col-md-8">
                <label for="namabarang">Nama Barang</label>
                <input type="text" class="form-control <?= ($validation->hasError('namabarang')) ? 'is-invalid' : ''; ?>" id="namabarang" name="namabarang" placeholder="Masukkan nama barang" autofocus value="<?= old('namabarang'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('namabarang'); ?>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="hargabeli">Harga Beli</label>
                <input type="number" class="form-control <?= ($validation->hasError('hargabeli')) ? 'is-invalid' : ''; ?>" id="hargabeli" name="hargabeli" placeholder="Masukkan harga beli" value="<?= old('hargabeli'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('hargabeli'); ?>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="hargajual">Harga Jual*</label>
                <input type="number" class="form-control <?= ($validation->hasError('hargajual')) ? 'is-invalid' : ''; ?>" id="hargajual" name="hargajual" placeholder="Masukkan harga jual" value="<?= old('hargajual'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('hargajual'); ?>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="stok">Stock Barang</label>
                <input type="number" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" placeholder="Masukkan jumlah stok barang" value="<?= old('stok'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('stok'); ?>
                </div>
            </div>

            <div class="form-group col-md-2 text-center">
                <img src="../img/default.jpg" class="img-thumbnail img-preview" height="100px" width="100px">
            </div>

            <div class="form-group col-md-10">
                <label for="sampul">File input</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="sampul" name="sampul" onchange="previewImg()">
                    <label class="custom-file-label" for="Sampul">Choose file</label>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary">Batalkan</button>
            <button type="submit" class="btn btn-primary">Simpan</button>

        </div>
    </form>
</div>