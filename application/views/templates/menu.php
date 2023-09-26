   <!-- Page Wrapper -->
   <div id="wrapper">

       
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
	<div class="sidebar-brand-icon rotate-n-15">
		<i class="fas fa-laugh-wink"></i>
	</div>
	<div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
	<a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
		<i class="fas fa-fw fa-tachometer-alt"></i>
		<span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
	Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
		aria-expanded="true" aria-controls="collapseUtilities">
		<i class="fas fa-fw fa-user "></i>
		<span>Master Data</span>
	</a>
	<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
		data-parent="#accordionSidebar">
		<div class="bg-white py-2 collapse-inner rounded">
			<h6 class="collapse-header">Master Data</h6>
			<a class="collapse-item" href="<?=base_url('dashboard/dataDebitur');?>">Data Debitur</a>
			<a class="collapse-item" href="<?=base_url('dashboard/dataAcc');?>">Data Account</a>
			<a class="collapse-item" href="<?=base_url('dashboard/dataTransaksi');?>">Data Transaksi</a>
			<!-- <a class="collapse-item" href="<?=base_url('dashboard/dataMaster');?>">Data Master</a> -->
		</div>
	</div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<!-- <div class="sidebar-heading">
	Data
</div> -->

<!-- Nav Item - Pages Collapse Menu --> 

<!-- Nav Item - assets -->
<!-- <li class="nav-item">
	<a class="nav-link" href="<?php echo base_url('dashboard/pembukaanRekening'); ?>">
		<i class="fas fa-user-tie"></i>
		<span>Pembukaan Rekening</span></a>
</li>
<li class="nav-item">
	<a class="nav-link" href="<?php echo base_url('dashboard/setorTunai');?> ">
	<i class="fas fa-money-bill"></i>
	<span>Setoran Tunai</span></a>
</li> -->
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
	<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->