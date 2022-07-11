<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Web Gereja</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.PHP">KELOMPOK 5</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Daftar Menu</div>
                          
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                DATA JEMAAT
                            </a>
                            <a class="nav-link" href="datakeuangan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                DATA KEUANGAN
                            </a>
                            <a class="nav-link" href="jadwalkegiatan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                JADWAL KEGIATAN
                            </a>
                            <a class="nav-link" href="babtis.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                DATA BABTIS
                            </a>
                            <a class="nav-link" href="logout.php">
                               Logout
                              
                            </a>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">DATA JEMAAT</h1>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                               Tambah Data
                            </button>
                            <a href="cetak.php" class="btn btn-info">Cetak Data</a>
        
     
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
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
                                            <td><?=$idjemaat;?></td>
                                            <td><?=$nama;?></td>
                                            <td><?=$jenis;?></td>
                                            <td><?=$nohp;?></td>
                                            <td><?=$tempat;?></td>
                                            <td><?=$tgl;?></td>
                                            <td><?=$tahun;?></td>
                                            <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editdata<?=$idjemaat;?>">
                                        Edit
                                    </button>
                                    <input type="hidden" name="idjemaatyangdihapus" value="<?=$idjemaat;?>">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete<?=$idjemaat;?>">
                                        Delete
                                    </button>
                                            </td>
                                        </tr>
                                        

                                            <!-- The Modal edit-->
                                            <div class="modal" id="editdata<?=$idjemaat;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                <div class="modal-body">
                                                    <input type="text" name="id" value="<?=$idjemaat;?>" class="form-control" required><br>
                                                    <input type="text" name="nama" value="<?=$nama;?>" class="form-control" required><br>
                                                    <input type="text" name="jenkel" value="<?=$jenis;?>" class="form-control" required><br>
                                                    <input type="tel" name="notlp" pattern="^\d{12}$"  value="<?=$nohp;?>" class="form-control" required><br>
                                                    <input type="text" name="tptlhr" value="<?=$tempat;?>" class="form-control" required><br>
                                                    <input type="text" name="tgllahir" value="<?=$tgl;?>" class="form-control" required><br>
                                                    <input type="text" name="thnbts" value="<?=$tahun;?>" class="form-control" required><br>
                                                    <input type="hidden" name="idjemaat" value="<?=$idjemaat;?>">
                                                            <button type="submit" class="btn btn-primary" name="updatedata">edit</button>
                                                </div>
                                                </form>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>

                                                </div>
                                            </div>
                                            </div>

                                            
                                            <!-- The Modal delete-->
                                            <div class="modal" id="delete<?=$idjemaat;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                <div class="modal-body">
                                                    Apakah Anda Yakin Menghapus Data <?=$nama;?>?
                                                    <input type="hidden" name="idjemaat" value="<?=$idjemaat;?>">
                                                    <br>
                                                    <br>
                                                            <button type="submit" class="btn btn-primary" name="hapusdata">Hapus</button>
                                                </div>
                                                </form>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>

                                                </div>
                                            </div>
                                            </div>
                                       <?php
                                       };
                                       ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
              
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
     <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Input Data Jemaat</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
            <div class="modal-body">
                <input type="text" name="id" placeholder="ID Jemaat" class="form-control" required><br>
                <input type="text" name="nama" placeholder="Nama" class="form-control" required><br>
                <input type="text" name="jenkel" placeholder="Jenis Kelamin" class="form-control" required><br>
                <input type="tel" pattern="^\d{12}$"  name="nohp" placeholder="No.Hp xxxxxxxxxxxx" class="form-control" required><br>
                <input type="text" name="tptlhr" placeholder="Tempat Lahir" class="form-control" required><br>
                <input type="text" name="tgllahir" placeholder="Tanggal Lahir" class="form-control" required><br>
                <input type="text" name="thnbts" placeholder="Tahun Bab" class="form-control" required><br>
                <button type="submit" class="btn btn-primary" name="inputjemaat">Submit</button>
            </div>
        </form>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</body>
   
</html>
