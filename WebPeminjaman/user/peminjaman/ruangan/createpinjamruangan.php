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
								<a href="#">Ruangan</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Create Pinjam Ruangan</div>
								</div>
								<form method="POST" action="" enctype="multipart/form-data">
								<div class="card-body">
									<div class="form-group">
										<label>Nama Ruangan</label>
										<select class="form-control" id="id_ruangan" onchange="change(this.value)" name="id_ruangan" required="">
											<option value="" hidden="">-- Pilih Ruangan --</option>
											<?php
												$query       = mysqli_query($conn,'SELECT * from ruangan');
												$deskripsi 	 = "var deskripsi 		= new Array();\n;";
												$nama_ruangan= "var nama_ruangan= new Array();\n;";
												while($row = mysqli_fetch_array($query)) {
													if($row['status'] == 'free'){
													echo '<option value="'.$row['id'].'">'.$row['nama_ruangan'].'</option>';
												}
													$deskripsi .= "deskripsi['".$row['id']."'] = {deskripsi:'".addslashes($row['deskripsi'])."'};\n";
													$nama_ruangan .= "nama_ruangan['".$row['id']."'] = {nama_ruangan:'".addslashes($row['nama_ruangan'])."'};\n";
												
												
												}
											?>
										</select>
									</div>
									
									<input type="hidden" readonly="" id="nama_ruangan" name="nama_ruangan">

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
										<label>Tgl Mulai Pinjam</label>
										<input type="text" readonly="" name="tgl_mulai" class="form-control" value="<?php echo date('Y-m-d') ?>">
									</div>

									<div class="form-group">
										<label>Tgl Selesai Pinjam</label>
										<input type="date" name="tgl_selesai" class="form-control">
									</div>

									<div class="form-group">
                                        <label>Template Surat</label><br>
                                        <a href="https://docs.google.com/document/d/1sxzZNBE4iAtoyd5d3IiYEFVO0s1Mz5xN/export?format=docx" download="Template Surat Peminjaman Ruangan.docx">
        								<button type="button">Download</button>
    									</a>
                                    </div>

									<div class="form-group">
                                        <label for="pdf_file">Surat Peminjaman (PDF)</label><br>
                                        <input type="file" name="pdf_file" id="pdf_file" accept=".pdf">
                                    </div>

									<input type="hidden" name="id_user" value="<?php echo $_SESSION['id'] ?>">
									<input type="hidden" name="status" value="menunggu">

								</div>
								<div class="card-action">
									<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
									<a href="?view=datapinjamruangan" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
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
				echo $nama_ruangan;
				echo $deskripsi;
			?>
			function change(id_ruangan){
				document.getElementById('nama_ruangan').value = nama_ruangan[id_ruangan].nama_ruangan;
				document.getElementById('deskripsi').value = deskripsi[id_ruangan].deskripsi;
			};
		</script>

<?php
            if (isset($_POST['simpan'])) {
            
                $id_ruangan = $_POST['id_ruangan'];
                $tgl_mulai = $_POST['tgl_mulai'];
                $tgl_selesai = $_POST['tgl_selesai'];
                $id_user = $_POST['id_user'];
                $status = $_POST['status'];
                
                $nama_ruangan = $_POST['nama_ruangan'];

                $pdf_file = $_FILES['pdf_file']['name'];

                
                $file = $_FILES['pdf_file']['name'];
                $file_tmp = $_FILES['pdf_file']['tmp_name'];
                    
                    move_uploaded_file($file_tmp, 'peminjaman/ruangan/uploads/' . $file);

                $selSto =mysqli_query($conn, "SELECT * FROM ruangan WHERE id='$id_ruangan'");
                $sto    =mysqli_fetch_array($selSto);
                $stok    =$sto['status'];
                //menghitung sisa stok
                $sisa    = 'dipinjam';

                 mysqli_query($conn,"INSERT into pinjamruangan values ('','$id_ruangan', '$id_user','$tgl_mulai','$tgl_selesai','$status', '$pdf_file', '')");
                 mysqli_query($conn, "UPDATE ruangan SET status='$sisa' WHERE id='$id_ruangan'");

                 echo "<script>alert ('Data Berhasil Disimpan') </script>";
                echo "<script>window.location.replace('?view=datapinjamruangan');</script>";

            }
            ?>