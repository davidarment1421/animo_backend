<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stok Bahan</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body style="width: 70%; margin: 0 auto; padding-top: 30px;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Stok Bahan </h2>
            </div>
        </div>
    </div>
    <hr>
    <!--fungsi read data-->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <table class="table table-bordered">
                <tr>
                    <th>Tanggal Update</th>
                    <th>Nama Bahan</th>
                    <th>Sub Bahan</th>
                    <th>Satuan</th>
                    <th>Stok Awal</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Action</th>

                </tr>
                <?php foreach ($stok as $row) : ?>
                    <tr>

                        <td><?= $row['updateDate']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['subBahan']; ?></td>
                        <td><?= $row['satuan']; ?></td>
                        <td><?= $row['stokAwal']; ?></td>
                        <td><?= $row['stokMasuk']; ?></td>
                        <td><?= $row['stokKeluar']; ?></td>
                        <td>
                            <a href='#' class="btn btn-primary btn-sm btn-edit" data-updateDate="<?= $row['updateDate']; ?>" data-stokAwal="<?= $row['stokAwal']; ?>" data-stokMasuk="<?= $row['stokMasuk']; ?>" data-stokKeluar="<?= $row['stokKeluar']; ?>">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <!--end fungsi read data-->
                <!--fungsi search-->
                <form method="get" action="<?php echo ('http://localhost:8081/stokbahan/pencarian/') ?>">
                    <div class="col-md-2 col-sm-2 col-xs-2" align="center">Nama Bahan

                        <select class="form-control" name="nama">
                            <option>Semua</option>
                            <option value="Tepung">Tepung</option>
                            <option value="Minyak">Minyak</option>
                            <option value="Telur">Telur</option>
                        </select>
                    </div>
                    <br><input type="submit" class="btn btn-primary" value="Cari">
                </form>
            </table>
            <!--end fungsi search-->
            <!--fungsi update-->
            <form action="<?php echo ('http://localhost:8081/stokbahan/update/') ?>" method="post">
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Bahan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Tanggal Update</label>
                                    <input type="date" class="form-control updateDate" name="updateDate">
                                </div>

                                <div class="form-group">
                                    <label>Stok Awal</label>
                                    <input type="number" class="form-control stokAwal" name="stokAwal">
                                </div>

                                <div class="form-group">
                                    <label>Stok Masuk</label>
                                    <input type="text" class="form-control stokMasuk" name="stokMasuk">
                                </div>

                                <div class="form-group">
                                    <label>Stok Keluar</label>
                                    <input type="text" class="form-control stokKeluar" name="stokKeluar">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" class="id">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <script>
                $(document).ready(function() {
                    $('.btn-edit').on('click', function() {
                        // get data from button edit
                        const id = $(this).data('id');
                        const updateDate = $(this).data('updateDate');
                        const stokAwal = $(this).data('stokAwal');
                        const stokMasuk = $(this).data('stokMasuk');
                        const stokKeluar = $(this).data('stokKeluar');

                        // Set data to Form Edit
                        $('.id').val(id);
                        $('.updateDate').val(updateDate);
                        $('.stokAwal').val(stokAwal);
                        $('.stokMasuk').val(stokMasuk);
                        $('.stokKeluar').val(stokKeluar);
                        // Call Modal Edit
                        $('#editModal').modal('show');
                    });
                });
            </script>

            <!--end-->




</body>

</html>