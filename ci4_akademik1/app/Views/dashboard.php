<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="row">
  <div class="col-12 mb-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <h3 class="card-title">
          Selamat datang, <?= session()->get('full_name'); ?>!
        </h3>
      </div>
    </div>
  </div>

  <?php if(session()->get('role') === 'student'): ?>
    <div class="col-md-6 mb-4">
      <div class="card border-primary shadow-sm h-100">
        <div class="card-body text-center">
          <h5 class="card-title">Mata Kuliah</h5>
          <p class="card-text">Lihat daftar mata kuliah yang tersedia.</p>
          <a href="<?= base_url('/courses') ?>" class="btn btn-primary">Lihat</a>
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-4">
      <div class="card border-success shadow-sm h-100">
        <div class="card-body text-center">
          <h5 class="card-title">Mata Kuliah Saya</h5>
          <p class="card-text">Lihat mata kuliah yang sudah Anda ambil.</p>
          <a href="<?= base_url('/courses/my-enrollments') ?>" class="btn btn-success">Lihat</a>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if(session()->get('role') === 'admin'): ?>
    <div class="col-md-6 mb-4">
      <div class="card border-primary shadow-sm h-100">
        <div class="card-body text-center">
          <h5 class="card-title">Kelola Mata Kuliah</h5>
          <p class="card-text">Tambah, edit, atau hapus data mata kuliah.</p>
          <a href="<?= base_url('/admin/courses') ?>" class="btn btn-primary">Kelola</a>
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-4">
      <div class="card border-success shadow-sm h-100">
        <div class="card-body text-center">
          <h5 class="card-title">Kelola Mahasiswa</h5>
          <p class="card-text">Kelola data mahasiswa yang terdaftar.</p>
          <a href="<?= base_url('/admin/students') ?>" class="btn btn-success">Kelola</a>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
