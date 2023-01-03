
        <!-- notifiaction js -->
        <script>
      $(document).ready(function () {
          $('#notifications_button').click(function () {
              jQuery.ajax({
			<?php include('partials/_dbconect.php');
session_start();
$uid=$_SESSION['UID'];
mysqli_query($conn,"update massage set status=1 where to_id=$uid"); ?>,
				success:function(){
					$('#notifications').fadeToggle('fast', 'linear');
					$('#notifications_counter').fadeOut('slow');
				}
			  })
              return false;
          });
          $(document).click(function () {
              $('#notifications').hide(); 
          });
      });
   </script>