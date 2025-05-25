<?php
include '../config/db.php';
$result = $conn->query("SELECT * FROM INSIGHT");
?>

<h2>Daftar Insight</h2>
<table border="1">
<tr><th>Judul</th><th>Tanggal</th><th>Wilayah</th><th>Isi</th></tr>
<?php while ($i = $result->fetch_assoc()): ?>
<tr>
    <td><?= $i['judul_insight'] ?></td>
    <td><?= $i['tanggal_insight'] ?></td>
    <td>
        <?php
        $id = $i['id_wilayah'];
        $wil = $conn->query("SELECT * FROM WILAYAH WHERE id_wilayah = '$id'")->fetch_assoc();
        echo $wil['provinsi'] . ', ' . $wil['kabupaten/kota'];
        ?>
    </td>
    <td><?= $i['isi_insight'] ?></td>
</tr>
<?php endwhile; ?>
</table>
