<?php
include("../inc/conf.php");
if (!is_logged()) {
    header("location::" . SITE_URL . "login.php");
    die;
}



$sth = $dbh->prepare("SELECT * FROM user");
$sth->execute();
$users = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $title = "Tous les utilisateurs";
        include("../inc/head.php");
        ?>
    </head>
    <body>
        <div id="wrapper">
            <?php
            include("../inc/menu.php");
            ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?php echo $title; ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="<?php echo SITE_URL; ?>user/form.php" class="btn btn-primary">Ajouter</a>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>id</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                    <th>Statue</th>
                                </tr>
                                <?php
                                foreach ($users as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value["id"]; ?></td>
                                        <td><a href="<?php echo SITE_URL; ?>user/form.php?id=<?php echo $value["id"]; ?>"><?php echo $value["nom"]; ?></a></td>
                                        <td><?php echo $value["prenom"]; ?></td>
                                        <td><?php echo $value["email"]; ?></td>
                                        <td class="text-center">
                                            <?php
                                            //$a = 2;
                                            if ($value["actif"] == 1) {
                                                echo '<a href="' . SITE_URL . 'user/action.php?actif=0&id=' . $value["id"] . '" class="link_actif"><i class="far fa-smile"></i>actif</a>';
                                            } else {
                                                echo '<a href="' . SITE_URL . 'user/action.php?actif=1&id=' . $value["id"] . '" class="link_actif"><i class="fas fa-angry"></i>inactif</i></a>';
                                            }
                                            ?>

                                        </td>
                                        <td class = "text-center">
                                            <a href = "<?php echo SITE_URL; ?>user/action.php?id=<?php echo $value["id"]; ?>&del"><i class = "fa fa-lg fa-trash-o"></i></a>
                                            <a href = "<?php echo SITE_URL; ?>user/form.php?id=<?php echo $value["id"]; ?>"><i class = "fa fa-lg fa-edit"></i></a>
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
        include("../inc/footer.php");
        ?>
        <script type="text/javascript">
            $(".link_actif").click(function (e) {
                e.preventDefault();
                var url = $(this).attr("href");
                //alert(url);
                $.ajax({
                    url: url,
                    method: "GET",
                    dataType: "json",
                    success: function (data) {
                        //alert(data);
                        //$("body").append(data);
                    }
                });
            });

        </script>
    </body>
</html>