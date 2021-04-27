<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="card">
        <div class="card-header">
            form ubah data nilai mahasiswa
        </div>
        <div class="card-body">
            <?php if( validation_errors() ) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo validation_errors();?>
            </div>
            <?php endif; ?>
            <form action="" method="post">
                <input type="hidden" name='ID' value="<?= $mahasiswa['ID']; ?>">
                <div class="form-group">
                    <label for="NAMA">NAMA</label>
                    <input type="text" class="form-control" id="NAMA" value="<?= $mahasiswa['NAMA'];?>" name="NAMA">
                </div>
                <div class="form-group">
                    <label for="Statistik">Statistik</label>
                    <input type="number" class="form-control" id="Statistik" value="<?= $mahasiswa['Statistik'];?>"
                        name="Statistik">
                </div>
                <div class="form-group">
                    <label for="Teknologi_Web">Tek. WEB</label>
                    <input type="number" class="form-control" id="Teknologi_Web"
                        value="<?= $mahasiswa['Teknologi_Web'];?>" name="Teknologi_Web">
                </div>
                <div class="form-group">
                    <label for="Teknologi_Komputer">Tek. Komputer</label>
                    <input type="number" class="form-control" id="Teknologi_Komputer"
                        value="<?= $mahasiswa['Teknologi_Komputer'];?>" name="Teknologi_Komputer">
                </div>
                <div class="form-group">
                    <label for="Basis_Data">Basis Data</label>
                    <input type="number" class="form-control" id="Basis_Data" value="<?= $mahasiswa['Basis_Data'];?>"
                        name="Basis_Data">
                </div>
                <a href="<?= base_url();?>mahasiswa/index" class="btn btn-secondary">Cancel</a>

                <button type="submit" name="ubah" class="btn btn-primary ">ubah data</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->