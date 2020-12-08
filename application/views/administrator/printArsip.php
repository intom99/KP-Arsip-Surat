<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/koperasi.png'); ?>" />
    <title><?php echo $title ?></title>
</head>

<body>
    <img src="<?php echo base_url('assets/img/gambar.png'); ?>" alt="logo" width="100px" height="100px">
    <h1 class="text-align-center"> <?php
                                    echo $title;

                                    ?></h1>
    <h3><?php echo $subtitle; ?></h3>

    <table class="border">
        <thead>
            <tr>
                <td>No</td>
                <td>Tanggal</td>
                <td>No. Surat</td>
                <td>Tanggal Surat</td>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($daftarFilter as $row) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo date('d M Y', strtotime($row->created)) ?></td>
                    <td><?php echo $row->no_surat ?></td>
                    <td><?php echo date('d M Y', strtotime($row->tgl_surat)) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>