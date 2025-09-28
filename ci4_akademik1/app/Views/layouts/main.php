<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Sistem Akademik' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; }
        .navbar-brand { font-weight: bold; }
        .container { margin-top: 20px; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/') ?>">Akademik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" 
                aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <!-- sisi kiri (nanti bisa diisi menu lain kalau perlu) -->
          <ul class="navbar-nav"></ul>

          <!-- sisi kanan -->
          <ul class="navbar-nav ms-auto">
            <?php if(session()->get('isLoggedIn')): ?>
                <li class="nav-item">
                  <span class="nav-link text-white">
                    Halo, <b><?= session()->get('full_name'); ?></b>
                    (<?= ucfirst(session()->get('role')); ?>)
                  </span>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-danger" href="<?= base_url('/logout') ?>">
                    <i class="bi bi-box-arrow-right"></i> Logout
                  </a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('/login') ?>">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                  </a>
                </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Konten utama -->
    <div class="container">
        <?php if(session()->getFlashdata('msg')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <!-- Section untuk tiap halaman -->
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
