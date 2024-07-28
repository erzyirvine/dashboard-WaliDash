<?php
$data = array(
    array("nim" => "1301204022", "name" => "Erzy Irvine Julian", "semester" => 8, "kelas" => "IF-44-12"),
    array("nim" => "1301204022", "name" => "Erzy Irvine Julian", "semester" => 8, "kelas" => "IF-44-12"),
    array("nim" => "1301204022", "name" => "Erzy Irvine Julian", "semester" => 8, "kelas" => "IF-44-12"),    
    array("nim" => "1301204022", "name" => "Erzy Irvine Julian", "semester" => 8, "kelas" => "IF-44-12"),
    array("nim" => "1301204022", "name" => "Erzy Irvine Julian", "semester" => 8, "kelas" => "IF-44-12"),
    array("nim" => "1301204022", "name" => "Erzy Irvine Julian", "semester" => 8, "kelas" => "IF-44-12"),
    array("nim" => "1301204022", "name" => "Erzy Irvine Julian", "semester" => 8, "kelas" => "IF-44-12"),
    array("nim" => "1301204022", "name" => "Erzy Irvine Julian", "semester" => 8, "kelas" => "IF-44-12"),
    array("nim" => "1301204022", "name" => "Erzy Irvine Julian", "semester" => 8, "kelas" => "IF-44-12"),
    array("nim" => "1301204022", "name" => "Erzy Irvine Julian", "semester" => 8, "kelas" => "IF-44-12"),
);
?>

<!DOCTYPE html>
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
						<h3>Dashboard</h3>
					</div>
					<select class="form-select filter-kelas" aria-label="Default select example">
  						<option selected>All</option>
  						<option value="1">IF-42-08</option>
  						<option value="2">IF-44-12</option>
  						<option value="3">IF-47-04</option>
					</select>
				</div>
				<div class="row">
					<div class="col widget-tracker">
						<div class="col-md-12 top-widget">
							<div class="col-md-2">
								<div class="icon-mahasiswa"></div>
							</div>
							<div class="col-md-10 counter-text">
								<span>Mahasiswa Wali</span>
								<h2>400</h2>
							</div>
						</div>
						<hr style="margin:0;padding0;">
						<div class="col-md-12 bot-widget">
							<a href="#"><h6>View Details</h3></a>
							<div class="right-arrow"></div>
						</div>
					</div>
					<div class="col widget-tracker">
						<div class="col-md-12 top-widget">
							<div class="col-md-2">
								<div class="icon-mengulang"></div>
							</div>
							<div class="col-md-10 counter-text">
								<span>Mahasiswa Wali</span>
								<h2>400</h2>
							</div>
						</div>
						<hr style="margin:0;padding0;">
						<div class="col-md-12 bot-widget">
							<a href="#"><h6>View Details</h3></a>
							<div class="right-arrow"></div>
						</div>
					</div>
					<div class="col widget-tracker">
						<div class="col-md-12 top-widget">
							<div class="col-md-2">
								<div class="icon-watchlist"></div>
							</div>
							<div class="col-md-10 counter-text">
								<span>Mahasiswa Wali</span>
								<h2>400</h2>
							</div>
						</div>
						<hr style="margin:0;padding0;">
						<div class="col-md-12 bot-widget">
							<a href="#"><h6>View Details</h3></a>
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
						<span>khusus untuk mahasiswa memiliki matkul yang mengulang,belum diambil, kurang TAK, Eprt dan sks kurang</span>
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
                                    $i = 1;
                                    foreach($data as $row) : 
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

  	new Chart(pie, {
    type: 'pie',
    data: {
      labels: ['Hadir', 'Sakit', 'Izin', 'Tidak Hadir'],
      datasets: [{
        label: 'kehadiran',
        data: [12, 19, 3, 5],
        backgroundColor: [
	      'rgb(255, 99, 132)',
	      'rgb(54, 162, 235)',
	      'rgb(255, 205, 86)',
	      'rgb(134,228,186)'
    	],
    	hoverOffset: 4
      }]
    },
  });
</script>

</html>