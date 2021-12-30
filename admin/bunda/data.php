<?php
require_once '../template/header/header.php';
$bunda = mysqli_query($conn, "SELECT * FROM tb_bunda");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Bunda</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Bunda</li>
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
                <button data-toggle="modal" data-target="#modal-lg" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Bunda</a>
              </div>
                <!-- Modal Tambah bunda -->
                <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-lg">
                    <form method="POST" action="controller.php" enctype="multipart/form-data">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Bunda</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                        <div class="form-group">
                          <label for="inputName">NIK Bunda</label>
                          <input type="text" id="nik_bunda" name="nik_bunda"class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Nama Lengkap</label>
                          <input type="text" id="nama_bunda" name="nama_bunda"class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Kontak</label>
                          <input type="text" id="kontak_bunda" name="kontak_bunda"class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Alamat</label>
                          <input type="text" id="alamat_bunda" name="alamat_bunda"class="form-control" required>
                        </div>

                        <div class="form-group">
                        <label for="inputName">Kelurahan/Desa</label>
                          <select class="form-control select2" style="width: 100%;" name="kelurahan_bunda" id="kelurahan_bunda">
                            <option selected="selected" value="-">- Pilih -</option>
                            <option value="Tetebatu">Tetebatu</option>
                            <option value="Parangbanoa">Parangbanoa</option>
                            <option value="Pangkabinanga">Pangkabinanga</option>
                            <option value="Jenetallasa">Jenetallasa</option>
                            <option value="Bontoala">Bontoala</option>
                            <option value="Panakukang">Panakukang</option>
                            <option value="Taeng">Taeng</option>
                            <option value="Mangalli">Mangalli</option>
                          </select>
                        </div>

                        <!-- <div class="form-group">
                          <label for="inputName">Username</label>
                          <input type="text" id="username_bunda" name="username_bunda"class="form-control" required>
                        </div> -->

                        <div class="form-group">
                          <label for="customFile">Foto</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto_bunda" name="foto_bunda" onchange="readURL(this);" >
                            <label class="custom-file-label" for="foto_bunda">Choose file</label>
                          </div>
                        </div>
                        <br>
                        <img style="max-width:180px; max-height:180px;" id="blah" src="../../assets/dist/img/default-150x150.png" alt="your image" />


                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" name="submit_bunda" class="btn btn-primary">Simpan</button>
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
                    <th>No</th>
                    <th>Foto</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Bayi</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($bunda as $dta) { ?>
                  <tr>
                    <td style="text-align:center"><?= $i ?></td>
                    <td style="text-align: center">
                      <a href="../../assets/dist/img/bunda//<?= $dta['foto_bunda'] ?>" data-toggle="lightbox" data-title="Nama : <?= $dta['nama_bunda'] ?>" data-gallery="gallery">
                        <img src="../../assets/dist/img/bunda//<?= $dta['foto_bunda'] ?>" border=3 height=60 width=60 class="img-fluid mb-2" alt="red sample"/>
                      </a>
                    </td>
                    <td><?= $dta['nik_bunda'] ?></td>
                    <td><?= $dta['nama_bunda'] ?></td>
                    <td><?= $dta['kontak_bunda'] ?></td>
                    <?php
                      $bayi_bunda = mysqli_query($conn, "SELECT * FROM tb_bayi WHERE nik_bunda = '$dta[nik_bunda]' ");
                      $row_bayi_bunda = mysqli_num_rows($bayi_bunda);
                      $row_bayi_bunda_final = $row_bayi_bunda;
                    ?>
                    <td style="text-align:center">
                    <span class="badge badge-info"><?= $row_bayi_bunda_final ?> Orang</span>
                    </td>
                    <td style="text-align:center; width: 20px;">
                      <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                          <i class="fas fa fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                          <!-- <a href="#" class="dropdown-item">Detail</a> -->
                          <a href="#" data-toggle="modal" data-target="#modal-lg<?= $dta['nik_bunda'] ?>"  class="dropdown-item">Edit</a>
                          <a href="#" data-toggle="modal" data-target="#modal-danger<?= $dta['nik_bunda'] ?>" class="dropdown-item">Hapus</a>
                        </div>
                      </div>
                    </td>
                  </tr>



                <!-- Modal EDIT BUNDA -->
                <div class="modal fade" id="modal-lg<?= $dta['nik_bunda'] ?>">
                  <div class="modal-dialog modal-lg">
                    <form method="POST" action="controller.php" enctype="multipart/form-data">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Bunda</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                        <div class="form-group">
                          <label for="inputName">NIK Bunda</label>
                          <input type="text" value="<?= $dta['nik_bunda'] ?>" id="nik_bunda" name="nik_bunda"class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Nama Lengkap</label>
                          <input type="text" value="<?= $dta['nama_bunda'] ?>" id="nama_bunda" name="nama_bunda"class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="inputName">Kontak</label>
                          <input type="text" value="<?= $dta['kontak_bunda'] ?>" id="kontak_bunda" name="kontak_bunda"class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="inputName">Alamat</label>
                          <input type="text" value="<?= $dta['alamat_bunda'] ?>" id="alamat_bunda" name="alamat_bunda"class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="inputName">Kelurahan/Desa</label>
                          <select class="form-control select2" style="width: 100%;" name="kelurahan_bunda" id="kelurahan_bunda">
                            <option selected="selected" value="<?= $dta['kelurahan_bunda'] ?>"><?= $dta['kelurahan_bunda'] ?></option>
                            <option value="Tetebatu">Tetebatu</option>
                            <option value="Parangbanoa">Parangbanoa</option>
                            <option value="Pangkabinanga">Pangkabinanga</option>
                            <option value="Jenetallasa">Jenetallasa</option>
                            <option value="Bontoala">Bontoala</option>
                            <option value="Panakukang">Panakukang</option>
                            <option value="Taeng">Taeng</option>
                            <option value="Mangalli">Mangalli</option>
                          </select>
                        </div>


                          <?php
                            $get_auth = mysqli_query($conn, "SELECT * FROM tb_auth WHERE user_kode = '$dta[nik_bunda]' AND role = 'Bunda' ");
                            $data_auth = mysqli_fetch_assoc($get_auth);
                          ?>

                          <div class="form-group">
                            <label for="inputName">Status Akun</label>
                            <div class="col-sm-9">
                              <select name="status_bunda" id="status_bunda" class="form-control">
                              <?php
                                if ($data_auth['status']=="Active"){
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
                            <input type="file" class="custom-file-input" id="foto_bunda" name="foto_bunda" onchange="readURL(this);" >
                            <label class="custom-file-label" for="foto_bunda">Choose file</label>
                          </div>
                        </div>
                        <br>
                        <img style="max-width:180px; max-height:180px;" id="blah" src="../../assets/dist/img/bunda/<?= $dta['foto_bunda'] ?>" alt="your image" />

                        </div>
                        <div class="modal-footer justify-content-between">
                          <input type="hidden" name="nik_bunda_now" value="<?= $dta['nik_bunda'] ?>">
                          <input type="hidden" name="foto_now" value="<?= $dta['foto_bunda'] ?>">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" name="edit_bunda" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="modal-danger<?= $dta['nik_bunda'] ?>">
                      <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                          <div class="modal-header">
                            <h4 class="modal-title">Hapus Akun Bunda?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Yakin Ingin Menghapus Akun Bunda</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                            <a href="controller.php?hapus_bunda=true&nik_bunda=<?= $dta['nik_bunda'] ?>" type="button" class="btn btn-outline-light">Hapus</a>
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