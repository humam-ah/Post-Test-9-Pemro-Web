<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Test</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Post Test</h2>

    <?php 
    $nimErr = $namaErr = $alamatErr = $emailErr = $nohpErr = $prodiErr = "";
    $nim = $nama = $alamat = $email = $nohp = $prodi = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        if(empty($_POST["nim"])) {
            $nimErr = "masukkan NIM Anda!";
        } else {
            $nim = test_input($_POST["nim"]);
        }

        if(empty($_POST["nama"])) {
            $namaErr = "masukkan Nama Anda!";
        } else {
            $nama = test_input($_POST["nama"]);
        }

        if(empty($_POST["alamat"])) {
            $alamatErr = "masukkan Alamat Anda!";
        } else {
            $alamat = test_input($_POST["alamat"]);
        }

        if(empty($_POST["email"])) {
            $emailErr = "masukkan Email Anda!";
        } else {
            $email = test_input($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "yang Anda masukkan bukanlah Email!";
            }
        }

        if(empty($_POST["nohp"])) {
            $nohpErr = "masukkan No HP Anda!";
        } else {
            $nohp = test_input($_POST["nohp"]);
            if(!preg_match("/^[0-9]*$/", $nohp)) {
                $nohpErr = "hanya angka yang diperbolehkan!";
            }
        }

        if(empty($_POST["prodi"])) {
            $prodiErr = "pilih Prodi Anda!";
        } else {
            $prodi = test_input($_POST["prodi"]);
        }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }    
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        NIM: <input type="text" name="nim" value="<?php echo isset($_POST['nim']) ? $_POST['nim'] : ''; ?>">
        <span class="error">* <?php echo $nimErr;?></span><br><br>

        Nama: <input type="text" name="nama" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?>">
        <span class="error">* <?php echo $namaErr;?></span><br><br>

        Alamat: <input type="text" name="alamat" value="<?php echo isset($_POST['alamat']) ? $_POST['alamat'] : ''; ?>">
        <span class="error">* <?php echo $alamatErr;?></span><br><br>

        Email: <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        <span class="error">* <?php echo $emailErr;?></span><br><br>

        No HP: <input type="text" name="nohp" value="<?php echo isset($_POST['nohp']) ? $_POST['nohp'] : ''; ?>">
        <span class="error">* <?php echo $nohpErr;?></span><br><br>

        Prodi:
        <input type="radio" name="prodi" value="Teknik Informatika" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] == 'Teknik Informatika') ? 'checked' : ''; ?>>Teknik Informatika
        <input type="radio" name="prodi" value="Akuntansi Sektor Publik" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] == 'Akuntansi Sektor Publik') ? 'checked' : ''; ?>>Akuntansi Sektor Publik
        <input type="radio" name="prodi" value="Teknik Komputer" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] == 'Teknik Komputer') ? 'checked' : ''; ?>>Teknik Komputer
        <input type="radio" name="prodi" value="Teknik Elektro" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] == 'Teknik Elektro') ? 'checked' : ''; ?>>Teknik Elektro
        <input type="radio" name="prodi" value="Teknik Mesin" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] == 'Teknik Mesin') ? 'checked' : ''; ?>>Teknik Mesin
        <input type="radio" name="prodi" value="Desain Komunikasi Visual" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] == 'Desain Komunikasi Visual') ? 'checked' : ''; ?>>Desain Komunikasi Visual
        <input type="radio" name="prodi" value="Perhotelan" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] == 'Perhotelan') ? 'checked' : ''; ?>>Perhotelan
        <input type="radio" name="prodi" value="Akuntansi" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] == 'Akuntansi') ? 'checked' : ''; ?>>Akuntansi
        <input type="radio" name="prodi" value="Farmasi" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] == 'Farmasi') ? 'checked' : ''; ?>>Farmasi
        <input type="radio" name="prodi" value="Keperawatan" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] == 'Keperawatan') ? 'checked' : ''; ?>>Keperawatan
        <input type="radio" name="prodi" value="Kebidanan" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] == 'Kebidanan') ? 'checked' : ''; ?>>Kebidanan
        <span class="error">* <?php echo $prodiErr;?></span><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) && empty($nimErr) && empty($namaErr) && empty($alamatErr) && empty($emailErr) && empty($nohpErr) && empty($prodiErr)) {
        echo "NIM: ". $nim ."<br>";
        echo "Nama: ". $nama ."<br>";
        echo "Alamat: ". $alamat ."<br>";
        echo "Email: ". $email ."<br>";
        echo "No HP: ". $nohp ."<br>";
        echo "Prodi: ". $prodi ."<br>";
    }
    ?>

    <footer>
        <p>Dibuat dengan <span>❤</span> oleh Humam Asathin Haqqani (22090165)</p>
    </footer>
</body>
</html>