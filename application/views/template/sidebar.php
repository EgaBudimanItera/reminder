<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?=base_url()?>welcome">Reminder Penjualan</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?=base_url()?>welcome">Reminder Penjualan</a>
    </div>
    
    <ul class="sidebar-menu">
        <li class="<?php if($link == 'welcome'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>welcome"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>  
        <li class="menu-header">Menu</li>
        <li class="<?php if($link == 'user'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>user/user"><i class="fas fa-user"></i> <span>User</span></a></li>
        <li class="<?php if($link == 'outlet'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>pelanggan/pelanggan"><i class="fas fa-list-ul"></i> <span>Pelanggan</span></a></li>
        <!-- <li class="<?php if($link == 'presensi'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>presensi/presensi"><i class="fas fa-location-arrow"></i> <span>Presensi</span></a></li> -->

        

        <li class="nav-item dropdown <?=$link=='setting_satuan' || $link == 'setting_kategori'  || $link == 'tambah_produk' 
        ||$link=='print_barcode'? 'active':''?>">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-archive"></i><span>Produk</span></a>
          <ul class="dropdown-menu">
            <li class="<?=$link=='setting_satuan'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>produk/satuan/satuan">Setting Satuan</a></li>
            <!-- <li class="<?=$link=='setting_kategori'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>produk/kategori/kategori">Setting Kategori</a></li> -->
            
            <li class="<?=$link=='tambah_produk'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>produk/produk">Tambah Produk</a></li>
            
            <!-- <li class="<?=$link=='print_barcode'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>produk/produk/viewprintbarcode">Print Barcode</a></li> -->
          </ul>
        </li>
        <li class="nav-item dropdown <?=$link=='setting_driver' || $link == 'setting_kendaraan'  ? 'active':''?>">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-car"></i><span>Transportasi</span></a>
          <ul class="dropdown-menu">
            <li class="<?=$link=='setting_driver'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>driver/driver">Setting Driver</a></li>
            <li class="<?=$link=='setting_kendaraan'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>kendaraan/kendaraan">Setting Kendaraan</a></li>
            
            
          </ul>
        </li>
        <li class="nav-item dropdown <?=$link == 'DO'||$link == 'Invoice'? 'active':''?>">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-cart-plus"></i><span>Transaksi </span></a>
          <ul class="dropdown-menu">
            <li class="<?=$link=='DO'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>transaksi/delivery">DO</a></li>
            <li class="<?=$link=='Invoice'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>transaksi/invoice">Invoice</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown <?=$link == 'DO'||$link == 'Piutang'? 'active':''?>">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-hotel"></i><span>Laporan </span></a>
          <ul class="dropdown-menu">
            <li class="<?=$link=='DO'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>laporan/delivery">DO</a></li>
            <li class="<?=$link=='Piutang'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>laporan/piutang">Piutang</a></li>
            
          </ul>
        </li>
      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <?php if(empty($this->session->userdata('is_login'))){?>
          <a href="<?=base_url()?>login" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-sign-in-alt"></i> Login
          </a>
        <?php }else{?>
          <a href="<?=base_url()?>welcome/logout" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-sign-in-alt"></i> Logout
          </a>
          <!-- <a href="<?=base_url()?>backup/proses" class="btn btn-danger btn-lg btn-block btn-icon-split">
            <i class="fas fa-database"></i> Backup Database
          </a> -->
        <?php }?>
      </div>
  </aside>
</div>