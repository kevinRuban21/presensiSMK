
        <?php foreach ($presensi_terbaru as $key => $d) { ?>
        <li>
            <h6><?= $d['nama_siswa'] ?></h6>
            <p>Tanggal : <?= $d['tgl_presensi'] ?></p>
            <p>Jam Masuk : <?= $d['jam_masuk'] ?></p>
            <p>Jam Pulang : <?= $d['jam_pulang'] ?></p>
        </li>
        <?php } ?>
    