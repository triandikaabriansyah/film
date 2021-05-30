<?= $this->extend('layout/template');?>

<?= $this->section('content'); ?> 

<div class="container">
    <div class="row">
        <div class="col">
        <a href="/film/create" class="btn btn-primary mt-3">Tambah Data Film</a>
        <h1 class="mt-2">Daftar Film</h1>
        <?php if(session()->getFlashdata('pesan')) :?>
            <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif ?>            
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Sampul</th>
                <th scope="col">Judul</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1?>
                <?php foreach($komik as $k) : ?>
                <tr>
                <th scope="row"><?= $no++?></th>
                <td><img src="/img/<?= $k['sampul'];?>" alt="" class="sampul"></td>
                <td><?= $k['judul']; ?></td>
                <td>
                <a href="/film/<?= $k['slug'];?>" class="btn btn-success">Detail</a>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
    