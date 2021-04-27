<div class="row">
<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Departement</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-xs btn-flat" data-toggle="modal" data-target="#add">
                <i class="fa fa-plus"></i> Add</button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php
    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }
    ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Departement</th>
                    <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($dep as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama_dep']; ?></td>
                            <td>
                            <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_dep']; ?>">Edit</button>
                            <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_dep']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box-tools pull-right">
                <a href="<?= base_url() ?>" class="btn btn-danger">Kembali</a>
            </div>
          <!-- /.box -->
        </div>
</div>

<!-- /.modal -->
<div class="modal fade" id="add">
          <div class="modal-dialog  modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Departement</h4>
            </div>
            <div class="modal-body">
            <?php
            echo form_open('dep/add')
            ?>

                <div class="form-group">
                  <label>Departement</label>
                  <input name="nama_dep" class="form-control"  placeholder="Departement" required>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<!-- /.modal edit dep -->
<?php foreach ($dep as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_dep']; ?>">
          <div class="modal-dialog  modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Departement</h4>
            </div>
            <div class="modal-body">
            <?php
            echo form_open('dep/edit/' . $value['id_dep'])
            ?>

                <div class="form-group">
                  <label>Departement</label>
                  <input name="nama_dep" value="<?= $value['nama_dep']; ?>" class="form-control"  placeholder="Departement" required>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <?php } ?>

<?php foreach ($dep as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_dep']; ?>">
          <div class="modal-dialog  modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Departement</h4>
            </div>
            <div class="modal-body">
            
Apakah Anda Yakin Ingin Hapus <?= $value['nama_dep']; ?>?

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('dep/delete/' . $value['id_dep']) ?>" type="submit" class="btn btn-danger">Ya</a>
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <?php } ?>