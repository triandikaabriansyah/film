<?= $this->extend('layout/template')?>

<?= $this->section('content'); ?> 
<div class="container">
    <div class="row">
        <div class="col-10">
        <h2 class="mt-2">Form Ubah Data Film</h2>
        <form action="/film/update/<?= $film['id'];?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug" value="<?= $film['slug'];?>">
        <input type="hidden" name="sampulLama" value="<?= $film['sampul'];?>">
        <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
            <input type="text" class="form-control <?=($validation->hasError('judul')) ? 'is-invalid' : '' ?> " name="judul" id="judul" autofocus value="<?= (old('judul')) ? old('judul') : $film['judul']; ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('judul') ?>
            </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="sutradara" class="col-sm-2 col-form-label">Sutradara</label>
            <div class="col-sm-10">
            <input type="text" class="form-control <?=($validation->hasError('sutradara')) ? 'is-invalid' : '' ?>" name="sutradara" id="sutradara" value="<?= (old('sutradara')) ? old('sutradara') : $film['sutradara']; ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('sutradara') ?>
            </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="genre" class="col-sm-2 col-form-label">Genre</label>
            <div class="col-sm-10">
            <input type="text" class="form-control <?=($validation->hasError('genre')) ? 'is-invalid' : '' ?> " name="genre" id="genre" value="<?= (old('genre')) ? old('genre') : $film['genre']; ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('genre') ?>
            </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
            <div class="col-sm-2">
                <img src="/img/<?= $film['sampul']; ?>" class="img-thumbnail img-preview">
            </div>
            <div class="col-sm-8">
            <div class="custom-file">
                <input type="file" class="custom-file-input <?=($validation->hasError('sampul')) ? 'is-invalid' : '' ?>" id="sampul" name="sampul" onchange="previewImg()">
                <label class="custom-file-label" for="Sampul"><?= $film['sampul']; ?></label>
            <div class="invalid-feedback">
                <?= $validation->getError('sampul') ?>
            </div>
            </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Ubah Data</button>
            </div>
        </div>
        </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>