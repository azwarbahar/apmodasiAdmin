<?php
require_once '../template/header/header.php';
$kader = mysqli_query($conn, "SELECT * FROM tb_kader");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Kader</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Kader</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <!-- <label for="inputName">Kelurahan</label>
                <div class="row">
                  <div class="col-4">
                    <select class="form-control select2" style="width: 100%;" name="kelurahan_masyarakat" id="kelurahan_masyarakat">
                      <option selected="selected" value="-">- Semua -</option>
                      <option value="Balang Baru">Balang Baru</option>
                      <option value="Barombong">Barombong</option>
                      <option value="Bongaya">Bongaya</option>
                      <option value="Bonto Duri">Bonto Duri</option>
                      <option value="Jongaya">Jongaya</option>
                      <option value="Maccini Sombala">Maccini Sombala</option>
                      <option value="Mangasa">Mangasa</option>
                      <option value="Mannuruki">Mannuruki</option>
                      <option value="Pa'baeng-Baeng">Pa'baeng-Baeng</option>
                      <option value="Parang Tambung">Parang Tambung</option>
                      <option value="Tanjung Merdeka">Tanjung Merdeka</option>
                    </select>
                  </div>

                  <div class="col-8">
                  <a href="invoice-print.html" target="_blank" class="btn btn-info float-right"><i class="fas fa-print"></i> Print</a>
                  </div>

                </div> -->
                <button data-toggle="modal" data-target="#modal-lg" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Kader</a>
              </div>


                <!-- Modal Tambah KADER -->
                <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-lg">
                    <form method="POST" action="controller.php" enctype="multipart/form-data">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Kader</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                        <!-- <div class="form-group">
                          <label for="inputName">NIP</label>
                          <input type="text" id="nip_kader" name="nip_kader"class="form-control" required>
                        </div> -->

                        <div class="form-group">
                          <label for="inputName">NIK</label>
                          <input type="text" id="nip_kader" name="nip_kader"class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Nama Lengkap</label>
                          <input type="text" id="nama_kader" name="nama_kader"class="form-control" required>
                        </div>

                        <div class="form-group">
                        <label for="inputName">Jenis Kelamin</label>
                          <select class="form-control select2" style="width: 100%;" name="jenis_kelamin_kader" id="jenis_kelamin_kader">
                            <option selected="selected" value="Laki - laki">- Pilih -</option>
                            <option value="Laki - laki">Laki - laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Kontak</label>
                          <input type="text" id="kontak_kader" name="kontak_kader"class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Alamat</label>
                          <input type="text" id="alamat_kader" name="alamat_kader"class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="customFile">Foto</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto_kader" name="foto_kader" onchange="readURL(this);" >
                            <label class="custom-file-label" for="foto_kader">Choose file</label>
                          </div>
                        </div>
                        <br>
                        <img style="max-width:180px; max-height:180px;" id="blah" src="../../assets/dist/img/default-150x150.png" alt="your image" />

                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" name="submit_kader" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->


              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Foto</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($kader as $dta) { ?>
                  <tr>
                    <td style="text-align: center">
                      <a href="../../assets/dist/img/kader/<?= $dta['foto_kader'] ?>" data-toggle="lightbox" data-title="Nama : <?= $dta['nama_kader'] ?>" data-gallery="gallery">
                        <img src="../../assets/dist/img/kader/<?= $dta['foto_kader'] ?>" border=3 height=60 width=60 class="img-fluid mb-2" alt="red sample"/>
                      </a>
                    </td>
                    <td style="text-align:center"><?= $dta['nik_kader'] ?></td>
                    <td><?= $dta['nama_kader'] ?></td>
                    <td><?= $dta['kontak_kader'] ?></td>
                    <?php
                      if ($dta['status_kader']=="Active"){
                        echo " <td style='text-align:center'><span class='badge bg-info'> $dta[status_kader] </span>";
                      } else{
                        echo " <td style='text-align:center'><span class='badge bg-danger'> $dta[status_kader] </span>";
                      }
                    ?>
                    <td style="text-align:center; width: 20px;">
                      <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                          <i class="fas fa fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                          <!-- <a href="#" class="dropdown-item">Detail</a> -->
                          <a href="#" data-toggle="modal" data-target="#modal-lg<?= $dta['nik_kader'] ?>"  class="dropdown-item">Edit</a>
                          <a href="#" data-toggle="modal" data-target="#modal-danger<?= $dta['nik_kader'] ?>" class="dropdown-item">Hapus</a>
                        </div>
                      </div>
                    </td>
                  </tr>


                <!-- Modal EDIT KADER -->
                <div class="modal fade" id="modal-lg<?= $dta['nik_kader'] ?>">
                  <div class="modal-dialog modal-lg">
                    <form method="POST" action="controller.php" enctype="multipart/form-data">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Kader</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                        <div class="form-group">
                          <label for="inputName">NIK</label>
                          <input type="text" value="<?= $dta['nik_kader'] ?>" id="nip_kader" name="nip_kader"class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Nama Lengkap</label>
                          <input type="text" value="<?= $dta['nama_kader'] ?>" id="nama_kader" name="nama_kader"class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Jenis Kelamin</label>
                          <div class="col-sm-9">
                            <select name="jenis_kelamin_kader" id="jenis_kelamin_kader" class="form-control">
                            <?php
                              if ($dta['jenis_kelamin_kader']=="Laki - laki"){
                                echo "<option selected='selected' value='Laki - laki'>Laki - laki</option>
                                  <option value='Perempuan'>Perempuan</option>";
                              } else{
                                echo "<option value='Laki - laki'>Laki - laki</option>
                                  <option selected='selected' value='Perempuan'>Perempuan</option>";
                              }
                            ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Kontak</label>
                          <input type="text" value="<?= $dta['kontak_kader'] ?>" id="kontak_kader" name="kontak_kader"class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Alamat</label>
                          <input type="text" value="<?= $dta['alamat_kader'] ?>" id="alamat_kader" name="alamat_kader"class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Status Akun</label>
                          <div class="col-sm-9">
                            <select name="status_kader" id="status_kader" class="form-control">
                            <?php
                              if ($dta['status_kader']=="Active"){
                                echo "<option selected='selected' value='Active'>Active</option>
                                  <option value='Suspend'>Suspend</option>";
                              } else{
                                echo "<option value='Active'>Active</option>
                                  <option selected='selected' value='Suspend'>Suspend</option>";
                              }
                            ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="customFile">Foto</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto_kader" name="foto_kader" onchange="readURL(this);" >
                            <label class="custom-file-label" for="foto_kader">Choose file</label>
                          </div>
                        </div>
                        <br>
                        <img style="max-width:180px; max-height:180px;" id="blah" src="../../assets/dist/img/kader/<?= $dta['foto_kader'] ?>" alt="your image" />


                        </div>
                        <div class="modal-footer justify-content-between">
                          <input type="hidden" value="<?= $dta['nik_kader'] ?>" name="nip_kader_now">
                          <input type="hidden" name="foto_now" value="<?= $dta['foto_kader'] ?>">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" name="edit_kader" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

      <!-- Modal Hapus -->
      <div class="modal fade" id="modal-danger<?= $dta['nip_kader'] ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Akun Kader?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin Ingin Menghapus Akun Kader</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
              <a href="controller.php?hapus_kader=true&nip_kader=<?= $dta['nip_kader'] ?>" type="button" class="btn btn-outline-light">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

                  <?php $i = $i + 1; } ?>
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
require '../template/footer/footer.php';
?>