<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Tambah Mahasiswa
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
  <div class="card-header bg-success text-white">
    <h4 class="mb-0">Tambah Mahasiswa</h4>
  </div>
  <div class="card-body">
    <form method="post" action="<?= site_url('admin/students/store') ?>">

      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="full_name" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Kelas</label>
        <input type="text" name="kelas" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Semester</label>
        <input type="number" name="semester" class="form-control" value="1">
      </div>

      <div class="mb-3">
        <label class="form-label">Tahun Masuk</label>
        <input type="number" name="entry_year" class="form-control" value="<?= date('Y') ?>">
      </div>

      <div class="d-flex justify-content-between">
        <a href="<?= site_url('admin/students') ?>" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>
