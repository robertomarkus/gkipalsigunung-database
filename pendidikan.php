<?php
//memasukkan file config.php
include('config.php');
?>


<div class="container" style="margin-top:20px; width: 100%;">
	<center>
		<font size="6">Data Pendidikan</font>
	</center>
	<hr>
	<a href="index.php?page=tambah_mhs"><button class="btn btn-dark right">Tambah Data</button></a>
	<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action" ; style="text-align:center">
			<thead>
				<tr style="line-height:15px;">
				
					<th style="vertical-align:middle">Nomor Induk</th>
					<th style="vertical-align:middle">Jenjang</th>				
					<th style="vertical-align:middle">Nama Sekolah</th>
					<th style="vertical-align:middle">Hubungan Keluarga</th>
					<th style="vertical-align:middle">Lulus Tahun</th>
					<th style="vertical-align:middle">Fakultas</th>
					<th style="vertical-align:middle">Jurusan</th>
				
				<td>
					<th style="vertical-align:middle">Admin</th>
					<th style="vertical-align:middle">Aksi</th>
				</td>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY Nim DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td style="vertical-align:middle">'.$no.'</td>
							<td style="vertical-align:middle">'.$data['Nim'].'</td>
							<td style="vertical-align:middle">'.$data['aktifberjemaat'].'</td>
							<td style="vertical-align:middle">'.$data['Nama_Mhs'].'</td>
							<td style="vertical-align:middle">'.$data['Jenis_Kelamin'].'</td>
							<td style="vertical-align:middle">'.$data['Program_Studi'].'</td>
							<td style="vertical-align:middle">'.$data['Program_Jemaat'].'</td>
							<td style="vertical-align:middle">'.$data['Program_Coba1'].'</td>
							<td style="vertical-align:middle">'.$data['Program_Coba1'].'</td>
							<td style="vertical-align:middle">
								<a href="index.php?page=edit_mhs&Nim='.$data['Nim'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?Nim='.$data['Nim'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
</div>
