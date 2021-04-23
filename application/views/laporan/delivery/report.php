<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
table {
    border-collapse: collapse;
}
table.tabel{
    border-collapse: collapse;
}
td.garis {
  border-bottom: 1pt solid black;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Order</title>
</head>
<body onload="window.print()" >
   
   <table border="1px" width="100%">
   	 <tr>
   	 	<td colspan="11">
   	 		<center>
				<h3>PT.AMATA DJAJA PRIMA.<br/>Laporan DO Per Customer<br>
                Periode <?=date_format(date_create($daritanggal),"d-m-Y")?> S/D <?=date_format(date_create($hinggatanggal),"d-m-Y")?>
                </h3>
			</center>
   	 	</td>
   	 </tr>
     <tr>
       <td colspan="11">&nbsp</td>
     </tr>
     <tr>
      
      <th>No DO</th>
      <th>Tanggal</th>
      <th>Asal </th>
      <th>Tujuan</th>
      <th>No Mobil</th>
      <th>Sopir</th>
      <th>Muatan</th>
      <th>Qty</th>
      <th>Satuan</th>
      <th>Harga</th>
      <th>Jumlah</th>
    </tr>	
    <?php
      $no=1;
      $total=0;
    //   var_dump($data);
      foreach($data as $l){
          
    ?>
    <tr>
      <td colspan="11"><strong><?=$l->nama_pelanggan?></strong></td>
      
    </tr>	
    <?php
        $hasildo=get_do($l->id_pelanggan,$daritanggal,$hinggatanggal);
        // var_dump($hasildo->result());
        // echo "hr";
        // var_dump($l->pel);
        $total=0;
        foreach($hasildo->result() as $h){
            $total+=$h->tarif*$h->jumlah;
    ?>
    <tr>
        <td><?=$h->no_do?></td>
        <td><?=$h->tgl_do?></td>
        <td><?=$h->dari?></td>
        <td><?=$h->tujuan?></td>
        <td><?=$h->nomor_plat?></td>
        <td><?=$h->nama_driver?></td>
        <td><?=$h->muatan?></td>
        <td align="right"><?=number_format($h->jumlah)?></td>
        <td align="center"><?=$h->nama_satuan?></td>
        <td align="right"><?=number_format($h->tarif)?></td>
        <td align="right"><?=number_format($h->tarif*$h->jumlah)?></td>
    </tr>
    
    <?php
        }
    ?>
    <tr>
        
        <td colspan="10"><strong>Grand Total</strong></td>
        
        <td align="right"><?=number_format($total)?></td>
    </tr>
    <hr>
    <tr>
        
        <td align="center" colspan="11">&nbsp</td>
        
       
    </tr>
    <?php
      }
    ?>
    
    
    <tr>
      
      <td colspan="11">
	  <br>
        <table border="0" width="100%">
          <tr>
            <td width="50%">&nbsp</td>
            <td width="50%" align="center">Bandar Lampung, <?=date('d M Y')?></td>
          </tr>
          <tr>
            <td width="50%">&nbsp</td>
            <td width="50%" align="center">Mengetahui</td>
          </tr>
          <tr>
            <td width="50%">&nbsp</td>
            <td width="50%" align="center">Pimpinan</td>
          </tr>
          <tr>
            <td width="50%">&nbsp</td>
            <td width="50%" align="center">&nbsp</td>
          </tr>
          <tr>
            <td width="50%">&nbsp</td>
            <td width="50%" align="center">&nbsp</td>
          </tr>
          <tr>
            <td width="50%">&nbsp</td>
            <td width="50%" align="center">&nbsp</td>
          </tr>
          <tr>
            <td width="50%">&nbsp</td>
            <td width="50%" align="center">&nbsp</td>
          </tr> 
          <tr>
            <td width="50%">&nbsp</td>
            <td width="50%" align="center">(...................................................)</td>
          </tr>
        </table>
		<br>
      </td>
    </tr>
    
   </table>	
</body>
</html>

