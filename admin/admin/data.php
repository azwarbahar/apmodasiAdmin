<?php
require_once '../template/header/header.php';
$admin = mysqli_query($conn, "SELECT * FROM tb_admin");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/apmodasi/admin/">Home</a></li>
              <li class="breadcrumb-item active">Admin</li>
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
                <button data-toggle="modal" data-target="#modal-lg" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Admin</a>
              </div>


                <!-- Modal Tambah AREA -->
                <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-lg">
                    <form method="POST" action="controller.php" enctype="multipart/form-data">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Admin</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                        <div class="form-group">
                          <label for="inputName">Nama Lengkap</label>
                          <input type="text" id="nama_admin" name="nama_admin"class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="inputName">Email</label>
                          <input type="email" id="email_admin" name="email_admin"class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="inputName">Username</label>
                          <input type="text" id="username_admin" name="username_admin"class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="inputName">Password</label>
                          <input type="password" id="password_admin" name="password_admin"class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="customFile">Foto</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto_admin" name="foto_admin" onchange="readURL(this);" >
                            <label class="custom-file-label" for="foto_admin">Choose file</label>
                          </div>
                        </div>
                        <br>
                        <img style="max-width:180px; max-height:180px;" id="blah" src="/apmodasi/assets/dist/img/default-150x150.png" alt="your image" />


                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" name="submit_admin" class="btn btn-primary">Simpan</button>
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Satus</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($admin as $dta) { ?>
                  <tr>
                    <td style="text-align:center"><?= $i ?></td>
                    <td style="text-align: center">
                      <a href="/apmodasi/assets/dist/img/admin/<?= $dta['foto_admin'] ?>" data-toggle="lightbox" data-title="Nama : <?= $dta['nama_admin'] ?>" data-gallery="gallery">
                        <img src="/apmodasi/assets/dist/img/admin/<?= $dta['foto_admin'] ?>" border=3 height=60 width=60 class="img-fluid mb-2" alt="red sample"/>
                      </a>
                    </td>
                    <td><?= $dta['nama_admin'] ?></td>
                    <td><?= $dta['email_admin'] ?></td>
                    <?php
                      if ($dta['status_admin']=="Active"){
                        echo " <td style='text-align:center'><span class='badge bg-success'> $dta[status_admin] </span>";
                      } else{
                        echo " <td style='text-align:center'><span class='badge bg-danger'> $dta[status_admin] </span>";
                      }
                    ?>
                    <td style="text-align:center">
                      <div class="btn-group btn-group-sm">
                        <button data-toggle="modal" data-target="#modal-lg<?= $dta['id_admin'] ?>"  type="button" class="btn btn-info"><i class="fas fa-edit"></i></button>
                        <button data-toggle="modal" data-target="#modal-danger<?= $dta['id_admin'] ?>" type="button"  class="btn btn-danger"><i class="fas fa-trash"></i></button>
                      </div>
                    </td>
                  </tr>

                <!-- Modal EDIT ADMIN -->
                <div class="modal fade" id="modal-lg<?= $dta['id_admin'] ?>">
                  <div class="modal-dialog modal-lg">
                    <form method="POST" action="controller.php" enctype="multipart/form-data">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Admin</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                        <div class="form-group">
                          <label for="inputName">Nama Lengkap</label>
                          <input type="text" value="<?= $dta['nama_admin'] ?>" id="nama_admin" name="nama_admin"class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="inputName">Email</label>
                          <input type="email" value="<?= $dta['email_admin'] ?>" id="email_admin" name="email_admin"class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="inputName">Username</label>
                          <input type="text" value="<?= $dta['username_admin'] ?>" id="username_admin" name="username_admin"class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="inputName">Status Akun</label>
                          <div class="col-sm-9">
                            <select name="status_admin" id="status_admin" class="form-control">
                            <?php
                              if ($dta['status_admin']=="Active"){
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
                            <input type="file" class="custom-file-input" id="foto_admin" name="foto_admin" onchange="readURL(this);" >
                            <label class="custom-file-label" for="foto_admin">Choose file</label>
                          </div>
                        </div>
                        <br>
                        <img style="max-width:180px; max-height:180px;" id="blah" src="/apmodasi/assets/dist/img/admin/<?= $dta['foto_admin'] ?>" alt="your image" />

                        </div>
                        <div class="modal-footer justify-content-between">
                          <input type="hidden" value="<?= $dta['foto_admin'] ?>" name="foto_now">
                          <input type="hidden" value="<?= $dta['id_admin'] ?>" name="id_admin">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" name="edit_admin" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

      <!-- Modal Hapus -->
      <div class="modal fade" id="modal-danger<?= $dta['id_admin'] ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Akun Admin?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin Ingin Menghapus Akun Admin</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
              <a href="controller.php?hapus_admin=true&id_admin=<?= $dta['id_admin'] ?>" type="button" class="btn btn-outline-light">Hapus</a>
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