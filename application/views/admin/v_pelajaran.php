<?php
$this->load->view('admin/komponen/header');
$this->load->view('admin/komponen/navbar');
$this->load->view('admin/komponen/sidebar');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Pondok
    <small>Pelajaran</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Pondok</a></li>
      <li class="active">Pelajaran</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
          <div class="col-sm-3">
					<?= $this->session->flashdata('sukses')?>
            <div class="box">
						
              <div class="box-header">
                <h3 class="box-title">Tambah Pelajaran</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form action="<?= base_url('admin/pelajaran/store/')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" required>
                  </div>
                  <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id="" cols="10" rows="3" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Icon</label>
                  <input type="file" name="icon" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                    <input type="reset" value="reset" class="btn btn-secondary">
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-sm-9">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pelajaran</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama</th>
                          <th>Deskripsi</th>
                          <th>Icon</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php $no=1; foreach($pelajaran->result() as $f){?>
                        <tr>
                          <td><?= $no++?></td>
                          <td><?= $f->nama?></td>
                          <td><?= $f->deskripsi?></td>
                          <td><img width="50px" src="<?= base_url('uploads/pelajaran/')?><?= $f->icon?>" alt=""></td>
                          <td><a href="#" data-toggle="modal" data-target="#edit<?= $f->id?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a> | <a href="<?= base_url('admin/pelajaran/delete/')?><?= $f->id?>" onclick="confirm('Apakah anda ingin menghapus pelajaran ini?')"class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php }?>
                      </tbody>
                    </table>
                    </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>
                  
                </div>
              </div>
              </div><!-- /.col -->
              </div><!-- /.row -->
              </section><!-- /.content -->
              </div><!-- /.content-wrapper -->
<?php $no=1; foreach($pelajaran->result() as $f){?>
              <div id="edit<?= $f->id?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <p>Edit Pelajaran</p>
                      <div class="row">
                        <div class="col-sm-6">
                        <div class="box">
                          <div class="box-body">
                          <img width="100%" src="<?= base_url('uploads/pelajaran/')?><?= $f->icon?>">
                          </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="box">
                            <div class="box-body">
                              <form action="<?= base_url('admin/pelajaran/update/')?><?= $f->id?>" method="post" enctype="multipart/form-data">
                            <label for="">Nama</label>
                            <input type="text" name="nama" value="<?= $f->nama?>"  class="form-control">
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi" id="" class="form-control" cols="30" rows="2"><?= $f->deskripsi?></textarea>
                            <label for="">Foto</label>
                            <input type="file" name="icon" class="form-control">
                            <input type="hidden" name="icon_old" value="<?= $f->icon?>">
                            <br>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                            </form>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php }?>
              <?php
              $this->load->view('admin/komponen/footer');
              $this->load->view('admin/komponen/js');
              ?>
