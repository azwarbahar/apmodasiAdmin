<?php
require_once '../template/header/header.php';
$bayi = mysqli_query($conn, "SELECT * FROM tb_bayi WHERE status_bayi = 'Active'");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Bayi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Bayi</li>
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
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="tab-berjalan" data-toggle="pill" href="#tab-berjalan-pane" role="tab" aria-controls="tab-berjalan" aria-selected="true">Berjalan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-sudah" data-toggle="pill" href="#tab-selesai-panel" role="tab" aria-controls="tab-selesai" aria-selected="false">Selesai</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-semua" data-toggle="pill" href="#tab-semua-panel" role="tab" aria-controls="tab-semua" aria-selected="false">Semua</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="tab-berjalan-pane" role="tabpanel" aria-labelledby="tab-berjalan">
                    <!-- BERJALAN -->
                    <section class="content">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nama Bunda</th>
                                    <th>Tanggal Lahir</th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                    $bayi_berjalan = mysqli_query($conn, "SELECT * FROM tb_bayi WHERE status_bayi = 'Active'");
                                  $i = 1; foreach($bayi_berjalan as $dta) {
                                    $imunisasi_bayi = mysqli_query($conn, "SELECT * FROM tb_imunisasi WHERE bayi_id = '$dta[id_bayi]' AND status_imunisasi = 'Sudah' ");
                                    $row_imunisasi_bayi = mysqli_num_rows($imunisasi_bayi);
                                    // $get_bunda = mysqli_fetch_assoc($imunisasi_bayi);
                                    if ($row_imunisasi_bayi < 9){

                                    ?>
                                  <tr>
                                    <td style="text-align:center"><?= $i ?></td>
                                    <td style="text-align: center">
                                      <a href="../../assets/dist/img/bayi//<?= $dta['foto_bayi'] ?>" data-toggle="lightbox" data-title="Nama : <?= $dta['nama_bayi'] ?>" data-gallery="gallery">
                                        <img src="../../assets/dist/img/bayi//<?= $dta['foto_bayi'] ?>" border=3 height=60 width=60 class="img-fluid mb-2" alt="red sample"/>
                                      </a>
                                    </td>
                                    <td><?= $dta['nama_bayi'] ?></td>
                                    <td><?= $dta['jenis_kelamin_bayi'] ?></td>
                                    <?php
                                      $bunda = mysqli_query($conn, "SELECT * FROM tb_bunda WHERE nik_bunda = '$dta[nik_bunda]'");
                                      $get_bunda = mysqli_fetch_assoc($bunda);
                                      if ($get_bunda == null){
                                        echo '<td style="font-size: 16px;"> - </td>';
                                      } else{
                                        echo '<td style="font-size: 16px;">'. $get_bunda['nama_bunda'].' </td>';
                                      }
                                    ?>
                                    <td><?= $dta['tanggal_lahir_bayi'] ?></td>
                                    <td style="text-align:center">
                                    <?php
                                    if ($row_imunisasi_bayi <= 1) {
                                      ?>
                                        <div class="progress-group">
                                          Imunisasi
                                          <span class="float-right"><b><?= $row_imunisasi_bayi ?></b>/9</span>
                                          <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: 5%"></div>
                                          </div>
                                        </div>
                                      </td>
                                      <?php
                                    } else if ($row_imunisasi_bayi <= 2) {
                                      ?>
                                            <div class="progress-group">
                                              Imunisasi
                                              <span class="float-right"><b><?= $row_imunisasi_bayi ?></b>/9</span>
                                              <div class="progress progress-sm">
                                                <div class="progress-bar bg-danger" style="width: 15%"></div>
                                              </div>
                                            </div>
                                          </td>
                                      <?php
                                    } else if ($row_imunisasi_bayi <= 3) {
                                            ?>
                                                <div class="progress-group">
                                                  Imunisasi
                                                  <span class="float-right"><b><?= $row_imunisasi_bayi ?></b>/9</span>
                                                  <div class="progress progress-sm">
                                                    <div class="progress-bar bg-danger" style="width: 30%"></div>
                                                  </div>
                                                </div>
                                              </td>
                                            <?php
                                    } else if ($row_imunisasi_bayi <= 4) {
                                        ?>
                                            <div class="progress-group">
                                              Imunisasi
                                              <span class="float-right"><b><?= $row_imunisasi_bayi ?></b>/9</span>
                                              <div class="progress progress-sm">
                                                <div class="progress-bar bg-warning" style="width: 45%"></div>
                                              </div>
                                            </div>
                                          </td>
                                      <?php
                                    } else if ($row_imunisasi_bayi <= 5) {
                                      ?>
                                        <div class="progress-group">
                                          Imunisasi
                                          <span class="float-right"><b><?= $row_imunisasi_bayi ?></b>/9</span>
                                          <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" style="width: 55%"></div>
                                          </div>
                                        </div>
                                      </td>
                                      <?php
                                    }else if ($row_imunisasi_bayi <= 6) {
                                        ?>
                                          <div class="progress-group">
                                            Imunisasi
                                            <span class="float-right"><b><?= $row_imunisasi_bayi ?></b>/9</span>
                                            <div class="progress progress-sm">
                                              <div class="progress-bar bg-warning" style="width: 65%"></div>
                                            </div>
                                          </div>
                                        </td>
                                      <?php
                                    }else if ($row_imunisasi_bayi <= 7) {
                                          ?>
                                            <div class="progress-group">
                                              Imunisasi
                                              <span class="float-right"><b><?= $row_imunisasi_bayi ?></b>/9</span>
                                              <div class="progress progress-sm">
                                                <div class="progress-bar bg-warning" style="width: 75%"></div>
                                              </div>
                                            </div>
                                          </td>
                                        <?php
                                    }else if ($row_imunisasi_bayi <= 8) {
                                            ?>
                                              <div class="progress-group">
                                                Imunisasi
                                                <span class="float-right"><b><?= $row_imunisasi_bayi ?></b>/9</span>
                                                <div class="progress progress-sm">
                                                  <div class="progress-bar bg-warning" style="width: 85%"></div>
                                                </div>
                                              </div>
                                            </td>
                                          <?php
                                    } else {
                                      ?>
                                        <div class="progress-group">
                                          Imunisasi
                                          <span class="float-right"><b><?= $row_imunisasi_bayi ?></b>/9</span>
                                          <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 100%"></div>
                                          </div>
                                        </div>
                                      <?php
                                    }?>
                                    </td>
                                    <!-- <td>
                                      <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                                        </div>
                                      </div>
                                      <small>8/11</small>
                                    </td> -->
                                    <td style="text-align:center; width: 20px;">
                                    <a href="#" data-toggle='modal' data-target='#modal-danger-berjalan-<?= $dta['id_bayi']?>' class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>

                                    </td>
                                  </tr>
                                <!-- Modal EDIT KADER -->
                                <div class="modal fade" id="modal-lgBB<?= $dta['id_bayi'] ?>">
                                  <div class="modal-dialog modal-lg">
                                    <form method="POST" action="controller.php" enctype="multipart/form-data">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Tambah Berat Badan</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">

                                        <div class="form-group">
                                          <label for="inputName">Nama Lengkap</label>
                                          <input type="text" value="<?= $dta['nama_kader'] ?>" id="nama_kader" name="nama_kader"class="form-control" required>
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

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <input type="hidden" value="<?= $dta['nip_kader'] ?>" name="nip_kader">
                                          <input type="hidden" name="id_kader" value="<?= $dta['id_kader'] ?>">
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
                                  <div class="modal fade" id="modal-danger-berjalan-<?= $dta['id_bayi'] ?>">
                                    <div class="modal-dialog">
                                      <div class="modal-content bg-danger">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Hapus Data Bayi?</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Yakin Ingin Menghapus Data Bayi</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                                          <a href="controller.php?hapus_bayi=true&id_bayi=<?= $dta['id_bayi'] ?>" type="button" class="btn btn-outline-light">Hapus</a>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                                  <!-- /.modal -->



                                  <?php
                                   $i = $i + 1;
                                }
                                    } ?>
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
                  </div>
                  <div class="tab-pane fade" id="tab-selesai-panel" role="tabpanel" aria-labelledby="tab-selesai">
                    <!-- SELESAI -->
                    <section class="content">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-12">
                              <div class="card">
                                <div class="card-body">
                                  <table id="tbl_example11" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Foto</th>
                                      <th>Nama</th>
                                      <th>Jenis Kelamin</th>
                                      <th>Nama Bunda</th>
                                      <th>Tanggal Lahir</th>
                                      <th>Status</th>
                                      <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                      $bayi_selesai = mysqli_query($conn, "SELECT * FROM tb_bayi WHERE status_bayi = 'Active'");
                                      $i = 1; foreach($bayi_selesai as $dta) {
                                        $imunisasi_bayi_selesai = mysqli_query($conn, "SELECT * FROM tb_imunisasi WHERE bayi_id = '$dta[id_bayi]' AND status_imunisasi = 'Sudah' ");
                                        $row_imunisasi_bayi_selesai = mysqli_num_rows($imunisasi_bayi_selesai);
                                        // // $get_bunda = mysqli_fetch_assoc($imunisasi_bayi);
                                        if ($row_imunisasi_bayi_selesai >= 9){
                                      ?>
                                    <tr>
                                      <td style="text-align:center"><?= $i ?></td>
                                      <td style="text-align: center">
                                        <a href="../../assets/dist/img/bayi//<?= $dta['foto_bayi'] ?>" data-toggle="lightbox" data-title="Nama : <?= $dta['nama_bayi'] ?>" data-gallery="gallery">
                                          <img src="../../assets/dist/img/bayi//<?= $dta['foto_bayi'] ?>" border=3 height=60 width=60 class="img-fluid mb-2" alt="red sample"/>
                                        </a>
                                      </td>
                                      <td><?= $dta['nama_bayi'] ?></td>
                                      <td><?= $dta['jenis_kelamin_bayi'] ?></td>
                                      <?php
                                        $bunda = mysqli_query($conn, "SELECT * FROM tb_bunda WHERE nik_bunda = '$dta[nik_bunda]'");
                                        $get_bunda = mysqli_fetch_assoc($bunda);
                                        if ($get_bunda == null){
                                          echo '<td style="font-size: 16px;"> - </td>';
                                        } else{
                                          echo '<td style="font-size: 16px;">'. $get_bunda['nama_bunda'].' </td>';
                                        }
                                      ?>
                                      <td><?= $dta['tanggal_lahir_bayi'] ?></td>
                                      
                                    <td style="text-align:center">
                                      <?php
                                    if ($row_imunisasi_bayi_selesai <= 1) {
                                      ?>
                                        <div class="progress-group">
                                          Imunisasi
                                          <span class="float-right"><b><?= $row_imunisasi_bayi_selesai ?></b>/9</span>
                                          <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: 5%"></div>
                                          </div>
                                        </div>
                                      </td>
                                      <?php
                                    } else if ($row_imunisasi_bayi_selesai <= 2) {
                                      ?>
                                            <div class="progress-group">
                                              Imunisasi
                                              <span class="float-right"><b><?= $row_imunisasi_bayi_selesai ?></b>/9</span>
                                              <div class="progress progress-sm">
                                                <div class="progress-bar bg-danger" style="width: 15%"></div>
                                              </div>
                                            </div>
                                          </td>
                                      <?php
                                    } else if ($row_imunisasi_bayi_selesai <= 3) {
                                            ?>
                                                <div class="progress-group">
                                                  Imunisasi
                                                  <span class="float-right"><b><?= $row_imunisasi_bayi_selesai ?></b>/9</span>
                                                  <div class="progress progress-sm">
                                                    <div class="progress-bar bg-danger" style="width: 30%"></div>
                                                  </div>
                                                </div>
                                              </td>
                                            <?php
                                    } else if ($row_imunisasi_bayi_selesai <= 4) {
                                        ?>
                                            <div class="progress-group">
                                              Imunisasi
                                              <span class="float-right"><b><?= $row_imunisasi_bayi_selesai ?></b>/9</span>
                                              <div class="progress progress-sm">
                                                <div class="progress-bar bg-warning" style="width: 45%"></div>
                                              </div>
                                            </div>
                                          </td>
                                      <?php
                                    } else if ($row_imunisasi_bayi_selesai <= 5) {
                                      ?>
                                        <div class="progress-group">
                                          Imunisasi
                                          <span class="float-right"><b><?= $row_imunisasi_bayi_selesai ?></b>/9</span>
                                          <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" style="width: 55%"></div>
                                          </div>
                                        </div>
                                      </td>
                                      <?php
                                    }else if ($row_imunisasi_bayi_selesai <= 6) {
                                        ?>
                                          <div class="progress-group">
                                            Imunisasi
                                            <span class="float-right"><b><?= $row_imunisasi_bayi_selesai ?></b>/9</span>
                                            <div class="progress progress-sm">
                                              <div class="progress-bar bg-warning" style="width: 65%"></div>
                                            </div>
                                          </div>
                                        </td>
                                      <?php
                                    }else if ($row_imunisasi_bayi_selesai <= 7) {
                                          ?>
                                            <div class="progress-group">
                                              Imunisasi
                                              <span class="float-right"><b><?= $row_imunisasi_bayi_selesai ?></b>/9</span>
                                              <div class="progress progress-sm">
                                                <div class="progress-bar bg-warning" style="width: 75%"></div>
                                              </div>
                                            </div>
                                          </td>
                                        <?php
                                    }else if ($row_imunisasi_bayi_selesai <= 8) {
                                            ?>
                                              <div class="progress-group">
                                                Imunisasi
                                                <span class="float-right"><b><?= $row_imunisasi_bayi_selesai ?></b>/9</span>
                                                <div class="progress progress-sm">
                                                  <div class="progress-bar bg-warning" style="width: 85%"></div>
                                                </div>
                                              </div>
                                            </td>
                                          <?php
                                    } else {
                                      ?>
                                        <div class="progress-group">
                                          Imunisasi
                                          <span class="float-right"><b><?= $row_imunisasi_bayi_selesai ?></b>/9</span>
                                          <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 100%"></div>
                                          </div>
                                        </div>
                                      <?php
                                    }?>
                                    </td>
                                      <!-- <td>
                                        <div class="progress progress-sm">
                                          <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                                          </div>
                                        </div>
                                        <small>8/11</small>
                                      </td> -->
                                      <td style="text-align:center; width: 20px;">
                                      <a href="#" data-toggle='modal' data-target='#modal-danger-selesai-<?= $dta['id_bayi']?>' class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>

                                      </td>
                                    </tr>
                                  <!-- Modal EDIT KADER -->
                                  <div class="modal fade" id="modal-lgBB<?= $dta['id_bayi'] ?>">
                                    <div class="modal-dialog modal-lg">
                                      <form method="POST" action="controller.php" enctype="multipart/form-data">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Tambah Berat Badan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">

                                          <div class="form-group">
                                            <label for="inputName">Nama Lengkap</label>
                                            <input type="text" value="<?= $dta['nama_kader'] ?>" id="nama_kader" name="nama_kader"class="form-control" required>
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

                                          </div>
                                          <div class="modal-footer justify-content-between">
                                            <input type="hidden" value="<?= $dta['nip_kader'] ?>" name="nip_kader">
                                            <input type="hidden" name="id_kader" value="<?= $dta['id_kader'] ?>">
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
                                    <div class="modal fade" id="modal-danger-selesai-<?= $dta['id_bayi'] ?>">
                                      <div class="modal-dialog">
                                        <div class="modal-content bg-danger">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Hapus Data Bayi?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <p>Yakin Ingin Menghapus Data Bayi</p>
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                                            <a href="controller.php?hapus_bayi=true&id_bayi=<?= $dta['id_bayi'] ?>" type="button" class="btn btn-outline-light">Hapus</a>
                                          </div>
                                        </div>
                                        <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->



                                    <?php 
                                    $i = $i + 1; 
                                  }
                                    } ?>
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
                  </div>
                  <div class="tab-pane fade" id="tab-semua-panel" role="tabpanel" aria-labelledby="tab-semua">
                    <!-- SEMUA -->
                    <section class="content">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-12">
                              <div class="card">
                                <div class="card-body">
                                  <table id="tbl_example12" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Foto</th>
                                      <th>Nama</th>
                                      <th>Jenis Kelamin</th>
                                      <th>Nama Bunda</th>
                                      <th>Tanggal Lahir</th>
                                      <th>Status</th>
                                      <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; foreach($bayi as $dta) { 
                                      $imunisasi_bayi_semua = mysqli_query($conn, "SELECT * FROM tb_imunisasi WHERE bayi_id = '$dta[id_bayi]' AND status_imunisasi = 'Sudah' ");
                                      $row_imunisasi_bayi_semua = mysqli_num_rows($imunisasi_bayi_semua);
                                      ?>
                                    <tr>
                                      <td style="text-align:center"><?= $i ?></td>
                                      <td style="text-align: center">
                                        <a href="../../assets/dist/img/bayi//<?= $dta['foto_bayi'] ?>" data-toggle="lightbox" data-title="Nama : <?= $dta['nama_bayi'] ?>" data-gallery="gallery">
                                          <img src="../../assets/dist/img/bayi//<?= $dta['foto_bayi'] ?>" border=3 height=60 width=60 class="img-fluid mb-2" alt="red sample"/>
                                        </a>
                                      </td>
                                      <td><?= $dta['nama_bayi'] ?></td>
                                      <td><?= $dta['jenis_kelamin_bayi'] ?></td>
                                      <?php
                                        $bunda = mysqli_query($conn, "SELECT * FROM tb_bunda WHERE nik_bunda = '$dta[nik_bunda]'");
                                        $get_bunda = mysqli_fetch_assoc($bunda);
                                        if ($get_bunda == null){
                                          echo '<td style="font-size: 16px;"> - </td>';
                                        } else{
                                          echo '<td style="font-size: 16px;">'. $get_bunda['nama_bunda'].' </td>';
                                        }
                                      ?>
                                      <td><?= $dta['tanggal_lahir_bayi'] ?></td>
                                      
                                    <td style="text-align:center">
                                      <?php
                                    if ($row_imunisasi_bayi_semua <= 1) {
                                      ?>
                                        <div class="progress-group">
                                          Imunisasi
                                          <span class="float-right"><b><?= $row_imunisasi_bayi_semua ?></b>/9</span>
                                          <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: 5%"></div>
                                          </div>
                                        </div>
                                      </td>
                                      <?php
                                    } else if ($row_imunisasi_bayi_semua <= 2) {
                                      ?>
                                            <div class="progress-group">
                                              Imunisasi
                                              <span class="float-right"><b><?= $row_imunisasi_bayi_semua ?></b>/9</span>
                                              <div class="progress progress-sm">
                                                <div class="progress-bar bg-danger" style="width: 15%"></div>
                                              </div>
                                            </div>
                                          </td>
                                      <?php
                                    } else if ($row_imunisasi_bayi_semua <= 3) {
                                            ?>
                                                <div class="progress-group">
                                                  Imunisasi
                                                  <span class="float-right"><b><?= $row_imunisasi_bayi_semua ?></b>/9</span>
                                                  <div class="progress progress-sm">
                                                    <div class="progress-bar bg-danger" style="width: 30%"></div>
                                                  </div>
                                                </div>
                                              </td>
                                            <?php
                                    } else if ($row_imunisasi_bayi_semua <= 4) {
                                        ?>
                                            <div class="progress-group">
                                              Imunisasi
                                              <span class="float-right"><b><?= $row_imunisasi_bayi_semua ?></b>/9</span>
                                              <div class="progress progress-sm">
                                                <div class="progress-bar bg-warning" style="width: 45%"></div>
                                              </div>
                                            </div>
                                          </td>
                                      <?php
                                    } else if ($row_imunisasi_bayi_semua <= 5) {
                                      ?>
                                        <div class="progress-group">
                                          Imunisasi
                                          <span class="float-right"><b><?= $row_imunisasi_bayi_semua ?></b>/9</span>
                                          <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" style="width: 55%"></div>
                                          </div>
                                        </div>
                                      </td>
                                      <?php
                                    }else if ($row_imunisasi_bayi_semua <= 6) {
                                        ?>
                                          <div class="progress-group">
                                            Imunisasi
                                            <span class="float-right"><b><?= $row_imunisasi_bayi_semua ?></b>/9</span>
                                            <div class="progress progress-sm">
                                              <div class="progress-bar bg-warning" style="width: 65%"></div>
                                            </div>
                                          </div>
                                        </td>
                                      <?php
                                    }else if ($row_imunisasi_bayi_semua <= 7) {
                                          ?>
                                            <div class="progress-group">
                                              Imunisasi
                                              <span class="float-right"><b><?= $row_imunisasi_bayi_semua ?></b>/9</span>
                                              <div class="progress progress-sm">
                                                <div class="progress-bar bg-warning" style="width: 75%"></div>
                                              </div>
                                            </div>
                                          </td>
                                        <?php
                                    }else if ($row_imunisasi_bayi_semua <= 8) {
                                            ?>
                                              <div class="progress-group">
                                                Imunisasi
                                                <span class="float-right"><b><?= $row_imunisasi_bayi_semua ?></b>/9</span>
                                                <div class="progress progress-sm">
                                                  <div class="progress-bar bg-warning" style="width: 85%"></div>
                                                </div>
                                              </div>
                                            </td>
                                          <?php
                                    } else {
                                      ?>
                                        <div class="progress-group">
                                          Imunisasi
                                          <span class="float-right"><b><?= $row_imunisasi_bayi_semua ?></b>/9</span>
                                          <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 100%"></div>
                                          </div>
                                        </div>
                                      <?php
                                    }?>
                                    </td>
                                      <!-- <td>
                                        <div class="progress progress-sm">
                                          <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                                          </div>
                                        </div>
                                        <small>8/11</small>
                                      </td> -->
                                      <td style="text-align:center; width: 20px;">
                                      <a href="#" data-toggle='modal' data-target='#modal-danger-semua-<?= $dta['id_bayi'] ?>' class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>

                                      </td>
                                    </tr>
                                  <!-- Modal EDIT KADER -->
                                  <div class="modal fade" id="modal-lgBB<?= $dta['id_bayi'] ?>">
                                    <div class="modal-dialog modal-lg">
                                      <form method="POST" action="controller.php" enctype="multipart/form-data">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Tambah Berat Badan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">

                                          <div class="form-group">
                                            <label for="inputName">Nama Lengkap</label>
                                            <input type="text" value="<?= $dta['nama_kader'] ?>" id="nama_kader" name="nama_kader"class="form-control" required>
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

                                          </div>
                                          <div class="modal-footer justify-content-between">
                                            <input type="hidden" value="<?= $dta['nip_kader'] ?>" name="nip_kader">
                                            <input type="hidden" name="id_kader" value="<?= $dta['id_kader'] ?>">
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
                                    <div class="modal fade" id="modal-danger-semua-<?= $dta['id_bayi'] ?>">
                                      <div class="modal-dialog">
                                        <div class="modal-content bg-danger">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Hapus Data Bayi?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <p>Yakin Ingin Menghapus Data Bayi</p>
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                                            <a href="controller.php?hapus_bayi=true&id_bayi=<?= $dta['id_bayi'] ?>" type="button" class="btn btn-outline-light">Hapus</a>
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
                  </div>
                </div>
              </div>
              <!-- /.content -->
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>
  <!-- /.content-wrapper -->


<?php
require '../template/footer/footer.php';
?>