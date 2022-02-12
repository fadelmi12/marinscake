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
	<div class="container-fluid" align="center">
		<table>
        <tr>
            <th align="center" colspan="3">NO</th>
            <th align="center" colspan="5">Nama Karyawan</th>
            <th align="center" colspan="5">Posisi</th>
            <th align="center" colspan="5">Bulan</th>
            <th align="center" colspan="5">Gaji</th>
        </tr>

        <?php
        $no = 1;
        foreach($gaji_karyawan as $gaji): ?>
        <tr>
            <td colspan="2" align="center">
                <?= $no++ ?>
            </td>
            <td colspan="2" align="center">
                <?= $gaji['nama'] ?>
            </td>
            <td colspan="2" align="center">
                <?= $gaji['posisi'] ?>
            </td>
            <td colspan="2" align="center">
                <?= $gaji['bulan'] ?>
            </td>
            <td colspan="2" align="center">
                <?= $gaji['gaji'] ?>
            </td>
        </tr>
        <?php endforeach; ?>
	</table>
	</div>
</body></html>