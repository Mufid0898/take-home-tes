<div class="container">
    <!-- CARD -->


    <div class="card-body">
        <div class="text-left">
            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('template') ?>/dist/img/Frame-98700.png" alt="User profile picture">
        </div>
        <br>
        <h2><?= session()->get('nama_kandidat') ?></h2>

        <br>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="namakandidat" class="form-label">Nama kandidat</label>
                    <input type="text" class="form-control" id="nama" value=" @ <?= session()->get('nama_kandidat') ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="posisikandidat" class="form-label">Posisi Kandidat</label>
                    <input type="text" class="form-control" id="posisi" value="</> <?= session()->get('jabatan') ?>">
                </div>
            </div>
        </div>
    </div>

</div>