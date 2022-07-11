<?php
require 'function.php';
require 'cek.php';
ob_start();
?>
<html>
<head>
  <title>Data Babtis</title>
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
			<h2>Babtis</h2>
			<h4>(Data Babtis)</h4>
				<div class="data-tables datatable-dark">
					
        <table id="mauexport" >
        <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>ID BABTIS</th>
                                            <th>NAMA JEMAAT</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tanggal Babtis</th>
                                            <th>Pendeta Pembabtis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i= 1;
                                        $ambilsemuababtis = mysqli_query($conn,"select * from babtis , datajemaat ");
                                        while($data=mysqli_fetch_array($ambilsemuababtis)){
                                            
                                            $nobts = $data['no_babtis'];
                                            $namany = $data['nama'];
                                            $tempatny= $data['tempatlahir'];
                                            $tglny= $data['tgllahir'];
                                            $tglbtsny=$data['tglbabtis'];
                                            $pdtny=$data['pendetapembabtis'];



                                        ?>
                                        <tr>
                                            <td><?=$i++; ?></td>
                                            <td><?php echo $nobts;?></td>
                                            <td><?php echo$namany;?></td>
                                            <td><?php echo$tempatny;?></td>
                                            <td><?php echo$tglny;?></td>
                                            <td><?php echo$tglbtsny;?></td>
                                            <td><?php echo$pdtny;?></td>
                                       
                                        </tr>
                                        

                                            <

                                            
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