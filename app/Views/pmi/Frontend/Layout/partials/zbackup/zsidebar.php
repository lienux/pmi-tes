<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item nav-profile border-bottom">
			<a href="#" class="nav-link flex-column">
				<div class="nav-profile-image">
					<img src="<?=base_url('uploads/images/'.session()->get('image'));?>" alt="profile" />
					<!--change to offline or busy as needed-->
				</div>
				<div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
					<span class="font-weight-semibold mb-1 mt-2 text-center"><?=session()->get('name')?></span>
					<span class="text-secondary icon-sm text-center"><?=session()->get('nim')?></span>
				</div>
			</a>
		</li>
		<li class="nav-item pt-3">
			<a class="nav-link d-block" href="<?=base_url()?>/stikom/mahasiswa/dashboard">
				<img class="sidebar-brand-logo" src="<?=base_url()?>/uploads/images/logo.svg" alt="" />
				<img class="sidebar-brand-logomini" src="<?=base_url()?>/uploads/images/logo-mini.svg" alt="" />
				<!-- <div class="small font-weight-light pt-1">Responsive Dashboard</div> -->
			</a>
			<!-- <form class="d-flex align-items-center" action="#">
				<div class="input-group">
					<div class="input-group-prepend">
						<i class="input-group-text border-0 mdi mdi-magnify"></i>
					</div>
					<input type="text" class="form-control border-0" placeholder="Search" />
				</div>
			</form> -->
		</li>
		<li class="pt-2 pb-1">
			<span class="nav-item-head">MyPages</span>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?=base_url()?>/stikom/mahasiswa/dashboard">
				<i class="mdi mdi-compass-outline menu-icon"></i>
				<span class="menu-title">Dashboard</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?=base_url()?>/stikom/mahasiswa/profile">
				<i class="mdi mdi-account-box-outline menu-icon"></i>
				<span class="menu-title">Profile</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-bs-toggle="collapse" href="#academic" aria-expanded="false" aria-controls="academic">
				<i class="mdi mdi-book-multiple menu-icon"></i>
				<span class="menu-title">Akademik</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="academic">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url()?>/stikom/mahasiswa/jadwal_kuliah">Jadwal Kuliah</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url()?>/stikom/mahasiswa/krs">Kartu Rencana Studi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url()?>/stikom/mahasiswa/angket_penilaian">Angket Penilaian Dosen</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url()?>/stikom/mahasiswa/nilai_semester">Nilai Semester</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url()?>/stikom/mahasiswa/khs">Kartu Hasil Studi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url()?>/stikom/mahasiswa/transkip_nilai">Transkip Nilai</a>
					</li>
				</ul>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-bs-toggle="collapse" href="#finance" aria-expanded="false" aria-controls="finance">
				<i class="mdi mdi-cash-multiple menu-icon"></i>
				<span class="menu-title">Keuangan</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="finance">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url()?>/stikom/mahasiswa/history_pembayaran">History pembayaran</a>
						<!-- <a class="nav-link" href="<?=base_url()?>/stikom/finance/biaya_pendidikan">Biaya pendidikan</a> -->
					</li>
				</ul>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-bs-toggle="collapse" href="#proposal" aria-expanded="false" aria-controls="proposal">
				<i class="mdi mdi-file-document-box menu-icon"></i>
				<span class="menu-title">Proposal</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="proposal">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url()?>/stikom/mahasiswa/finance/biaya_pendidikan">Daftar sidang</a>
						<a class="nav-link" href="<?=base_url()?>/stikom/mahasiswa/finance/biaya_pendidikan">Jadwal sidang</a>
						<a class="nav-link" href="<?=base_url()?>/stikom/mahasiswa/finance/biaya_pendidikan">Berita acara sidang</a>
					</li>
				</ul>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-bs-toggle="collapse" href="#skripsi" aria-expanded="false" aria-controls="skripsi">
				<i class="mdi mdi-script menu-icon"></i>
				<span class="menu-title">Skripsi</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="skripsi">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url()?>/stikom/finance/biaya_pendidikan">Daftar bimbingan</a>
						<a class="nav-link" href="<?=base_url()?>/stikom/finance/biaya_pendidikan">Kartu bimbingan</a>
						<a class="nav-link" href="<?=base_url()?>/stikom/finance/biaya_pendidikan">Jadwal bimbingan</a>
						<a class="nav-link" href="<?=base_url()?>/stikom/finance/biaya_pendidikan">Pendaftaran sidang</a>
						<a class="nav-link" href="<?=base_url()?>/stikom/finance/biaya_pendidikan">Jadwal sidang</a>
						<a class="nav-link" href="<?=base_url()?>/stikom/finance/biaya_pendidikan">Berita acara sidang</a>
					</li>
				</ul>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-bs-toggle="collapse" href="#wisuda" aria-expanded="false" aria-controls="wisuda">
				<i class="mdi mdi-school menu-icon"></i>
				<span class="menu-title">Wisuda</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="wisuda">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url()?>/stikom/finance/biaya_pendidikan">Daftar wisuda</a>
						<a class="nav-link" href="<?=base_url()?>/stikom/finance/biaya_pendidikan">Kartu wisuda</a>
						<a class="nav-link" href="<?=base_url()?>/stikom/finance/biaya_pendidikan">Jadwal wisuda</a>
						<a class="nav-link" href="<?=base_url()?>/stikom/finance/biaya_pendidikan">Foto wisuda</a>
					</li>
				</ul>
			</div>
		</li>
		<li class="nav-item pt-3">
			<a class="nav-link" href="<?=base_url()?>/dokumentation" target="_blank">
				<i class="mdi mdi-file-document-box menu-icon"></i>
				<span class="menu-title">Documentation</span>
			</a>
		</li>
		<!-- <li class="nav-item pt-3">
			<a class="nav-link" href="<?=base_url()?>/stikom/mahasiswa/logout">
				<i class="mdi mdi-logout-variant menu-icon"></i>
				<span class="menu-title">Logout</span>
			</a>
		</li> -->
	</ul>
</nav>
<!-- partial -->