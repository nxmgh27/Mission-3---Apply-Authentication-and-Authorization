<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0">Daftar Mahasiswa</h4>
      <a href="<?= site_url('admin/students/create') ?>" class="btn btn-light btn-sm">
        + Tambah Mahasiswa
      </a>
    </div>
    <div class="card-body">

      <?php if(session()->getFlashdata('msg')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('msg') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <div class="table-responsive">
        <table class="table table-striped table-hover align-middle text-center">
          <thead class="table-dark">
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Semester</th>
              <th>Tahun Masuk</th>
              <th width="180px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($students)): ?>
              <?php foreach($students as $s): ?>
              <tr>
                <td><strong><?= esc($s['nim']) ?></strong></td>
                <td class="text-start"><?= esc($s['full_name']) ?></td>
                <td><?= esc($s['kelas']) ?></td>
                <td><?= esc($s['semester']) ?></td>
                <td><?= esc($s['entry_year']) ?></td>
                <td>
                  <a href="<?= site_url('admin/students/edit/'.$s['student_id']) ?>" 
                     class="btn btn-sm btn-warning me-1">
                    <i class="bi bi-pencil-square"></i> Edit
                  </a>
                  <a href="<?= site_url('admin/students/delete/'.$s['student_id']) ?>" 
                     class="btn btn-sm btn-danger"
                     onclick="return confirm('Yakin hapus data ini?')">
                    <i class="bi bi-trash"></i> Hapus
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="text-center text-muted">
                  Tidak ada data mahasiswa.
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <div class="form-group mt-3">
        <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
