<div class="col-md-12">
    <div class="card card-primary">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <div class="form-group col-md-4">
            <input type="text" class="form-control d-inline" nama="katakunci" placeholder="Masukkan kata kunci" aria-label="Masukkan kata kunci" aria-describedby="button-addon2">

        </div>
        <div class="form-group col-md-2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
        </div>

        <div class="card-header">

            <h3 class="card-title">Daftar <?= $judul ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('Produk/Create') ?>">
                    <button type="button" class="btn btn-tool">
                        <i class="fas fa-plus"></i> Add Data
                    </button>
                </a>
                <a href="<?= base_url('Produk/export') ?>" class="btn btn-primary">
                    <i class="fas fa-file-download"></i> Export Excel
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Image</td>
                        <td>Nama Produk</td>
                        <td>Kategori Produk</td>
                        <td>Harga Beli (Rp)</td>
                        <td>Harga Jual (Rp)</td>
                        <td>Stok Produk</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($product as $prod => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td style="text-align: center;">

                                <?php if ($value['foto_barang'] != '') : ?>
                                    <img src="<?= "img/" . $value['foto_barang'] ?>" alt="image" height="100px" width="100px">
                                <?php else : ?>
                                    <img src="img/default.jpg" alt="image" height="100px" width="100px">
                                <?php endif; ?>

                            </td>
                            <td><?= $value['nama_barang'] ?></td>
                            <td><?php if ($value['kategori_produk'] == 'alatmusik') : ?>
                                    Alat Musik
                                <?php else : ?>
                                    Olahraga
                                <?php endif; ?>
                            </td>
                            <td><?= $value['harga_beli'] ?></td>
                            <td><?= $value['harga_jual'] ?></td>
                            <td><?= $value['stok_barang'] ?></td>
                            <td>
                                <a href="<?= base_url('Produk/Edit/' . $value['id_produk']) ?>">
                                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                                </a>
                                <button class="btn btn-danger"><i class="fas fa-trash" data-toggle="modal" data-target="#delete-data<?= $value['id_produk'] ?>"></i></button>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--- Modal Delete  --->
<?php foreach ($product as $prod => $value) { ?>
    <div class="modal fade" id="delete-data<?= $value['id_produk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Apakah Anda Yakin Hapus <b><?= $value['nama_barang'] ?></b>..?</p>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <a href=<?= base_url('Produk/Delete/' . $value['id_produk']) ?> class="btn btn-danger btn-flat">Delete</a>
                </div>

            </div>
        </div>
    </div>

<?php } ?>