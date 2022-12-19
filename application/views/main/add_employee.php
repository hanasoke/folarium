        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="row">
          </div>
          <div class="row">
            <div class="col-6 mx-auto">
              <div class="card">
                <div class="card-body">
                  <form action="<?= site_url('main/save_employee');?>" method="post">
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Input Name" value="<?= set_value('name'); ?>">
                        <?= form_error('name', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Input Email"  value="<?= set_value('email'); ?>">
                      <?= form_error('email', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="age">Age</label>
                      <input type="number" class="form-control" id="age" name="age" placeholder="Input the Age"  value="<?= set_value('age'); ?>">
                      <?= form_error('age', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" name="address" id="address" placeholder="Input Address" placeholder="Input Address" value="<?= set_value('address'); ?>">
                      <?= form_error('address', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="position">Position</label>
                      <select class="form-control" id="position" name="position">
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
                      <select class="form-control" id="contract" name="contract">
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
            <span>&copy; Folarium <?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <script src="<?= base_url('assets/vendor/jquery/jquery.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/js/demo/datatables-demo.js'); ?>"></script>

      <script>
        $(document).ready(function() {
        $('#position').change(function() {
          let id = $(this).val();
          $.ajax({
            url : "<?= site_url('main/get_contract'); ?>",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success: function(data) {
              let html = '';
              let i;
              for (i = 0; i < data.length; i++) {
                html += '<option value='+ data[i].contract_id+'>' + data[i].contract_length +'</option>';
              }
              $('#contract').html(html);
            }
          });
          return false;
        });

      });
      </script>
