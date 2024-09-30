<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<!-- header -->
 <div class="header">

 <img class="logo" src="logo2.png" alt="">
<p> Data Siswa Kelas XII RPL </p>
<p> SMK Negeri 1 Tengaran </p>

 </div>
 <hr>
 
 <!--  -->

<!-- formulir -->
 <div class="formulir">
    <form action="" method="post" >
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="" require>
        
        <label for="nama">Alamat</label>
        <input type="text" name="alamat" id="" require>

        <label for="">Tempat Lahir</label>
        <input type="text" name="tempatlahir" id="" require>
        
        <label for="">Tanggal Lahir</label>
        <input type="date" name="tanggallahir" id="" require>
        
        <label for="">Email</label>
        <input type="email" name="email" id="" require>
        
                
        <label for="">Agama</label>
        <select name="agama" id="">
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Budha">Budha</option>
            <option value="Katholik">Katholik</option>
            <option value="Hindu">Hindu</option>
        </select>

        <button class="tombol" name="submit" type="submit">Simpan</button>
    </form>
<?php

$file='data.json';
$ambildata = file_get_contents($file);
$datasiswa = json_decode($ambildata,true);

if (isset($_POST['submit'])) {
    $namasiswa = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = $_POST['tanggallahir'];
    $email = $_POST['email'];
    $agama = $_POST['agama'];

    $datasiswa[] = [
     "nama" => "$namasiswa",   
     "alamat" => "$alamat",   
     "tempatlahir" => "$tempatlahir",   
     "tanggallahir" => "$tanggallahir",   
     "email" => "$email",   
     "agama" => "$agama"   
    ];

}

$simpan  = json_encode($datasiswa);
file_put_contents($file,$simpan);


?>


</div>

  <!-- konten -->
   <div class="tampildata">
    <table>
        <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Email</th>
        <th>Agama</th>
        </tr>
<?php
$no=0;

// $datasiswa= json_decode(file_get_contents($file),true );

foreach ($datasiswa as $key => $value) {
    $no++;
    echo "<tr>";
    echo "<td>". $no. "</td>";
    echo "<td>". $value['nama'] ."</td>";
    echo "<td>".$value['alamat']."</td>";
    echo "<td>".$value['tempatlahir']."</td>";
    echo "<td>".$value['tanggallahir']."</td>";
    echo "<td>".$value['email']."</td>";
    echo "<td>".$value['agama']."</td>";
    echo "</tr>";
}



?>
    </table>

   </div>
   <!--  -->
    
</body>
</html>