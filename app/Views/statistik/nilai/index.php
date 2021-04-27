<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-md-8">

        <table class="table table-bordered">
            <h3>Nilai Max</h3>
            <thead>
                <tr>

                    <th> Nilai Max STATISTIK</th>
                    <th>Nilai Max Tek. Web</th>
                    <th>Nilai Max Tek. Komp</th>
                    <th>Nilai Max Basis data</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $max->Statistik ?></td>
                    <td><?php echo $maxtw->Teknologi_Web ?></td>
                    <td><?php echo $maxtk->Teknologi_Komputer ?></td>
                    <td><?php echo $maxbd->Basis_Data ?></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
<div class="col-md-8">

    <table class="table table-bordered">
        <h3>Nilai Min</h3>
        <thead>
            <tr>

                <th> Nilai Min STATISTIK</th>
                <th>Nilai Min Tek. Web</th>
                <th>Nilai Min Tek. Komp</th>
                <th>Nilai Min Basis data</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $min->Statistik ?></td>
                <td><?php echo $mintw->Teknologi_Web ?></td>
                <td><?php echo $mintk->Teknologi_Komputer ?></td>
                <td><?php echo $minbd->Basis_Data ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-md-8">

    <table class="table table-bordered">
        <h3>Nilai rata-rata</h3>
        <thead>
            <tr>

                <th> Nilai rata-rata STATISTIK</th>
                <th>Nilai rata-rata Tek. Web</th>
                <th>Nilai rata-rata Tek. Komp</th>
                <th>Nilai rata-rata Basis data</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $rata_rata->Statistik ?></td>
                <td><?php echo $rata_ratatw->Teknologi_Web ?></td>
                <td><?php echo $rata_ratatk->Teknologi_Komputer ?></td>
                <td><?php echo $rt->Basis_Data ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-md-8">
    <table class="table table-bordered">
        <h3>Frekuensi nilai Statistik</h3>
        <thead>
            <tr>

                <th> Nilai STATISTIK</th>
                <th>Frekuensi</th>


            </tr>
        </thead>
        <tbody>
            <?php foreach($frek1->result_array() as $row):
                        $Statistik = $row['Statistik'];
                        $total = $row['total'];?>
            <tr>
                <td><?php echo htmlentities($Statistik, ENT_QUOTES, 'UTF-8');?></td>
                <td><?php echo htmlentities($total , ENT_QUOTES, 'UTF-8');?></td>



            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->