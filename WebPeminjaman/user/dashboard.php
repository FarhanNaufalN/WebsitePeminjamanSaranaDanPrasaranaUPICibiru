<?php
session_start();


if (!isset($_SESSION['username']) || $_SESSION['level'] !== 'user') {
    header("location: ./404.html");
    exit();
}

include '../koneksi.php';

$query = mysqli_query($conn,'SELECT count(*) as barang from barang');
$row = mysqli_fetch_array($query);
?>

<?php 
$p = mysqli_query($conn,'SELECT count(*) as ruangan from ruangan');
$q = mysqli_fetch_array($p);
?>

<?php 
$key = mysqli_query($conn,'SELECT count(*) as user from user');
$b = mysqli_fetch_array($key);
?>

<?php 
$r = mysqli_query($conn,'SELECT count(*) as pinjambarang from pinjambarang');
$d = mysqli_fetch_array($r);
?>

<?php 
$t = mysqli_query($conn,'SELECT count(*) as pinjamruangan from pinjamruangan');
$z = mysqli_fetch_array($t);
?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="col-sm-6 col-md-12">
						<div class="card card-stats card-round" style="background: linear-gradient(to right, #009ad7, #e11b22);">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-danger bubble-shadow-small">
											<i class=""></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers" style="color: white;">
											<h2 class="">Selamat Datang di Website Peminjaman Sarana dan Prasarana Kampus Upi Di Cibiru</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


					<div class="row">
						<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round" style="background: linear-gradient(to right, #009ad7, #e11b22);">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-users"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers" style="color: white;">
												<p class="card-category"style="color: white">Data Barang</p>
												<h4 class="card-title"style="color: white"><?php echo $row['barang'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round" style="background: linear-gradient(to right, #009ad7, #e11b22);">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-check-circle"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers" style="color: white;">
												<p class="card-category"style="color: white">Data Ruangan</p>
												<h4 class="card-title"style="color: white"><?php echo $q['ruangan'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round" style="background: linear-gradient(to right, #009ad7, #e11b22);">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-chart-bar"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers" style="color: white;">
												<p class="card-category"style="color: white">Data User</p>
												<h4 class="card-title"style="color: white"><?php echo $b['user'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round" style="background: linear-gradient(to right, #009ad7, #e11b22);">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-newspaper"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers" style="color: white;">
												<p class="card-category"style="color: white">Pinjam Barang</p>
												<h4 class="card-title"style="color: white"><?php echo $d['pinjambarang'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round" style="background: linear-gradient(to right, #009ad7, #e11b22);">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon" >
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-newspaper"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers" style="color: white;">
												<p class="card-category"style="color: white">Pinjam Ruangan</p>
												<h4 class="card-title"style="color: white"><?php echo $z['pinjamruangan'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="container-footerbg-transparent">
			<p class="text-footer text-center p-3">&copy; Sarana dan Prasarana - Universitas Pendidikan Indonesia Kampus UPI di Cibiru</p>
    </div>

		</div>