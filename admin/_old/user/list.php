<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $title="Tous les utilisateurs";
    include("../head.php");
    ?>
</head>
<body>
    <div id="wrapper">
        <?php
            include("../menu.php");
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $title;?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="<?php echo SITE_URL;?>user/index.php?action=add" class="btn btn-primary">Ajouter</a>
                        <table class="table table-bordered table-striped">
							<tr>
								<th>id</th>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Email</th>
                                <th>Action</th>
							</tr>
                            <?php
                                foreach ($users as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value["id"];?></td>
                                    <td><a href="<?php echo SITE_URL;?>user/index.php?action=add&id=<?php echo $value["id"];?>"><?php echo $value["nom"];?></a></td>
                                    <td><?php echo $value["prenom"];?></td>
                                    <td><?php echo $value["email"];?></td>
                                    <td class="text-center">
                                        <a href="<?php echo SITE_URL;?>user/index.php?action=del&id=<?php echo $value["id"];?>"><i class="fa fa-lg fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("../footer.php");
    ?>
</body>
</html>