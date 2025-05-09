<?php
        require_once "database.php";
        $sql = "SELECT * FROM notes";
        $hasil = $db->query($sql);



        if(isset($_POST['kirim'])) {
            $penulis = $_POST['penulis'];
            $deskripsi = $_POST['pesan'];
            $tanggal = $_POST['tanggal'];

            $tambah = "INSERT INTO notes(penulis, deskripsi, tanggal) VALUES ('$penulis', '$deskripsi', '$tanggal')";
            if ($db->query($tambah)) {
                header("Location: index.php");
            }
            else {
                echo "Gagal menambahkan";
            }
        }
        


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RizzzNotes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
            <h1><a href="index.php">RizzzNotes</a></h1>

            

            <div class="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                </ul>
            </div>

       
    </header>





    <h1 style="background-color: yellow; text-align: center; color: white">luapkan emosimu disini</h1>

    <br>
    <div class="kirim">
        <form action="" method="post">
            <label for="">Penulis</label>
            <input type="text" name='penulis' required>
            <label for="">Pesan</label>
            <input type="text" name='pesan' required>
            <label for="">Tanggal</label>
            <input type="date" name='tanggal' required>
            <button name='kirim' style="width: 100px; height: 20px">Kirim</button>
   
          
        </form>
        

     
    </div>







    <div class="container">


<?php $angka = 1; while($row = $hasil->fetch_assoc()): ?>


        <div class="card">
            <h3>Catatan <?= $angka++ ?></h3>
            <hr>
            <br>
            <p><?= $row['deskripsi']  ?></p>
            <br>
            <p><?= $row['penulis'] ?></p>
            <p><?= $row['tanggal']  ?></p>
        </div>
        <?php endwhile ?>

        </div>



</body>
</html>