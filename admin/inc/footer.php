<!-- jQuery -->
<script src="<?php echo SITE_URL;?>vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo SITE_URL;?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo SITE_URL;?>vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo SITE_URL;?>dist/js/sb-admin-2.js"></script>

<script>
    $(".del").click(function(e){
       if(!confirm("Valider la suppression?")){
           e.preventDefault();
           return false;
       }
    });
</script>