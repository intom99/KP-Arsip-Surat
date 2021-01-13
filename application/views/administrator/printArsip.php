<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/koperasi.png'); ?>" />

    <style>
        .line-title {
            border: 1;
            border-style: inset;
            border-top: 2px solid #000;
        }

        /*  */

        .table-bordered td,
        .table-bordered th {
            border-color: black !important;
        }
    </style>

</head>


<body>
    <div class="container">
        <img src="<?php echo base_url('assets/img/gambar.png'); ?>" style="position: absolute; width: 110px; height: 110px;">
        <table style="width: 100%;" class="mt-3">
            <tr>
                <td class="text-center">
                    <span style="line-height: 1.3; font-weight: bold;">
                        KOPERASI SIMPAN PINJAM DAN PEMBIAYAAN SYARIAH
                        <br>(KSPPS) "BMT SEHATI"
                    </span>
                    <p>Kantor : Jl. Bantul 205 Karanggondang Pendowoharjo Sewon <br>
                        Telpon : (0274) 6466276/085702501922, Email : bmtsehati01@gmail.com</p>
                </td>
            </tr>
        </table>
        <hr class="line-title">
        <p class="text-center mt-4">
            <b>Laporan <?php echo $laporan ?></b>
            <br>
            <b> <?php echo $subtitle ?></b>
        </p>
        <table class="table table-bordered mb-5">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No. Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Instansi</th>
                    <th>Perihal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($daftarFilter as $row) : ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td><?php echo format_indo(date('Y-m-d', strtotime($row->created)))
                            //date('d M Y', strtotime($row->created)) 
                            ?></td>
                        <td><?php echo $row->no_surat ?></td>
                        <td><?php echo format_indo(date('Y-m-d', strtotime($row->tgl_surat))) ?></td>
                        <td><?php echo $row->nama_instansi ?></td>
                        <td><?php echo $row->perihal ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <!--  -->
        <p class="text-right mr-4">Bantul, <?php echo format_indo(date('Y-m-d')) ?></p>
        <br>
        <br>
        <p class="text-right mr-5 pr-5">
            <?php echo $this->session->userdata('username');
            //echo $user->nama_karyawan

            ?>
        </p>
    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>