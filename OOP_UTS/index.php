<?php
use Master\Pelatih;
use Master\Atlet;
use Master\Cabor;
use Master\Menu;

include('autoload.php');
include('Config/Database.php');

$menu = new Menu();
$pelatih = new Pelatih($dataKoneksi);
$tb_atlet = new Atlet($dataKoneksi);
$cabor = new Cabor($dataKoneksi);
$target = @$_GET['target'];
$act = @$_GET['act'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMAWANGI</title>
    <link rel="stylesheet" href="assters/boostrap/css/bootstrap.css">
    <script src="assters/boostrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
            <img src="logo.png" alt="Logo" height="40" class="d-inline-block align-text-top">
                <a class="navbar-brand" href="#">SIMAWANGI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MyMenu"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($menu->topMenu() as $r) {
                        ?>
                        <li class="nav-item">
                            <a href="<?php echo $r['Link']; ?>" class="nav-link">
                                <?php echo $r['Text']; ?>
                            </a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>
            <?php
            if (!isset($target) or $target == "home") {
                echo "Hai, Selamat datang di beranda";
                // start konten pelatih //
            } elseif ($target == "pelatih") {
                if ($act == "tambah_pelatih") {
                    echo $pelatih->tambah();
                } elseif ($act == "simpan_pelatih") {
                    if ($pelatih->simpan()) {
                        echo "<script>
                                alert('data sukses disimpan');
                                window.location.href='?target=pelatih';
                            </script>";
                    } else {
                        echo "<script>
                                alert('data gagal disimpan');
                                window.location.href='?target=pelatih';
                            </script>";
                    }
                } elseif ($act == "edit_pelatih") {
                    $id = $_GET['id'];
                    echo $pelatih->edit($id);
                } elseif ($act == "update_pelatih") {
                    if ($pelatih->update()) {
                        echo "<script>
                                alert('data sukses diubah');
                                window.location.href='?target=pelatih';
                            </script>";
                    } else {
                        echo "<script>
                                alert('data gagal diubah');
                                window.location.href='?target=pelatih';
                            </script>";
                    }
                } elseif ($act == "delete_pelatih") {
                    $id = $_GET['id'];
                    if ($pelatih->delete($id)) {
                        echo "<script>
                                alert('data sukses dihapus');
                                window.location.href='?target=pelatih';
                            </script>";
                    } else {
                        echo "<script>
                                alert('data gagal dihapus');
                                window.location.href='?target=pelatih';
                            </script>";
                    }
                } else {
                    echo $pelatih->index();
                }
                // end konten pelatih //
            } elseif ($target == "tb_atlet") {
                if ($act == "tambah_tb_atlet") {
                    echo $tb_atlet->tambah();
                } elseif ($act == "simpan_tb_atlet") {
                    if ($tb_atlet->simpan()) {
                        echo "<script>
                                alert('data sukses disimpan');
                                window.location.href='?target=tb_atlet';
                            </script>";
                    } else {
                        echo "<script>
                                alert('data gagal disimpan');
                                window.location.href='?target=tb_atlet';
                            </script>";
                    }
                } elseif ($act == "edit_tb_atlet") {
                    $id = $_GET['id'];
                    echo $tb_atlet->edit($id);
                } elseif ($act == "update_tb_atlet") {
                    if ($tb_atlet->update()) {
                        echo "<script>
                                alert('data sukses diubah');
                                window.location.href='?target=tb_atlet';
                            </script>";
                    } else {
                        echo "<script>
                                alert('data gagal diubah');
                                window.location.href='?target=tb_atlet';
                            </script>";
                    }
                } elseif ($act == "delete_tb_atlet") {
                    $id = $_GET['id'];
                    if ($tb_atlet->delete($id)) {
                        echo "<script>
                                alert('data sukses dihapus');
                                window.location.href='?target=tb_atlet';
                            </script>";
                    } else {
                        echo "<script>
                                alert('data gagal dihapus');
                                window.location.href='?target=tb_atlet';
                            </script>";
                    }
                } else {
                    echo $tb_atlet->index();
                }
                // end atlet
            } elseif ($target == "cabor") {
                if ($act == "tambah_cabor") {
                    echo $cabor->tambah();
                } elseif ($act == "simpan_cabor") {
                    if ($cabor->simpan()) {
                        echo "<script>
                                alert('data sukses disimpan');
                                window.location.href='?target=cabor';
                            </script>";
                    } else {
                        echo "<script>
                                alert('data gagal disimpan');
                                window.location.href='?target=cabor';
                            </script>";
                    }
                } elseif ($act == "edit_cabor") {
                    $id = $_GET['id'];
                    echo $cabor->edit($id);
                } elseif ($act == "update_cabor") {
                    if ($cabor->update()) {
                        echo "<script>
                                alert('data sukses diubah');
                                window.location.href='?target=cabor';
                            </script>";
                    } else {
                        echo "<script>
                                alert('data gagal diubah');
                                window.location.href='?target=cabor';
                            </script>";
                    }
                } elseif ($act == "delete_cabor") {
                    $id = $_GET['id'];
                    if ($cabor->delete($id)) {
                        echo "<script>
                                alert('data sukses dihapus');
                                window.location.href='?target=cabor';
                            </script>";
                    } else {
                        echo "<script>
                                alert('data gagal dihapus');
                                window.location.href='?target=cabor';
                            </script>";
                    }
                } else {
                    echo $cabor->index();
                }

                // no page
            } else {
                echo "Page 404 Not found";
            }
            ?>
        </div>
    </div>
</body>

</html>
