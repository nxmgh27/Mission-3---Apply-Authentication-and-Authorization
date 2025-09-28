<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card">
  <div class="card-header">
    <h4>Mata Kuliah yang Diambil</h4>
  </div>
  <div class="card-body">

    <?php if(session()->getFlashdata('msg')): ?>
      <div class="alert alert-info">
        <?= session()->getFlashdata('msg') ?>
      </div>
    <?php endif; ?>

    <?php if(empty($courses)): ?>
      <div class="alert alert-warning">
        Belum ada mata kuliah yang kamu ambil.
      </div>
    <?php else: ?>
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Semester</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($courses as $course): ?>
            <tr>
              <td><?= $course['course_code'] ?></td>
              <td><?= $course['course_name'] ?></td>
              <td><?= $course['credits'] ?></td>
              <td><?= $course['semester'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>

    <div class="mt-3">
      <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">Kembali</a>
    </div>

  </div>
</div>
<?= $this->endSection() ?>
