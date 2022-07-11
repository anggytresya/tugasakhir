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
        <title>Data Keuangan</title>
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
                        <h1 class="mt-4">DATA KEUANGAN</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">MENU INPUT DATA KEUANGAN</li>

                        </ol>
                    </div>
                       
                    <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah Data
                                </button>
                                <a href="cetak1.php" class="btn btn-info">Cetak Data</a>
        
     
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Faktur</th>
                                            <th>Ibadah Utama</th>
                                            <th>Persembahan PA</th>
                                            <th>Dana Sosial</th>
                                            <th>Pengeluaran</th>
                                            <th>Total</th>
                                            
                                           
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php
                                        $i= 1;
                                        $ambilsemuadata = mysqli_query($conn,"select * from datakeuangan");
                                        while($data=mysqli_fetch_array($ambilsemuadata)){
                                            
                                            $no = $data['No_faktur'];
                                            $ibadah = $data['ibadahutama'];
                                            $prspa= $data['prspa'];
                                            $dansos= $data['danasosial'];
                                            $pengeluaran= $data['pengeluaran'];
                                            $total= $data['totalmingguan'];
                                           

                                        


                                        ?>
                                        <tr>
                                            <td><?=$i++; ?></td>
                                            <td><?=$no;?></td>
                                            <td><?=$ibadah;?></td>
                                            <td><?=$prspa;?></td>
                                            <td><?=$dansos;?></td>
                                            <td><?=$pengeluaran;?></td>
                                            <td><?=$total;?></td>
                                            
                                            <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editdata<?=$no;?>">
                                        Edit
                                    </button>
                                    <input type="hidden" name="no" value="<?=$no;?>">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete<?=$no;?>">
                                        Delete
                                    </button>
                                            </td>
                                        </tr>
                                        

                                            <!-- The Modal edit-->
                                            <div class="modal" id="editdata<?=$no;?>">
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
                                                <input type="text" name="no" value="<?=$no?>" class="form-control" required><br>
                                                <input type="text" name="ibadahut" value="<?=$ibadah?>"  class="form-control" required><br>
                                                <input type="text" name="prspa" value="<?=$prspa?>"  class="form-control" required><br>
                                                <input type="text" name="dansos" value="<?=$dansos?>" class="form-control" required><br>
                                                <input type="text" name="pengeluaran" value="<?=$pengeluaran?>" class="form-control" required><br>
                                                <input type="text" name="total" value="<?=$total?>" class="form-control" required><br>
                                                    <input type="hidden" name="no" value="<?=$no;?>">
                                                            <button type="submit" class="btn btn-primary" name="updateuang">edit</button>
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
                                            <div class="modal" id="delete<?=$no;?>">
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
                                                    Apakah Anda Yakin Menghapus Data keuangan dengan nomor faktur <?=$no;?>?
                                                    <input type="hidden" name="no" value="<?=$no;?>">
                                                    <br>
                                                    <br>
                                                            <button type="submit" class="btn btn-primary" name="hapusuang">Hapus</button>
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
        <h4 class="modal-title">Input Data Keuangan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
            <div class="modal-body">
            <input type="text" name="no" placeholder="No Faktur" class="form-control" required><br>
            <input type="text" name="ibadahut" placeholder="Pemasukan Ibadah Utama" class="form-control" required><br>
            <input type="text" name="prspa" placeholder="Persembahan Ibadah Sekunder" class="form-control" required><br>
            <input type="text" name="dansos" placeholder="Dana Sosial" class="form-control" required><br>
            <input type="text" name="pengeluaran" placeholder="Pengeluaran Mingguan" class="form-control" required><br>
            <input type="text" name="total" placeholder="Total Mingguan" class="form-control" required><br>
            <button type="submit" class="btn btn-primary" name="inputkeuangan">Submit</button>
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
