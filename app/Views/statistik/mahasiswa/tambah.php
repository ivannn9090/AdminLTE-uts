<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card">
        <div class="card-header">
            form tambah data nilai mahasiswa
        </div>
        <div class="card-body">
            <?php if( validation_errors() ) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo validation_errors();?>
            </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="NAMA">NAMA</label>
                    <input type="text" class="form-control" id="NAMA" name="NAMA">
                </div>
                <div class="form-group">
                    <label for="Statistik">Statistik</label>
                    <input type="text" class="form-control" id="Statistik" name="Statistik">
                </div>
                <div class="form-group">
                    <label for="Teknologi_Web">Tek. WEB</label>
                    <input type="text" class="form-control" id="Teknologi_Web" name="Teknologi_Web">
                </div>
                <div class="form-group">
                    <label for="Teknologi_Komputer">Tek. Komputer</label>
                    <input type="text" class="form-control" id="Teknologi_Komputer" name="Teknologi_Komputer">
                </div>
                <div class="form-group">
                    <label for="Basis_Data">Basis Data</label>
                    <input type="text" class="form-control" id="Basis_Data" name="Basis_Data">
                </div>


                <a href="<?= base_url();?>mahasiswa/index" class="btn btn-secondary">Cancel</a>


                <button type="submit" name="tambah" class="btn btn-primary ">Tambah</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->