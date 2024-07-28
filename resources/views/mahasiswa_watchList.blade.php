
<!DOCTYPE html>
<?php
$data = array(
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Erzy Irvine Julian", "semester" => 8, "ipk" => 314, "sks" => 135, "tak" => 60),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Kania Namaga", "semester" => 8, "ipk" => 354, "sks" => 135, "tak" => 5),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Catur Rangga Hutapea", "semester" => 8, "ipk" => 260, "sks" => 135, "tak" => 21),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Emil Widodo", "semester" => 8, "ipk" => 301, "sks" => 135, "tak" => 1),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Ulya Hastuti", "semester" => 8, "ipk" => 300, "sks" => 135, "tak" => 0),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Diba Habibi", "semester" => 8, "ipk" => 390, "sks" => 135, "tak" => 78),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Maryadi Situmorang", "semester" => 8, "ipk" => 378, "sks" => 135, "tak" => 56),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Savina Purwanti", "semester" => 8, "ipk" => 322, "sks" => 135, "tak" => 51),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Dina Puspasari", "semester" => 8, "ipk" => 346, "sks" => 135, "tak" => 43),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Uli Aryani", "semester" => 8, "ipk" => 331, "sks" => 135, "tak" => 24),
);

?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Dashboard</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 ghost-col"></div>
            <div class="col-md-3 sidebar">
                <div class="telu"></div>
                <ul>
                    <li>
                        <a href="{{ route('main_dashboard') }}">
                            <i class="fa-solid fa-chart-simple"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa_wali') }}">
                            <i class="fa-solid fa-user-group"></i><span>Mahasiswa Wali</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa_mengulang') }}">
                            <i class="fa-solid fa-repeat"></i><span>Mahasiswa Mengulang</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            <i class="fa-regular fa-eye active-icon"></i><span>Mahasiswa Watchlist</span>
                        </a>
                    </li>
                    <li class="account">
                        <div class="col-md-2 profile"></div>
                        <div class="col profile-name">
                            <h6>Erzy irvine</h6>
                            <span>ERJ</span>
                        </div>
                        <div class="col-md-2 logout">
                            <a href="#">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col content">
                <div class="row">
                    <div class="col-md-12 breadcrumbs">
                        <h3>Mahasiswa WatchList</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col widget-checkup">
                        <div class="col-md-12 top-part">
                            <div class="col-md-6 header-title">
                                <h3>Data Mahasiswa</h3>
                            </div>
                            <div class="col-md-6 mhs_filter">
                                <div class="input-group search-bar">
                                    <input type="text" class="form-control" placeholder="Cari mahasiswa" aria-label="Cari mahasiswa" aria-describedby="button-addon2">
                                    <span class="input-group-append">
                                        <button class="btn btn-outline-secondary bg-white border-start-0 border-bottom-0 border ms-n5" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <select class="form-select kls_filter" aria-label="Default select example">
                                    <option selected>Semua kelas</option>
                                    <option value="1">IF-43-12</option>
                                    <option value="2">IF-44-12</option>
                                    <option value="3">IF-47-04</option>
                                </select>
                            </div>
                        </div>
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">No</th>
                              <th>NIM</th>
                              <th>Kelas</th>
                              <th>Nama</th>
                              <th>Semester</th>
                              <th>IPK</th>
                              <th>SKS</th>
                              <th>TAK</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    foreach($data as $row) : 
                                        $alert = "";
                                        $res = '  <button type="button" class="btn btn-warning"><i class="fa fa-trash"></i>';
                                ?>
                            <tr>
                                <td scope="row"><?php echo $i++ ?></td>
                                <td><?php echo $row["nim"] ?></td>
                                <td><?php echo $row["kelas"] ?></td>
                                <td><?php echo $row["name"] ?> <?php echo $alert; ?></td>
                                <td><?php echo $row["semester"] ?></td>
                                <td><?php echo number_format($row["ipk"]/100,2) ?></td>
                                <td><?php echo $row["sks"] ?></td>
                                <td><?php echo $row["tak"] ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                    <?= $res; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="row">
    <div class="col-md-3">
        <p>Showing 10 of <?= count($data)?> data</p>
    </div>
    <div class="col-md-7">
    </div>
    <div class="col-md-2">
    <nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><</a>
    </li>
    <li class="page-item active" aria-current="page">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">></a>
    </li>
  </ul>
</nav>
    </div>
</div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col footer"></div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>