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
   	 	<td colspan="7">
   	 		<center>
				<h3>PT.AMATA DJAJA PRIMA.<br/>Laporan Order<br></h3>
			</center>
   	 	</td>
   	 </tr>
     <tr>
       <td colspan="7">&nbsp</td>
     </tr>
     <tr>
      <th>No</th>
      <th>No Faktur</th>
      <th>Tanggal</th>
      <th>Nama Pelanggan</th>
      <th>Jatuh Tempo</th>
      <th>Total</th>
    </tr>	
    <?php
      $no=1;
      $total=0;
      foreach($data->result() as $l){
        $total+=$l->subtotal;
    ?>
    <tr>
      <td align="center"><?=$no++?></td>
      <td><?=$l->nomor_faktur?></td>
      <td><?=$l->tgl_faktur?></td>
      <td><?=$l->nama_pelanggan?></td>
      <td><?=$l->next_tagih?></td>
      <td align="right"><?php echo number_format($l->subtotal)?></td>
    </tr>
    <?php
      }
    ?>
    <tr>
      <td colspan="5" align="left">Total</td>
      <td align="right"><?php echo number_format($total)?></td>
    </tr>
    <tr>
      <td colspan="6">&nbsp</td>
    </tr>
    <tr>
      
      <td colspan="6">
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
            <td width="50%" align="center">(             )</td>
          </tr>
        </table>
		<br>
      </td>
    </tr>
    
   </table>	
</body>
</html>

