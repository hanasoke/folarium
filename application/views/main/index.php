

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Karyawan</h1>
            <a href="<?= base_url('main/add_employee'); ?>" class="btn btn-primary">Tambah Data</a>
          </div>

          <div class="row">
            <div class="col">
            <?php echo $this->session->flashdata('msg'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Detail Karyawan</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Pegawai</th>
                          <th>Email</th>
                          <th>Umur</th>
                          <th>Tempat Tinggal</th>
                          <th>Jabatan</th>
                          <th>Massa Kontrak (Tahun)</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no = 0;
                          foreach ($employee->result() as $e) :
                            $no++;
                        ?>                       
                        <tr>
                          <td>
                            <?= $no; ?>
                          </td>
                          <td>
                            <?= $e->name; ?>
                          </td>
                          <td>
                            <?= $e->email; ?>
                          </td>
                          <td>
                            <?= $e->age; ?>
                          </td>
                          <td>
                            <?= $e->address; ?>
                          </td>
                          <td>
                            <?= $e->position; ?>
                          </td>
                          <td>
                            <?= $e->contract_length; ?>
                          </td>
                          <td>
                            <a href="<?= site_url('main/get_edit/'.$e->employee_id); ?>" class="btn btn-sm btn-success">Edit</a>
                            <a href="<?= site_url('main/delete/'.$e->employee_id); ?>" class="btn btn-sm btn-danger">Delete</a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->