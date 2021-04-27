<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <?php if( validation_errors() ) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo validation_errors();?>
            </div>
            <?php endif; ?>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?php if($this->session->flashdata('flash') ) : ?>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Nilai Mahasiswa <strong>Berhasil!</strong><?=$this->session->flashdata('flash'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

            </div>



            <?php endif; ?>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal"
                data-target="#exampleModal">
                Tambah Data Mahasiswa
            </button>
            <div class="row mt-3">
                <div class="col-md-6">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Data Mahasiswa.." name="keyword"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2">cari</button>
                        </div>
                    </form>
                </div>
            </div>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAME</th>
                        <th scope="col">STATISTIK</th>
                        <th scope="col">Tek. Web</th>
                        <th scope="col">Tek. Komp</th>
                        <th scope="col">Basis data</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($mahasiswa as $mhs) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $mhs['NAMA']?></td>
                        <td><?= $mhs['Statistik']?></td>
                        <td><?= $mhs['Teknologi_Web']?></td>
                        <td><?= $mhs['Teknologi_Komputer']?></td>
                        <td><?= $mhs['Basis_Data']?></td>
                        <td><a href="<?= base_url(); ?>mahasiswa/ubah/<?= $mhs['ID'];?>"
                                class="badge bg-primary tampilModalUbah text-white" ?>edith</a>
                            <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['ID'];?>"
                                class="badge bg-danger text-white">hapus</a>

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

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url(); ?>/mahasiswa/tambah" method="post">
                    <div class="form-group">
                        <label for="NAMA">NAMA</label>
                        <input type="text" input=" " class="form-control" id="nama" name="NAMA">
                        <input type="hidden" name="ID" id="id">
                    </div>
                    <div class="form-group">
                        <label for="Statistik">Statistik</label>
                        <input type="number" input=" " class="form-control" id="Statistik" name="Statistik">
                    </div>
                    <div class="form-group">
                        <label for="Teknologi_Web">Tek. WEB</label>
                        <input type="number" input=" " class="form-control" id="Teknologi_Web" name="Teknologi_Web">
                    </div>
                    <div class="form-group">
                        <label for="Teknologi_Komputer">Tek. Komputer</label>
                        <input type="number" input=" " class="form-control" id="Teknologi_Komputer"
                            name="Teknologi_Komputer">
                    </div>
                    <div class="form-group">
                        <label for="Basis_Data">Basis Data</label>
                        <input type="number" input=" " class="form-control" id="Basis_Data" name="Basis_Data">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>