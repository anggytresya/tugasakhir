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
        <title>Jadwal Kegiatan</title>
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
                        <h1 class="mt-4">JADWAL KEGIATAN</h1>
                 
                       
                       
                            

                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                               Tambah Data
                            </button>
                            <a href="cetak2.php" class="btn btn-info">Cetak Data</a>
        
     
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Jadwal</th>
                                            <th>Tanggal</th>
                                            <th>Hari</th>
                                            <th>Tempat</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php
                                        $i= 1;
                                        $ambilsemuadata = mysqli_query($conn,"select * from jadwal");
                                        while($data=mysqli_fetch_array($ambilsemuadata)){
                                            
                                            $nojad = $data['nojadwal'];
                                            $tgl = $data['tanggal'];
                                            $hari= $data['hari'];
                                            $tempat= $data['tempat'];
                                            $keterangan= $data['keterangan'];
                                            

                                        


                                        ?>
                                        <tr>
                                            <td><?=$i++; ?></td>
                                            <td><?=$nojad;?></td>
                                            <td><?=$tgl;?></td>
                                            <td><?=$hari;?></td>
                                            <td><?=$tempat;?></td>
                                            <td><?=$keterangan;?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editdata<?=$nojad;?>">
                                                    Edit
                                                </button>
                                                <input type="hidden" name="idjemaatyangdihapus" value="<?=$nojad;?>">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete<?=$nojad;?>">
                                                    Delete
                                                </button>
                                        </td>
                                        </tr>
                                   
                                           
                                        </tr>
                                        

                                            <!-- The Modal edit-->
                                            <div class="modal" id="editdata<?=$nojad;?>">
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
                                                <input type="text" name="nojad" value="<?=$nojad?>" class="form-control" required><br>
                                                <input type="text" name="tanggal" value="<?=$tgl?>" class="form-control" required><br>
                                                <input type="text" name="hari" value="<?=$hari?>" class="form-control" required><br>
                                                <input type="text" name="tempat" value="<?=$tempat?>" class="form-control" required><br>
                                                <input type="text" name="keterangan" value="<?=$keterangan?>" class="form-control" required><br>
                                                <input type="hidden" name="nojad" value="<?=$nojad;?>">
                                                            <button type="submit" class="btn btn-primary" name="updatejadwal">edit</button>
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
                                            <div class="modal" id="delete<?=$nojad;?>">
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
                                                    Apakah Anda Yakin Menghapus Data pada tanggal <?=$tgl;?>?
                                                    <input type="hidden" name="nojad" value="<?=$nojad;?>">
                                                    <br>
                                                    <br>
                                                            <button type="submit" class="btn btn-primary" name="hapusjadwal">Hapus</button>
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
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
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
        <h4 class="modal-title">Input Jadwal Kegiatan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
            <div class="modal-body">
            <input type="text" name="nojad" placeholder="No Jadwal" class="form-control" required><br>
            <input type="text" name="tanggal" placeholder="Tanggal" class="form-control" required><br>
            <input type="text" name="hari" placeholder="Hari" class="form-control" required><br>
            <input type="text" name="tempat" placeholder="Tempat" class="form-control" required><br>
            <input type="text" name="keterangan" placeholder="Keterangan" class="form-control" required><br>
            <button type="submit" class="btn btn-primary" name="inputkegiatan">Submit</button>
            </div>
        </form>
      <!-- Modal footer -->
      <div class="modal-footer">
      
      </div>

    </div>
  </div>
</div>
    </body>
</html>
