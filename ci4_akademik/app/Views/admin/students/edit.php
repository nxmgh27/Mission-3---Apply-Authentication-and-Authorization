<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header bg-warning text-white">
      <h4 class="mb-0">Edit Mahasiswa</h4>
    </div>
    <div class="card-body">
      <form method="post" action="<?= site_url('admin/students/update/'.$student['student_id']) ?>">
        <input type="hidden" name="user_id" value="<?= esc($student['user_id']) ?>">

        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control"
                 value="<?= esc($student['username'] ?? $student['username']) ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" name="full_name" class="form-control"
                 value="<?= esc($student['full_name']) ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">NIM</label>
          <input type="text" name="nim" class="form-control"
                 value="<?= esc($student['nim']) ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Kelas</label>
          <input type="text" name="kelas" class="form-control"
                 value="<?= esc($student['kelas']) ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Semester</label>
          <input type="number" name="semester" class="form-control"
                 value="<?= esc($student['semester']) ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Tahun Masuk</label>
          <input type="number" name="entry_year" class="form-control"
                 value="<?= esc($student['entry_year']) ?>">
        </div>

        <div class="d-flex justify-content-between">
          <a href="<?= site_url('admin/students') ?>" class="btn btn-secondary">← Kembali</a>
          <button type="submit" class="btn btn-warning">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
