<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("head.php");
    ?>
</head>
<body>
    <div id="wrapper">
        <?php

            include("menu.php");
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"></h1>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-lg-6">

                    	<?php
                    		debug($user);
                    	?>
                        
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
            </div>
        </div>
    </div>
    <?php
        include("footer.php");
    ?>
</body>
</html>