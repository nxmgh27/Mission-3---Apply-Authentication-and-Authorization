<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Tambah Mata Kuliah</h4>
    </div>
    <div class="card-body">

      <form method="post" action="<?= site_url('admin/courses/store') ?>">
        <?= csrf_field() ?>

        <div class="mb-3">
          <label for="course_code" class="form-label">Kode Mata Kuliah</label>
          <input type="text" name="course_code" id="course_code" 
                 class="form-control" placeholder="contoh: IF101" required>
        </div>

        <div class="mb-3">
          <label for="course_name" class="form-label">Nama Mata Kuliah</label>
          <input type="text" name="course_name" id="course_name" 
                 class="form-control" placeholder="contoh: Algoritma & Pemrograman" required>
        </div>

        <div class="mb-3">
          <label for="credits" class="form-label">SKS</label>
          <input type="number" name="credits" id="credits" 
                 class="form-control" value="3" min="1" max="6" required>
        </div>

        <div class="mb-3">
          <label for="semester" class="form-label">Semester</label>
          <input type="number" name="semester" id="semester" 
                 class="form-control" value="1" min="1" max="14" required>
        </div>

        <div class="d-flex justify-content-between">
          <a href="<?= site_url('admin/courses') ?>" class="btn btn-secondary">
            Kembali
          </a>
          <button type="submit" class="btn btn-success">
            Simpan
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
<?= $this->endSection() ?>
