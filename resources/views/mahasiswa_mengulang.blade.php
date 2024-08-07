<!DOCTYPE html>
<?php
// Array data with randomized 'Status'
$data = array(
    array("nim" => "1301204022","kelas" => "IF-43-12", "name" => "Erzy Irvine Julian", "Mata_kuliah" => "Pancasila", "Status" => "", "thn_ajar" => "20/21", "tingkat" => "I"),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Kania Namaga", "Mata_kuliah" => "Pancasila", "Status" => "", "thn_ajar" => "23/24", "tingkat" => "I"),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Catur Rangga Hutapea", "Mata_kuliah" => "Kalkulus Lanjut", "Status" => "", "thn_ajar" => "20/21", "tingkat" => "II"),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Emil Widodo", "Mata_kuliah" => "Pancasila", "Status" => "", "thn_ajar" => "20/21", "tingkat" => "I"),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Ulya Hastuti", "Mata_kuliah" => "Pancasila", "Status" => "", "thn_ajar" => "20/21", "tingkat" => "I"),
    array("nim" => "1301204022","kelas" => "IF-44-12", "name" => "Ulya Hastuti", "Mata_kuliah" => "Pancasila", "Status" => "", "thn_ajar" => "21/22", "tingkat" => "I"),
);

$status_options = ['Belum ambil ulang', 'Sudah ambil ulang'];

// Randomize 'Status' for each entry
foreach ($data as &$entry) {
    $entry['Status'] = $status_options[array_rand($status_options)];
}

$items_per_page = 10;
$total_items = count($data);
$total_pages = ceil($total_items / $items_per_page);

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($current_page < 1) $current_page = 1;
if ($current_page > $total_pages) $current_page = $total_pages;

$start_index = ($current_page - 1) * $items_per_page;
$display_data = array_slice($data, $start_index, $items_per_page);
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            color: white;
            padding: 15px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            display: none;
            z-index: 1000;
        }
        .notification.success {
            background-color: #4caf50;
        }
        .notification.error {
            background-color: #f44336;
        }
        .notification i {
            margin-right: 10px;
        }
    </style>
