

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-6 mx-auto">
              <div class="card">
                <div class="card-body">
                  <form action="<?= site_url('main/update_employee');?>" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" name="employee_id" value="<?= $employee_id; ?>" placeholder="ID">
                    <?= form_error('employee_id', '<small class="text-danger">', '</small>');?>
                  </div>
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Input Name" >
                      <?= form_error('name', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Input Email">
                      <?= form_error('email', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="age">Age</label>
                      <input type="number" class="form-control" id="age" name="age" placeholder="Input the Age">
                      <?= form_error('age', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" name="address" id="address" placeholder="Input Address" placeholder="Input Address">
                      <?= form_error('address', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="position">Position</label>
                      <select class="form-control position" id="position" name="position">
                        <option value="">No Selected</option>
                        <?php foreach($position as $p) : ?>
                          <option value="<?= $p->position_id; ?>">
                            <?= $p->position; ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                      <?= form_error('position', '<small class="text-danger">', '</small>');?>
                    </div>

                    <div class="form-group">
                      <label for="contract">Contract (In Year)</label>
                      <select class="form-control contract" id="contract" name="contract" required>
                        <option value="">No Selected</option>
                      </select>
                    </div>
                    <a href="<?= base_url('main/index'); ?>" class="btn btn-danger float-left">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


</body>

</html>
