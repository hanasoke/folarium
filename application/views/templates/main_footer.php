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

      get_data_edit();

      $('.position').change(function() {
        let id=$(this).val();
        let contract_id = "<?= $sub_contract_id; ?>";
        $.ajax({
          url: "<?php echo site_url('main/get_contract'); ?>",
          method : "POST",
          data : {id: id},
          async : true,
          dataType : 'json',
          success: function(data) {
            $('select[name="contract"]').empty();

            $.each(data, function(key, value) {
              if (contract_id==value.contract_id) {
                $('select[name="contract"]').append('<option value="'+ value.contract_id + '" selected>'+ value.contract_length + '</option>').trigger('change');
              } else {
                $('select[name="contract"]').append('<option value="'+ value.contract_id + '">' + value.contract_length + '</option>');
              }
            });
          }
        });
        return false;
      });

      // load data for edit
      function get_data_edit() {
        let employee_id = $('[name="employee_id"]').val();
        $.ajax({
          url : "<?php echo site_url('main/get_data_edit'); ?>",
          method : "POST",
          data :{employee_id :employee_id},
          async : true,
          dataType : 'json',
          success : function(data) {
            $.each(data, function(i, item){
              $('[name="name"]').val(data[i].name);
              $('[name="email"]').val(data[i].email);
              $('[name="age"]').val(data[i].age);
              $('[name="address"]').val(data[i].address);
              $('[name="position"]').val(data[i].employee_position_id).trigger('change');
              $('[name="contract"]').val(data[i].employee_contract_id).trigger('change');
            });
          }
        });
      }

    });
  </script>


</body>

</html>