</head>
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
                    <li class="active">
                        <a href="{{ route('mahasiswa_mengulang') }}">
                            <i class="fa-solid fa-repeat active-icon"></i><span>Mahasiswa Mengulang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa_watchList') }}">
                            <i class="fa-regular fa-eye"></i><span>Mahasiswa Watchlist</span>
                        </a>
                    </li>
                    <li class="account">
                        <div class="col-md-2 profile"></div>
                        <div class="col profile-name">
                            <h6>Erzy irvine</h6>
                            <span>ERJ</span>
                        </div>
                        <div class="col-md-2 logout">
                            <a href="{{ route('login_page') }}">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col content">
                <div class="row">
                    <div class="col-md-12 breadcrumbs">
                        <h3>Mahasiswa Mengulang</h3>
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
                                    <input type="text" id="searchInput" class="form-control" placeholder="Cari mahasiswa" aria-label="Cari mahasiswa" aria-describedby="button-addon2">
                                    <span class="input-group-append">
                                        <button class="btn btn-outline-secondary bg-white border-start-0 border-bottom-0 border ms-n5" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <select class="form-select kls_filter" id="classFilter" aria-label="Default select example">
                                    <option value="All" selected>Semua kelas</option>
                                    <option value="IF-43-12">IF-43-12</option>
                                    <option value="IF-44-12">IF-44-12</option>
                                    <option value="IF-47-04">IF-47-04</option>
                                </select>
                                <select class="form-select kls_filter" id="levelFilter" aria-label="Default select example">
                                    <option value="All" selected>semua Tahun</option>
                                    <option value="20/21">20/21</option>
                                    <option value="21/22">21/22</option>
                                    <option value="22/23">22/23</option>
                                    <option value="23/24">23/24</option>
                                </select>
                            </div>
                        </div>
                        <table class="table" id="studentTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th>NIM</th>
                                    <th>Kelas</th>
                                    <th>Nama</th>
                                    <th>Mata Kuliah</th>
                                    <th>Status</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Tingkat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = $start_index + 1;
                                foreach($display_data as $row) : 
                                    $status_class = $row["Status"] === "Belum ambil ulang" ? "bg-danger" : "bg-success";
                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo $i++ ?></td>
                                        <td><?php echo $row["nim"] ?></td>
                                        <td><?php echo $row["kelas"] ?></td>
                                        <td><?php echo $row["name"] ?></td>
                                        <td><?php echo $row["Mata_kuliah"] ?></td>
                                        <td><span class="badge <?php echo $status_class; ?> status"><?php echo $row["Status"] ?></span></td>
                                        <td><?php echo $row["thn_ajar"] ?></td>
                                        <td><?php echo $row["tingkat"] ?></td>
                                        <td>
                                            <a href="{{ route('profile_mhs') }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <button type="button" class="btn btn-warning watchlist-btn"><i class="fa fa-map-pin"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-between align-items-center flex-wrap">
                                <div class="mb-2 mb-md-0">
                                    <p class="mb-0">
                                        Showing <?php echo min($items_per_page, $total_items - $start_index); ?> of <?php echo $total_items ?> data
                                    </p>
                                </div>
                                <nav aria-label="Page navigation" class="pagination-widget mb-0">
                                    <ul class="pagination mb-0">
                                        <?php if($current_page > 1): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $current_page - 1; ?>"><</a>
                                            </li>
                                        <?php else: ?>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><</a>
                                            </li>
                                        <?php endif; ?>

                                        <?php for($page = 1; $page <= $total_pages; $page++): ?>
                                            <li class="page-item <?php echo $page == $current_page ? 'active' : ''; ?>">
                                                <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                                            </li>
                                        <?php endfor; ?>

                                        <?php if($current_page < $total_pages): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">></a>
                                            </li>
                                        <?php else: ?>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">></a>
                                            </li>
                                        <?php endif; ?>
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
    <div class="notification success" id="successNotification">
        <i class="fa fa-check"></i> <span id="successMessage">Mahasiswa berhasil ditambahkan ke daftar watchlist</span>
    </div>
    <div class="notification error" id="errorNotification">
        <i class="fa fa-check"></i> <span id="errorMessage">Mahasiswa berhasil dihapus dari daftar watchlist</span>
    </div>
    <script>
        function filterTable() {
            var searchInput = document.getElementById('searchInput').value.toLowerCase();
            var classFilter = document.getElementById('classFilter').value;
            var levelFilter = document.getElementById('levelFilter').value;
            var rows = document.querySelectorAll('#studentTable tbody tr');
            var visibleRowCount = 0;

            rows.forEach(function(row) {
                var name = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                var kelas = row.querySelector('td:nth-child(3)').textContent;
                var tingkat = row.querySelector('td:nth-child(7)').textContent;
                var nameMatch = name.includes(searchInput);
                var classMatch = (classFilter === 'All' || kelas === classFilter);
                var levelMatch = (levelFilter === 'All' || tingkat === levelFilter);
                if (nameMatch && classMatch && levelMatch) {
                    row.style.display = '';
                    visibleRowCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            var dataCounter = document.getElementById('dataCounter');
            dataCounter.textContent = 'Showing ' + visibleRowCount + ' of <?php echo $total_items ?> data';
        }

        document.getElementById('searchInput').addEventListener('keyup', filterTable);
        document.getElementById('classFilter').addEventListener('change', filterTable);
        document.getElementById('levelFilter').addEventListener('change', filterTable);

        document.querySelectorAll('.watchlist-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var icon = this.querySelector('i');
            var successNotification = document.getElementById('successNotification');
            var errorNotification = document.getElementById('errorNotification');
            var buttonClasses = this.classList;

            if (icon.classList.contains('fa-map-pin')) {
                icon.classList.remove('fa-map-pin');
                icon.classList.add('fa-trash');
                buttonClasses.remove('btn-warning');
                buttonClasses.add('btn-danger');
                successNotification.style.display = 'flex';
                setTimeout(function() {
                    successNotification.style.display = 'none';
                }, 3000);
            } else if (icon.classList.contains('fa-trash')) {
                icon.classList.remove('fa-trash');
                icon.classList.add('fa-map-pin');
                buttonClasses.remove('btn-danger');
                buttonClasses.add('btn-warning');
                errorNotification.style.display = 'flex';
                setTimeout(function() {
                    errorNotification.style.display = 'none';
                }, 3000);
            }
        });
    });

    </script>
</body>
</html>
