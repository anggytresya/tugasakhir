<?php
session_start();
// membuat koneksi ke databases

$conn = mysqli_connect("localhost","root","","gereja");

//Menambah data Jemaat baru

if(isset($_POST['inputjemaat'])){
    $idjemaat = $_POST['id'];
    $nama = $_POST['nama'];
    $jankel = $_POST['jenkel'];
    $nohp = $_POST['nohp'];
    $tptlhr = $_POST['tptlhr'];
    $tgllahir = $_POST['tgllahir'];
    $thnbts = $_POST['thnbts'];

    $input = mysqli_query($conn, "insert into datajemaat(idjemaat, nama, jeniskelamin, nohp, tempatlahir, tgllahir, tahunbabtis) values('$idjemaat','$nama','$jankel','$nohp','$tptlhr','$tgllahir','$thnbts') ");
    if($input){
        header('location:index.php');
    }else{
        echo 'gagal';
        header('location:index.php');
    }
}
// input data keuangan
if(isset($_POST['inputkeuangan'])){
    $no = $_POST['no'];
    $ibadahut = $_POST['ibadahut'];
    $prspa = $_POST['prspa'];
    $dansos = $_POST['dansos'];
    $pengeluaran = $_POST['pengeluaran'];
    $total= $_POST['total'];
   
    $input = mysqli_query($conn, "insert into datakeuangan(No_faktur, ibadahutama, prspa, danasosial, pengeluaran, totalmingguan) values('$no','$ibadahut','$prspa','$dansos','$pengeluaran','$total') ");
    if($input){
        header('location:datakeuangan.php');
    }else{
        echo 'gagal';
        header('location:datakeuangan.php');
    }
}
//input data kegiatan
if(isset($_POST['inputkegiatan'])){
    $nojad = $_POST['nojad'];
    $tanggal = $_POST['tanggal'];
    $hari = $_POST['hari'];
    $tempat = $_POST['tempat'];
    $keterangan = $_POST['keterangan'];
    
   
    $input = mysqli_query($conn, "insert into jadwal(nojadwal, tanggal, hari, tempat, keterangan) values('$nojad','$tanggal','$hari','$tempat','$keterangan') ");
    if($input){
        header('location:jadwalkegiatan.php');
    }else{
        echo 'gagal';
        header('location:jadwalkegiatan.php');
    }
}
//INPUT DATA BABTIS
if(isset($_POST['inputbabtis'])){
    $idbab =$_POST['nobab'];
    $jemaat =$_POST['jemaatnya'];
    $tgl=$_POST['tglbabtis'];
    $pdt=$_POST['pdtbabtis'];

    $masukdata = mysqli_query($conn, "insert into babtis(no_babtis, tglbabtis, pendetapembabtis, idjemaat) values('$idbab','$tgl','$pdt','$jemaat')");
    if($masukdata){
        header('location:babtis.php');
    }else{
        echo 'gagal';
        header('location:babtis.php');
    }
}
//update babtis
if(isset($_POST['updatebabtis'])){
    $nobts = $_POST['nobab'];
    $tglny = $_POST['tglbts'];
    $pdtnya = $_POST['pdt'];

    $updatebts= mysqli_query($conn, "update babtis set tglbabtis='$tglny', pendetapembabtis='$pdtnya' where no_babtis='$nobts'");
    if($updatebts){
        header('location:babtis.php');
        }else{
    echo 'gagal';
    header('location:babtis.php');
    }
}
//hapus babtis
if(isset($_POST['hapusbabtis'])){
    $nobts = $_POST['nobts'];
    $hapus=mysqli_query($conn, "delete from babtis where no_babtis='$nobts'");
    if($hapus){
        header('location:babtis.php');
        }else{
    echo 'gagal';
    header('location:babtis.php');
    }
}

//update data jemaat
if(isset($_POST['updatedata'])){
    $idjemaat = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenkel'];
    $nohp = $_POST['notlp'];
    $tempat = $_POST['tptlhr'];
    $tgl = $_POST['tgllahir'];
    $tahun = $_POST['thnbts'];


    $update = mysqli_query($conn, "update datajemaat set nama='$nama', jeniskelamin='$jenis', nohp='$nohp', tempatlahir='$tempat', tgllahir='$tgl', tahunbabtis='$tahun' where idjemaat='$idjemaat' ");
    if($update){
        header('location:index.php');
        }else{
    echo 'gagal';
    header('location:index.php');
    }
}
//hapus data jemaat
if(isset($_POST['hapusdata'])){
    $idjemaat = $_POST['idjemaat'];
    $hapus=mysqli_query($conn, "delete from datajemaat where idjemaat='$idjemaat'");
    if($hapus){
        header('location:index.php');
        }else{
    echo 'gagal';
    header('location:index.php');
    }
}
//update data jadwal kegiatan
if(isset($_POST['updatejadwal'])){
    $nojad = $_POST['nojad'];
    $tgl = $_POST['tanggal'];
    $hari = $_POST['hari'];
    $tempat = $_POST['tempat'];
    $keterangan = $_POST['keterangan'];
 
    $update = mysqli_query($conn, "update jadwal set tanggal='$tgl', hari='$hari', tempat='$tempat', keterangan='$keterangan' where nojadwal='$nojad' ");
    if($update){
        header('location:jadwalkegiatan.php');
        }else{
    echo 'gagal';
    header('location:jadwalkegiatan.php');
    }
}
//hapus data jadwal
if(isset($_POST['hapusjadwal'])){
    $nojad = $_POST['nojad'];
    $hapus=mysqli_query($conn, "delete from jadwal where nojadwal='$nojad'");
    if($hapus){
        header('location:jadwalkegiatan.php');
        }else{
    echo 'gagal';
    header('location:jadwalkegiatan.php');
    }
}
//update data keuangan
if(isset($_POST['updateuang'])){
    $no = $_POST['no'];
    $ibadah = $_POST['ibadahut'];
    $prspa = $_POST['prspa'];
    $dansos = $_POST['dansos'];
    $pengeluaran= $_POST['pengeluaran'];
    $total= $_POST['total'];
 
    $update = mysqli_query($conn, "update datakeuangan set ibadahutama='$ibadah', prspa='$prspa', danasosial='$dansos', pengeluaran='$pengeluaran', totalmingguan='$total' where No_faktur='$no' ");
    if($update){
        header('location:datakeuangan.php');
        }else{
    echo 'gagal';
    header('location:datakeuangan.php');
    }
}

//hapus data keuangan
if(isset($_POST['hapusuang'])){
    $no = $_POST['no'];
    $hapus=mysqli_query($conn, "delete from datakeuangan where No_faktur='$no'");
    if($hapus){
        header('location:datakeuangan.php');
        }else{
    echo 'gagal';
    header('location:datakeuangan.php');
    }
}
?>