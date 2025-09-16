<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4>Manajemen Mata Kuliah</h4>

    <?php if(session()->get('role') === 'admin'): ?>
      <a href="<?= base_url('admin/courses/create') ?>" class="btn btn-sm btn-success">+ Tambah Mata Kuliah</a>
    <?php endif; ?>
  </div>
  <div class="card-body">

    <?php if(session()->getFlashdata('msg')): ?>
      <div class="alert alert-success">
        <?= session()->getFlashdata('msg') ?>
      </div>
    <?php endif; ?>

    <?php if(empty($courses)): ?>
      <div class="alert alert-warning">
        Belum ada mata kuliah terdaftar.
      </div>
    <?php else: ?>
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($courses as $course): ?>
            <tr>
              <td><?= $course['course_code'] ?></td>
              <td><?= $course['course_name'] ?></td>
              <td><?= $course['credits'] ?></td>
              <td><?= $course['semester'] ?></td>
              <td>
                <?php if(session()->get('role') === 'admin'): ?>
                  <a href="<?= base_url('admin/courses/edit/'.$course['course_id']) ?>" 
                     class="btn btn-sm btn-warning me-1">
                     <i class="bi bi-pencil-square"></i> Edit
                     
                  <a href="<?= base_url('admin/courses/delete/'.$course['course_id']) ?>" 
                     class="btn btn-sm btn-danger" 
                     onclick="return confirm('Yakin hapus mata kuliah ini?')">
                     <i class="bi bi-trash"></i> Hapus
                <?php elseif(session()->get('role') === 'student'): ?>
                  <a href="<?= base_url('courses/enroll/'.$course['course_id']) ?>" 
                     class="btn btn-sm btn-primary">Ambil</a>
                
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  <div class="form-group mt-3">
    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">Kembali</a>
  </div>
  </div>
</div>
<?= $this->endSection() ?>
