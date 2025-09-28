<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <h1>Dashboard</h1>
    <p>Selamat datang, <?= session()->get('username') ?>!</p>
<?= $this->endSection() ?>
