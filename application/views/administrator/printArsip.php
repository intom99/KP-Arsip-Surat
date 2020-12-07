<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>

<body>
    <h1 class="text-center"> <?php
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
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>