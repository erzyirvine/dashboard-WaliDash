<?php
// List of names and classes to randomize
$names = array(
    "Ahmad Putra", "Siti Nurhaliza", "Dewi Sartika", "Bayu Pratama", "Indah Permata Sari",
    "Rizky Maulana", "Fitri Rahmawati", "Dian Kurniawan", "Ayu Lestari", "Budi Santoso",
    "Wulan Anindya", "Hendra Setiawan", "Dina Susanti", "Yudi Saputra", "Aisyah Fitriani",
    "Rian Ardiansyah", "Putri Maharani", "Fikri Hidayat", "Nina Kartika", "Rina Wulandari",
    "Adi Susilo", "Maya Ningsih", "Andi Pratama", "Lia Anggraeni", "Santi Oktavia",
    "Agus Wahyudi", "Lutfi Rahman", "Lina Marlina", "Teguh Kurniawan", "Dwi Lestari"
);
$classes = array("IF-44-12", "IF-42-08", "IF-47-04");

// Shuffle the names and classes
shuffle($names);
shuffle($classes);

// Generate random data
$data = array();
for ($i = 0; $i < 30; $i++) {
    $data[] = array(
        "nim" => "13012040" . str_pad($i + 22, 2, "0", STR_PAD_LEFT),
        "name" => $names[$i % count($names)],
        "semester" => rand(6, 10),
        "kelas" => $classes[$i % count($classes)]
    );
}

// Sort the data by semester in descending order
usort($data, function ($a, $b) {
    return $b['semester'] - $a['semester'];
});

// Pagination Logic
$items_per_page = 10;
$total_items = count($data);
$total_pages = ceil($total_items / $items_per_page);

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($current_page < 1) $current_page = 1;
if ($current_page > $total_pages) $current_page = $total_pages;

$start_index = ($current_page - 1) * $items_per_page;

// Filter by selected class
$filter_class = isset($_GET['kelas']) ? $_GET['kelas'] : null;
if ($filter_class && $filter_class != "All") {
    $data = array_filter($data, function ($item) use ($filter_class) {
        return $item["kelas"] === $filter_class;
    });
    $total_items = count($data);
    $total_pages = ceil($total_items / $items_per_page);
    $start_index = ($current_page - 1) * $items_per_page;
}

// Adjust widget values based on selected class filter
if ($filter_class && $filter_class != "All") {
    $mahasiswa_wali = rand(30, 40); // Limit Mahasiswa Wali to a maximum of 40
    $mahasiswa_mengulang = rand(1, 10); // Limit Mahasiswa Mengulang to a maximum of 10
    $mahasiswa_watchlist = rand(1, 10); // Limit Mahasiswa WatchList to a maximum of 10
} else {
    $mahasiswa_wali = rand(80, 120); // Default range for "All" class selection
    $mahasiswa_mengulang = rand(20, 50); // Default range for "All" class selection
    $mahasiswa_watchlist = rand(30, 60); // Default range for "All" class selection
}

