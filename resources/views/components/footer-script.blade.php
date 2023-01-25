  <!--   Core JS Files   -->
  <script src="admin/assets/js/core/popper.min.js"></script>
  <script src="admin/assets/js/core/bootstrap.min.js"></script>
  <script src="admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="admin/assets/js/plugins/chartjs.min.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="admin/assets/js/argon-dashboard.min.js?v=2.0.4"></script>

  <!-- Datatable--->
  <script>
    //delete was click show dialog
    function delete_job(id, name, filetodelete)
    {
        //customize modal
         $("#nametodelete").text(name);
         $("#idtodelete").text(id);
         $("#filetodelete").text(filetodelete);
         //open modal
            $("#exampleModal").modal('show');
            //delete script



        return(id,name);

    }
        $("#confirm_delete").click(function(){
            //collect data
            var name = $("#nametodelete").text();

            var id = $("#idtodelete").text();
            var filename = $("#filetodelete").text();

             window.location.replace("/delete/"+id);
           // alert("you want to delete "+name +id);

/*
            $.post("/DeleteJob",
            {
                 '_token': $('meta[name=csrf-token]').attr('content'),
                id: id,
                name:name,
                filename:filename
            },
            function(data, status){
               // alert("Data: " + data + "\nStatus: " + status);
             //close modal
            $("#exampleModal").modal('hide');
            window.location.replace("/dashboard");

            });
*/

        });


  $(document).ready( function () {
    $('#table_id').DataTable();


} );



  </script>



