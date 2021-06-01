<?= $this->extend('layout/template')?>

<?= $this->section('content'); ?> 
<div class="container">
    <div class="row">
        <div class="col">
        <h2 class="mt-2">Detail Film</h2>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="/img/<?= $film['sampul']?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $film['judul'];?></h5>
                    <p class="card-text">Sutradara : <?= $film['sutradara']?></p>
                    <p class="card-text">Genre Film : <?= $film['genre']?></p>                    
                    <a href="/film/edit/<?= $film['slug']; ?>" class="btn btn-warning">Edit</a>

                    <a href="/film/delete/<?= $film['id']; ?>" class="btn btn-danger tombol-hapus">Hapus</a>
                    <br><br>
                    <a href="<?= base_url('film/')?>">Kembali ke daftar film</a>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>