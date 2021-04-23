<?php
	function encrypt_param($param){
		$CI =& get_instance();
		return strtr($CI->encrypt->encode($param), '+/', '-_');
	}

	function decrypt_param($param){
		$CI =& get_instance();
		$param = strtr($param, '-_', '+/');
		$param = $CI->encrypt->decode($param);
		return $param;
	}

	function diff_time($date1, $date2){
		// Declare and define two dates 
		$date1 = strtotime($date1); 
		$date2 = strtotime($date2); 

		// Formulate the Difference between two dates 
		$diff = abs($date2 - $date1); 


		// To get the year divide the resultant date into 
		// total seconds in a year (365*60*60*24) 
		$years = floor($diff / (365*60*60*24)); 


		// To get the month, subtract it with years and 
		// divide the resultant date into 
		// total seconds in a month (30*60*60*24) 
		$months = floor(($diff - $years * 365*60*60*24) 
									/ (30*60*60*24)); 


		// To get the day, subtract it with years and 
		// months and divide the resultant date into 
		// total seconds in a days (60*60*24) 
		$days = floor(($diff - $years * 365*60*60*24 - 
					$months*30*60*60*24)/ (60*60*24)); 


		// To get the hour, subtract it with years, 
		// months & seconds and divide the resultant 
		// date into total seconds in a hours (60*60) 
		$hours = floor(($diff - $years * 365*60*60*24 
			- $months*30*60*60*24 - $days*60*60*24) 
										/ (60*60)); 


		// To get the minutes, subtract it with years, 
		// months, seconds and hours and divide the 
		// resultant date into total seconds i.e. 60 
		$minutes = floor(($diff - $years * 365*60*60*24 
				- $months*30*60*60*24 - $days*60*60*24 
								- $hours*60*60)/ 60); 


		// To get the minutes, subtract it with years, 
		// months, seconds, hours and minutes 
		$seconds = floor(($diff - $years * 365*60*60*24 
				- $months*30*60*60*24 - $days*60*60*24 
						- $hours*60*60 - $minutes*60)); 

		// Print the result 
		// printf("%d years, %d months, %d days, %d hours, "
		// 	. "%d minutes, %d seconds", $years, $months, 
		// 			$days, $hours, $minutes, $seconds); 
		return $hours . " Jam, ".$minutes. " Menit";
	}

	function get_total($id='',$id_pelanggan=''){
		$CI=& get_instance();
		// $cek_wilayah = $CI->db->get_where('wilayah', array('id_wil' => $id));
		$cek_do=$CI->db	->select('tb_det_do.*,coalesce(sum(tarif*jumlah),0) as subtotal,tgl_do,no_do,tb_pelanggan.*,tb_kendaraan.*')
						->from('tb_det_do')
						->join('tb_do','tb_do.id_do=tb_det_do.id_do')
						->join('tb_kendaraan','tb_do.id_kendaraan=tb_kendaraan.id_kendaraan')
						->join('tb_pelanggan','tb_pelanggan.id_pelanggan=tb_do.id_pelanggan')
						->where(array('tb_do.id_pelanggan'=>$id_pelanggan,'id_invoice'=>$id))
						->group_by('id_invoice')
						->get();

		
		if($cek_do->num_rows()>0){
			$total=$cek_do->row()->subtotal;
		}else{
			$total=0;
		}
		
		return $total;
	}

	function get_do($id_pelanggan='',$daritanggal,$hinggatanggal){
		$CI=& get_instance();
		// $cek_wilayah = $CI->db->get_where('wilayah', array('id_wil' => $id));
		$cek_do=$CI->db->select('*')
                ->from('tb_det_do')
                ->join('tb_do','tb_do.id_do=tb_det_do.id_do')
                
                ->join('tb_det_muatan','tb_det_muatan.id_muatan=tb_det_do.id_muatan')
                ->join('tb_kendaraan','tb_do.id_kendaraan=tb_kendaraan.id_kendaraan')
                ->join('tb_driver','tb_driver.id_driver=tb_kendaraan.id_driver')
                ->join('tb_satuan','tb_satuan.id_satuan=tb_det_muatan.id_satuan')
                ->where(array('tgl_do>='=>$daritanggal,'tgl_do<='=>$hinggatanggal,'tb_do.id_pelanggan'=>$id_pelanggan))
                ->order_by('tb_do.id_pelanggan','ASC')
                ->order_by('tb_det_do.id_det_do','ASC')
                ->get();

		
		
		
		return $cek_do;
	}


?>