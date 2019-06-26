<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_pembeli");

    if($koneksi){
        //echo "Alhamdulillah sudah terkoneksi";
    }else{
        echo "Aduh, gagal nih gan";
    }
?>
<body bgcolor="yellow"></body>

<h1>Tampilan Menginput Data Pembeli</h1>
<h3>Aghil Fanggi</h3>
<h4>E1E118007</h4>
<form action="" method="post">
<table bgcolor="yellow" border="2">
    <tr>
        <td>Nama  </td>
        <td><input type="text" name="Nama"></td>
    </tr>
    <tr>
        <td>Alamat  </td>
        <td><input type="text" name="Alamat"></td>
    </tr>
    <tr>
        <td>Nomor Telepon  </td>
        <td><input type="number" name="No_hp"></td>
    </tr>
</table>
    <input type="submit" name="registrasi" value="Registrasi">
</form>
<h1>Hasil Input Data Pembeli</h1>
<table border="1">
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>
        <th>Aksi</th>
    </thead>
    <tbody>

        <?php
            $sqlView = "SELECT * FROM `pembeli`";
            $cekView = mysqli_query($koneksi, $sqlView);

            $nomor = 1;
            while($data = mysqli_fetch_array($cekView)){
        ?>
        <tr>
            <td><?=$nomor ?></td>
            <td><?=$data[1] ?></td>
            <td><?=$data[2] ?></td>
            <td><?=$data[3] ?></td>
            <td>
                <a href="aghil.php?id=<?=$data[0]?>">Delete</a>
            </td>
        </tr>
        <?php
            $nomor++; // ++ = nomor+1; 
            }
        ?>
    <!-- /end -->
    </tbody>
</table>

<?php
    if(isset($_POST['registrasi'])){
        $sqlInput = "INSERT INTO `pembeli` (`Nama`,`Alamat`,`No_hp`)
                VALUES ('$_POST[Nama]','$_POST[Alamat]','$_POST[No_hp]')";
        $cekInput = mysqli_query($koneksi, $sqlInput);
        if($cekInput){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'aghil.php' </script>";
        }else{
            echo "Aduh.. Gagal masuk datanya gan";
        }
    }

    if(isset($_GET['id'])){
        $sqlDelete = "DELETE FROM `pembeli` WHERE
        `pembeli`.`id` = '$_GET[id]'";
        $cekDelete = mysqli_query($koneksi, $sqlDelete);

        if($cekDelete){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'aghil.php' </script>";
        }else{
            echo "Aduh.. Gagal ngehapus datanya gan";
        }
    }
?>