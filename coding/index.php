<!DOCTYPE html>
<html lang="en">
<?php include "header.php" ?>

<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper {
            width: 650px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Data Barang</h2>
                        <a href="tambah.php" class="btn btn-success pull-right">Tambah Baru</a>
                    </div>

                    <?php
                    // Include config file
                    // Attempt select query execution
                    $sql = "SELECT * FROM data_barang";
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Gambar</th>";
                            echo "<th>Nama Barang</th>";
                            echo "<th>Kategori</th>";
                            echo "<th>Harga Beli</th>";
                            echo "<th>Harga Jual</th>";
                            echo "<th>Stok</th>";
                            echo "<th>Aksi</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td><img src='images/" . $row['nama'] . "' width='50' height='50'></td>";
                                echo "<td>" . $row['nama'] . "</td>";
                                echo "<td>" . $row['kategori'] . "</td>";
                                echo "<td>" . $row['harga_beli'] . "</td>";
                                echo "<td>" . $row['harga_jual'] . "</td>";
                                echo "<td>" . $row['stok'] . "</td>";
                                echo "<td>";
                                echo "<a href='ubah.php?id=" . $row['id_barang'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "<a href='hapus.php?id=" . $row['id_barang'] . "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include "footer.php" ?>

</html>