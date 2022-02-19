<!DOCTYPE html>
<html><head>
	<title>Laporan Gaji Karyawan</title>
	<style>
        table {
            border-collapse: collapse;
        }
        table td {
            border: 1px solid black;
            background-color: #0000ff66;
        } 
        table tr {
            border: 0px solid black;
            background-color: #0000ff66;
        }

        table th {
            border: 1px solid black;
            background-color: #0000ff66;
        }
        .rowspan {
            border-left-width: 10px;
        }
    </style>
</head><body>
    <div style="padding:0 50px">
        <div align="center" style="margin-left: 80px; position: static;">
            <h2>TOKO MARINS CAKE
                <br>KEDIRI JAWATIMUR
            </h2>
            <div style="margin-top: -15px; margin-bottom: 7px;">Jalan Dandang Gendis No. 335B  
                <br>Kelurahan Doko Kecamatan Ngasem Kediri
            </div>
        </div>
        
        <img src="assets/client/images/logo-light.png" style="width: 16%; height: auto; position: absolute; margin-top: 35px; margin-left: 60px;">
        <hr style="border: 1.5px solid black;margin-top:-10px;position:static">
        <div align="center">
            LAPORAN GAJI KARYAWAN
            <br>Bulan .... Tahun ....
        </div>
        <br>
        <div class="container-fluid" align="center" style="margin-top: 20px;">
            <table>
                <tr>
                    <th align="center" colspan="3" width="40" style="padding: 7px 0;">NO</th>
                    <th align="center" colspan="5" width="200">Nama Karyawan</th>
                    <th align="center" colspan="5" width="100">Gaji</th>
                    <th align="center" colspan="5" width="100">Status</th>
                </tr>

                <?php
                $no = 1;
                foreach ($data_karyawan as $data_kr): ?>
                <tr>
                    <td colspan="3" align="center" height="15" style="padding: 5px 0;">
                        <?= $no++ ?>
                    </td>
                    <td colspan="5" align="left" style="margin-left: 5px; padding-left:10px">
                        <?= $data_kr['nama'] ?>
                    </td>
                    <td colspan="5" align="center">
                        Rp <?php echo number_format($data_kr['gaji'], 0, '', '.') ?>
                    </td>
                    <td colspan="5" align="center">
                        <?php 
                            if ($gaji_karyawan == null) {
                                echo "Belum terbayar";
                            }else{
                                foreach ($gaji_karyawan as $gaji_kr):
                                    $gj_kr[] = $gaji_kr['idKaryawan'].$gaji_kr['bulan'];
                                endforeach;

                                if (in_array($data_kr['idKaryawan'].$bulan_tahun, $gj_kr))
                                    {echo "Terbayar";}
                                else{echo "Belum terbayar";}
                            }
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <br>
        <div align="right">
            Madiun, 10 Januari 2022
            <br>Pimpinan Toko Kue
            <br><br><br><br>
            <h4>Ahmad Syah M.</h4>    
        </div>
    </div>
</body></html>