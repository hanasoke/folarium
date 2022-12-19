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
                    <input type="hidden" class="form-control" name="employee_id" value="<?= $employee_id; ?>">
                  </div>
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Input Name" value="<?= set_value('name'); ?>" >
                      <?= form_error('name', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Input Email" value="<?= set_value('email'); ?>">
                      <?= form_error('email', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="age">Age</label>
                      <input type="number" class="form-control" id="age" name="age" placeholder="Input the Age" value="<?= set_value('age'); ?>">
                      <?= form_error('age', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" name="address" id="address" placeholder="Input Address" placeholder="Input Address" value="<?= set_value('address'); ?>">
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