$display_data = array_slice($data, $start_index, $items_per_page);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
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
                <li class="active">
                    <a href="#">
                        <i class="fa-solid fa-chart-simple" class="active-icon"></i><span>Dashboard</span>
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
                <li>
                    <a href="{{ route('mahasiswa_watchList') }}">
                        <i class="fa-regular fa-eye"></i><span>Mahasiswa Watchlist</span>
                    </a>
                </li>
                <li class="account">
                    <div class="col-md-2 profile"></div>
                    <div class="col profile-name">
                        <h6>Erzy Irvine</h6>
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
                    <h3>Main Dashboard</h3>
                </div>
                <form method="GET" action="" id="filter-main">
                    <select class="form-select filter-kelas" name="kelas" onchange="this.form.submit()" aria-label="Default select example">
                        <option value="All" <?= !$filter_class || $filter_class === "All" ? "selected" : "" ?>>Semua Kelas</option>
                        <option value="IF-42-08" <?= $filter_class === "IF-42-08" ? "selected" : "" ?>>IF-42-08</option>
                        <option value="IF-44-12" <?= $filter_class === "IF-44-12" ? "selected" : "" ?>>IF-44-12</option>
                        <option value="IF-47-04" <?= $filter_class === "IF-47-04" ? "selected" : "" ?>>IF-47-04</option>
                    </select>
                </form>
            </div>
            <div class="row">
                <div class="col widget-tracker">
                    <div class="col-md-12 top-widget">
                        <div class="col-md-2">
                            <div class="icon-mahasiswa"></div>
                        </div>
                        <div class="col-md-10 counter-text">
                            <span>Mahasiswa Wali</span>
                            <h2><?php echo $mahasiswa_wali; ?></h2>
                        </div>
                    </div>
                    <hr style="margin:0;padding0;">
                    <div class="col-md-12 bot-widget">
                        <a href="{{ route('mahasiswa_wali') }}"><h6>View Details</h3></a>
                        <div class="right-arrow"></div>
                    </div>
                </div>
                <div class="col widget-tracker">
                    <div class="col-md-12 top-widget">
                        <div class="col-md-2">
                            <div class="icon-mengulang"></div>
                        </div>
                        <div class="col-md-10 counter-text">
                            <span>Mahasiswa Mengulang</span>
                            <h2><?php echo $mahasiswa_mengulang; ?></h2>
                        </div>
                    </div>
                    <hr style="margin:0;padding0;">
                    <div class="col-md-12 bot-widget">
                        <a href="{{ route('mahasiswa_mengulang') }}"><h6>View Details</h3></a>
                        <div class="right-arrow"></div>
                    </div>
                </div>
                <div class="col widget-tracker">
                    <div class="col-md-12 top-widget">
                        <div class="col-md-2">
                            <div class="icon-watchlist"></div>
                        </div>
                        <div class="col-md-10 counter-text">
                            <span>Mahasiswa WatchList</span>
                            <h2><?php echo $mahasiswa_watchlist; ?></h2>
                        </div>
                    </div>
                    <hr style="margin:0;padding0;">
                    <div class="col-md-12 bot-widget">
                        <a href="{{ route('mahasiswa_watchList') }}"><h6>View Details</h3></a>
                        <div class="right-arrow"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 widget-kehadiran">
                    <h3>Kehadiran Kelas</h3>
                    <input class="form-control filter-matkul" list="datalistOptions" id="exampleDataList" placeholder="Cari matkul">
                    <datalist id="datalistOptions">
                        <option value="Matematika diskrit">
                        <option value="Kalkulus">
                        <option value="Pancasila">
                        <option value="Kewarganegaraan">
                        <option value="Pendidikan agama islam">
                    </datalist>
                    <canvas id="kehadiran"></canvas>
                </div>
                <div class="col widget-checkup">
                    <h3>Mahasiswa perlu checkup</h3>
                    <span>khusus untuk mahasiswa memiliki matkul yang mengulang, belum diambil, kurang TAK, Eprt dan sks kurang</span>

                    <?php if (empty($display_data)) : ?>
                        <!-- Display message if no data available -->
                        <div class="no-data">
                            <h4 style="text-align: center; margin-top: 50px;">Tidak ada mahasiswa yang perlu di checkup</h4>
                        </div>
                    <?php else : ?>
                        <table class="table table-checkup">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = $start_index + 1;
                                foreach($display_data as $row) : 
                                    ?>
                                    <tr class="widget-mhs-tracker">
                                        <td scope="row"><?php echo $i++ ?></td>
                                        <td><?php echo $row["nim"] ?></td>
                                        <td><a href="{{ route('profile_mhs') }}"><?php echo $row["name"] ?></a><i class="fa-solid fa-arrow-up-right-from-square"></i></td>
                                        <td><?php echo $row["semester"] ?></td>
                                        <td><?php echo $row["kelas"] ?></td>
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
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col footer"></div>
            </div>
        </div>
    </div>
</div>

</body>
<script type="text/javascript">
    const pie = document.getElementById('kehadiran');

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function updatePieChart(chart, data) {
        chart.data.datasets[0].data = data;
        chart.update();
    }

    const kehadiranChart = new Chart(pie, {
        type: 'pie',
        data: {
            labels: ['Hadir', 'Sakit', 'Izin', 'Tidak Hadir'],
            datasets: [{
                label: 'Kehadiran',
                data: [getRandomInt(1500, 7000), getRandomInt(1500, 7000), getRandomInt(1500, 7000), getRandomInt(1500, 7000)],
                backgroundColor: [
                    'rgb(134,228,186)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 205, 86)',
                    'rgb(54, 162, 235)'
                ],
                hoverOffset: 4
            }]
        },
    });

    const filterMatkul = document.querySelector('.filter-matkul');
    filterMatkul.addEventListener('input', function() {
        const value = filterMatkul.value.trim();
        if (value) {
            updatePieChart(kehadiranChart, [getRandomInt(100, 460), getRandomInt(100, 460), getRandomInt(100, 460), getRandomInt(100, 460)]);
        } else {
            updatePieChart(kehadiranChart, [getRandomInt(1500, 7000), getRandomInt(1500, 7000), getRandomInt(1500, 7000), getRandomInt(1500, 7000)]);
        }
    });
</script>

</html>
