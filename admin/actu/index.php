<?php
include("../inc/conf.php");
if (!is_logged()) {
    header("location:" . SITE_URL . "login.php");
    die;
}

$title = "Liste des actus";

$sql = "SELECT * FROM actualites ORDER BY date_creation DESC";
$res = $dbh->prepare($sql);
$res->execute();

$actus = $res->fetchAll(PDO::FETCH_ASSOC);

//debug($actus);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
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
                            <a href="add_form.php" class="btn btn-primary">Ajouter une page</a>

                            <table class="table table-bordered">
                                <tr>
                                    <th>id</th>
                                    <th>date</th>
                                    <th>titre</th>
                                    <th>url</th>
                                    <th>action</th>
                                </tr>
                                <?php
                                foreach ($actus as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value["id"]; ?></td>
                                        <td><?php echo $value["date_creation"]; ?></td>
                                        <td><a href="<?php echo SITE_URL; ?>actu/update_form.php?id=<?php echo $value["id"]; ?>"><?php echo $value["titre"]; ?></a></td>
                                        <td><?php echo $value["url"]; ?></td>
                                        <td class = "text-center">
                                            <a href = "<?php echo SITE_URL; ?>actu/action.php?id=<?php echo $value["id"]; ?>&del" class="delscript"><i class = "fa fa-lg fa-trash-o"></i></a>
                                            <a href = "<?php echo SITE_URL; ?>actu/update_form.php?id=<?php echo $value["id"]; ?>"><i class = "fa fa-lg fa-edit"></i></a>
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
            $(".delscript").click(function (e) {
                e.preventDefault();
                var _url = $(this).attr("href");
                var _this = $(this);
                //alert(_url);
                $.ajax({
                    url: _url,
                    method: "GET",
                    dataType: "json",
                    success: function (data) {
                        //alert(data);
                        //$("body").append(data);

                        if (data.success == true) {
                            _this.parent().parent().remove();
                        }

                    },
                    error: function (data) {
                        alert("erreur dans la suppresion");
                    }
                });
            });

        </script>
    </body>
</html>