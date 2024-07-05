<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Manajemen Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Manajemen Produk</h1>
        <a href="/dashboard/create" class="btn btn-primary mb-3">Tambah Produk</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produks as $produk): ?>
                <tr>
                    <td><?= $produk['id'] ?></td>
                    <td><?= $produk['kode_produk'] ?></td>
                    <td><?= $produk['nama_produk'] ?></td>
                    <td><?= $produk['harga'] ?></td>
                    <td>
                        <?php if ($produk['image']): ?>
                            <img src="<?= base_url('uploads/' . $produk['image']) ?>" alt="<?= $produk['nama_produk'] ?>" style="width: 100px;">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="/dashboard/edit/<?= $produk['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="/dashboard/delete/<?= $produk['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
