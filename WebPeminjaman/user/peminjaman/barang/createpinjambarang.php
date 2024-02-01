<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Create</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Pinjam</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Barang</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Create Pinjam Barang</div>
								</div>
								<form method="POST" action="" enctype="multipart/form-data">
								<div class="card-body">
									<div class="form-group">
										<label>Nama Barang</label>
										<select class="form-control" id="id_barang" onchange="changeValue(this.value)" name="id_barang" required="">
											<option value="" hidden="">-- Pilih Barang --</option>
											<?php 
												$query       = mysqli_query($conn,'SELECT * from barang');
												$stok 	     = "var stok 		= new Array();\n;";
												$deskripsi   = "var deskripsi   = new Array();\n;";
												$nama_barang = "var nama_barang = new Array();\n;";
												while($row = mysqli_fetch_array($query)) {
													echo '<option value="'.$row['id'].'">'.$row['nama_barang'].'</option>';
												$stok .= "stok['".$row['id']."'] = {stok:'".addslashes($row['stok'])."'};\n";
												$deskripsi .= "deskripsi['".$row['id']."'] = {deskripsi:'".addslashes($row['deskripsi'])."'};\n";
												$nama_barang .= "nama_barang['".$row['id']."'] = {nama_barang:'".addslashes($row['nama_barang'])."'};\n";
												}
											?>
										</select>
									</div>
									
									<input type="hidden" readonly="" id="nama_barang" value="<?php echo $nama_barang; ?>" name="nama_barang">
									
									<div class="form-group">
										<label>Stok Barang Tersedia</label>
										<input type="text" readonly="" id="stok" class="form-control" placeholder="">
									</div>

									<div class="form-group">
										<label>Deskripsi</label>
										<textarea readonly="" style="white-space: pre-line;" id="deskripsi" rows="5" class="form-control"></textarea>
									</div>

								</div>
							
							</div>
						</div>

						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Data Peminjam</div>
								</div>
								<form method="POST" action="" enctype="multipart/form-data">
								<div class="card-body">
									
									<div class="form-group">
										<label>Jumlah Pinjam Barang</label>
										<input min="1" step="1" value="1" type="number" name="qty" class="form-control" placeholder="Jumlah Pinjam Barang ...">
									</div>

									<div class="form-group">
										<label>Tgl Mulai Pinjam</label>
										<input type="text" readonly="" name="tgl_mulai" class="form-control" value="<?php echo date('Y-m-d') ?>">
									</div>

									<div class="form-group">
										<label>Tgl Selesai Pinjam</label>
										<input type="date" name="tgl_selesai" class="form-control">
									</div>

									<div class="form-group">
                                        <label>Template Surat</label><br>
                                        <a href="https://docs.google.com/document/d/1q0Ix4tXPrqhJ1IVTI8MxD9UaI9xXSk89/export?format=docx" download="Template Surat Peminjaman Barang.docx">
        								<button type="button">Download</button>
    									</a>
                                    </div>

									<div class="form-group">
                                        <label for="pdf_file">Surat Peminjaman (PDF)</label><br>
                                        <input type="file" name="pdf_file" id="pdf_file" accept=".pdf">
                                    </div>

									<div class="form-group">
										<label>Lokasi Barang</label>
										<textarea class="form-control" name="lokasi_barang" rows="5" placeholder="Lokasi Barang ..." style="white-space: pre-line;"></textarea>
									</div>

									<input type="hidden" name="id_user" value="<?php echo $_SESSION['id'] ?>">
									<input type="hidden" name="status" value="menunggu">

								</div>
								<div class="card-action">
									<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
									<a href="?view=datapinjambarang" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<p class="text-footer text-center p-3">&copy; Sarana dan Prasarana - Universitas Pendidikan Indonesia Kampus UPI di Cibiru</p>
		</div>

		<script type="text/javascript">
			<?php 
				echo $stok;
				echo $deskripsi;
				echo $nama_barang;
			?>
			function changeValue(id){
				document.getElementById('stok').value = stok[id].stok;
				document.getElementById('deskripsi').value = deskripsi[id].deskripsi;
				document.getElementById('nama_barang').value = nama_barang[id].nama_barang;
			};
		</script>


<?php
            if (isset($_POST['simpan'])) {
            
                $id_barang = $_POST['id_barang'];
                $qty = $_POST['qty'];
                $tgl_mulai = $_POST['tgl_mulai'];
                $tgl_selesai = $_POST['tgl_selesai'];
                $lokasi_barang = $_POST['lokasi_barang'];
                $id_user = $_POST['id_user'];
                $status = $_POST['status'];
                
                $email_user = $_POST['email_user'];
                $email_admin = $_POST['email_admin'];
                $password_user = $_POST['password_user'];
                $nama_barang = $_POST['nama_barang'];
                $pdf_file = $_FILES['pdf_file']['name'];

                
                $file = $_FILES['pdf_file']['name'];
                $file_tmp = $_FILES['pdf_file']['tmp_name'];
                    
                    move_uploaded_file($file_tmp, 'peminjaman/barang/uploads/' . $file);

                // $targetDir = "uploads/";  // Set the target directory where you want to store uploaded files
                // $targetFile = $targetDir . basename($_FILES["pdf_file"]["name"]);  // Get the file name with path

                // if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $targetFile)) {
                //     echo "The file ". htmlspecialchars(basename($_FILES["pdf_file"]["name"])). " has been uploaded.";
                // } else {
                //     echo "Sorry, there was an error uploading your file.";
                // }


                $selSto =mysqli_query($conn, "SELECT * FROM barang WHERE id='$id_barang'");
                $sto    =mysqli_fetch_array($selSto);
                $stok    =$sto['stok'];
                //menghitung sisa stok
                $sisa    =$stok-$qty;

                if($stok < $qty){
                    echo "<script>alert ('Stok Kurang Dari Jumlah Pinjam') </script>";

                }else{
                    mysqli_query($conn,"INSERT into pinjambarang values ('','$id_barang', '$id_user','$qty','$tgl_mulai','$tgl_selesai','$lokasi_barang','$status', '$pdf_file', '')");
                    mysqli_query($conn, "UPDATE barang SET stok='$sisa' WHERE id='$id_barang'");

                    echo "<script>alert ('Data Berhasil Disimpan') </script>";
                    echo "<script>window.location.replace('?view=datapinjambarang');</script>";
                }

            }
            ?>