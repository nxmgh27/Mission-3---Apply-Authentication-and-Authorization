<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
  <div class="card shadow-lg">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0">Edit Mata Kuliah</h4>
    </div>
    <div class="card-body">

      <form method="post" action="<?= site_url('admin/courses/update/'.$course['course_id']) ?>">
        <?= csrf_field() ?>

        <div class="mb-3">
          <label for="course_code" class="form-label">Kode Mata Kuliah</label>
          <input type="text" name="course_code" id="course_code"
                 class="form-control"
                 value="<?= esc($course['course_code']) ?>" required>
        </div>

        <div class="mb-3">
          <label for="course_name" class="form-label">Nama Mata Kuliah</label>
          <input type="text" name="course_name" id="course_name"
                 class="form-control"
                 value="<?= esc($course['course_name']) ?>" required>
        </div>

        <div class="mb-3">
          <label for="credits" class="form-label">SKS</label>
          <input type="number" name="credits" id="credits"
                 class="form-control"
                 value="<?= esc($course['credits']) ?>" min="1" max="6" required>
        </div>

        <div class="mb-3">
          <label for="semester" class="form-label">Semester</label>
          <input type="number" name="semester" id="semester"
                 class="form-control"
                 value="<?= esc($course['semester']) ?>" min="1" max="14" required>
        </div>

        <div class="d-flex justify-content-between">
          <a href="<?= site_url('admin/courses') ?>" class="btn btn-secondary">
            Kembali
          </a>
          <button type="submit" class="btn btn-warning text-dark">
            Update
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
<?= $this->endSection() ?>
