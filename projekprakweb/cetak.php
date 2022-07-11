<?php
require 'function.php';
require 'cek.php';
ob_start();
?>
<html>
<head>
  <title>Data Jemaat</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Jemaat</h2>
			<h4>(Data jemaat)</h4>
				<div class="data-tables datatable-dark">
					
        <table id="mauexport" >
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>ID Jemaat</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No HP</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tahun Babis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i= 1;
                                        $ambilsemuadata = mysqli_query($conn,"select * from datajemaat");
                                        while($data=mysqli_fetch_array($ambilsemuadata)){
                                            
                                            $idjemaat = $data['idjemaat'];
                                            $nama = $data['nama'];
                                            $jenis= $data['jeniskelamin'];
                                            $nohp= $data['nohp'];
                                            $tempat= $data['tempatlahir'];
                                            $tgl= $data['tgllahir'];
                                            $tahun= $data['tahunbabtis'];

                                        


                                        ?>
                                        <tr>
                                            <td><?=$i++; ?></td>
                                            <td><?php echo $idjemaat;?></td>
                                            <td><?php echo$nama;?></td>
                                            <td><?php echo$jenis;?></td>
                                            <td><?php echo$nohp;?></td>
                                            <td><?php echo$tempat;?></td>
                                            <td><?php echo$tgl;?></td>
                                            <td><?php echo$tahun;?></td>
                                        </tr>
                                        

                                            
                                       <?php
                                       };
                                       ?>
                                    </tbody>
                                </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>