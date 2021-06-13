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
				<h3>PT.AMATA DJAJA PRIMA.<br/>Invoice<br>
                <!-- Periode <?=date_format(date_create($daritanggal),"d-m-Y")?> S/D <?=date_format(date_create($hinggatanggal),"d-m-Y")?> -->
                </h3>
			</center>
   	 	</td>
   	 </tr>
   
    <tr>
       <td colspan="11">
        <table border="0px" width="80%">
            <tr>
                <td width="200px">Nama Pelanggan</td>
                <td><?=$pelanggan->nama_pelanggan?></td>
            </tr>
            <tr>
                <td width="200px">Alamat</td>
                <td><?=$pelanggan->alamat_pelanggan?></td>
            </tr>
            <tr>
                <td width="200px">No Telp</td>
                <td><?=$pelanggan->no_telp?></td>
            </tr>
            <tr>
                <td colspan='2'>&nbsp</td>
            </tr>
        </table>
        <table border="1px" width="80%">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>No DO</th>
                <th>No Plat</th>
                <th>Tagihan</th>
            </tr>
            <?php
                $no=1;
                $total=0;
                foreach($data->result() as $d){
                    $total+=$d->subtotal
            ?>
            <tr>
                <td align="center"><?=$no++;?></td>
                <td><?=$d->tgl_do?></td>
                <td><?=$d->nama_pelanggan?></td>
                <td><?=$d->nomor_plat?> </td>
                <td align="right">
                <?=number_format($d->subtotal)?>
                </td>
            </tr>
            <?php

                }
            ?>
            <tr>
                <td colspan="4">Total</td>
                <td align="right"><?=number_format($total)?></td>
            </tr>
            
        </table>
        <br>
       </td>
    </tr>
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

