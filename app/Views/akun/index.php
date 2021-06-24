<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <?php if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Berhasil <?php session()->getFlashdata('message'); ?></strong>
        </div>
        <script>
            $(".alert").alert();
        </script>
    <?php endif; ?>



    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                Tambah Data Akun</button>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>

                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($akun as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['password'] ?></td>
                            <td><?= $row['nama_lengkap'] ?></td>
                            <td><?= $row['tanggal_lahir'] ?></td>
                            <td><?= $row['jenis_kelamin'] ?></td>

                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalUbah" class="btn btn-sm btn-warning" id="btn-edit" data-id="<?= $row['id']; ?>" data-username="<?= $row['username']; ?>" data-password="<?= $row['password']; ?>"><i class=" fa fa-edit"></i></button>
                                <button type="button" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>

            </table>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('akun/tambah'); ?>" method="post">
                    <div class="form-group mb-0">
                        <label for="username"></label>
                        <input type="text" name="username" id="usernmae" class="form-control" placeholder="Masukan Username">
                    </div>
                    <div class="form-group mb-0">
                        <label for="password"> </label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
                    </div>
                    <div class="form-group mb-0">
                        <label for="nama_lengkap"></label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukan Nama Lengkap">
                    </div>
                    <div class="form-group mb-0">
                        <label for="tanggal_lahir"></label>
                        <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="Masukan Tanggal Lahir">
                    </div>
                    <div class="form-group mb-0">
                        <label for="jenis_kelamin"></label>
                        <input type="radio" name="jenis_kelamin" value="Pria"> Pria
                        <input type="radio" name="jenis_kelamin" value="Wanita"> Wanita
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalHapus">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/akun/hapus/<?= $row['id']; ?>" class="btn btn-primary"> Yakin</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUbah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('akun/ubah'); ?>" method="post">

                    <div class="form-group mb-0">
                        <label for="username"></label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" value=<?= $row['username'] ?>>
                    </div>
                    <div class="form-group mb-0">
                        <label for="password"> </label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" value=<?= $row['password'] ?>>
                    </div>
                    <div class="form-group mb-0">
                        <label for="nama_lengkap"></label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukan Nama Lengkap" value=<?= $row['nama_lengkap'] ?>>
                    </div>
                    <div class="form-group mb-0">
                        <label for="tanggal_lahir"></label>
                        <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="Masukan Tanggal Lahir" value=<?= $row['tanggal_lahir'] ?>>
                    </div>
                    <div class="form-group mb-0">
                        <label for="jenis_kelamin"></label>
                        <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" placeholder="Masukan Jenis Kelamin" value=<?= $row['jenis_kelamin'] ?>>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>