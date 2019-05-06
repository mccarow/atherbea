  <div class="container-fluid" id="nav">
    <div class="d-flex">
      <div id="logo">
        <a href="index.html">
          <img src="images/logo_atherbea.jpg" alt="Logo Atherbea">
        </a>
      </div>
      <div class="flex-grow-1 align-self-start">
        <div class="row no-gutters" id="menu-top">
          <div class="col-md-8">
            <div class="adress"><i class="fas fa-map-marker-alt"></i> 25 rue Louis Seguin 64100 BAYONNE  &nbsp;</div> <div class="adress"><i class="fas fa-mobile-alt"></i> 05 59 52 55 00 </div>
            <div class="text-left" id="facebook_smallscreen">
              <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
            </div>
          </div>
          <div class="col-md-4 text-right" id="facebook_fullscreen">
            <a href="#">Retrouvez-nous sur <i class="fab fa-facebook"></i></a>
          </div>
        </div>
        <div id="menu-bottom">
          <div id="menu">
            <ul>
              <li class="sous_menu">
                <a href="#" class="titre_menu">L'ASSOCIATION</a>
                <ul>
                  <li><a href="#">LE PROJET</a></li>
                  <li><a href="#">NOTRE HISTOIRE</a></li>
                  <li><a href="#">L'ORGANIGRAMME</a></li>
                  <li><a href="#">CONSEIL D'ADMINISTRATION</a></li>
                  <li><a href="#">DOCUMENTS</a></li>
                </ul>
              </li>
              <li class="sous_menu">
                <a href="#" class="titre_menu">LES PÔLES D'ACTION</a>
                <div class="sous_menu_all">
                    <div class="row">
                        <?php
                        $sql="SELECT * FROM categorie ORDER BY libelle";
                        $res = $dbh->prepare($sql);
                        $res->execute();
                        $catges = $res->fetchAll(PDO::FETCH_ASSOC);
                        foreach($catges as $categ){
                            $sql_page="SELECT * FROM page WHERE id_categorie=".$categ["id"];
                            $res = $dbh->prepare($sql_page);
                            $res->execute();
                            $pages = $res->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="col">
                            <h3><?php echo $categ["libelle"];?></h3>
                            <ul>
                                <?php
                                foreach($pages as $p){
                                ?>
                                <li><a href="<?php echo SITE_URL;?><?php echo $p["url"];?>.html"><?php echo $p["titre"];?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <?php
                        }
                        ?>
                        
                        
                    </div>
                </div>
                <?php
                /*
                <div class="sous_menu_all">
                    <div class="row">
                        <div class="col">
                            <h3>Pôle Insertion</h3>
                            <ul>
                              <li><a href="<?php echo SITE_URL;?>atelier-chantier-insertion.html">ATELIER CHANTIER INSERTION</a></li>
                              <li><a href="#">CENTRE D'ACCUEIL DES DEMANDEURS D ASILE</a></li>
                              <li><a href="#">CHRS LES MOUETTES</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <h3>Pôle Prévention Accueil Urgence</h3>
                            <ul>
                              <li><a href="#">ACCUEIL DE JOUR</a></li>
                              <li><a href="#">MAISON DE GILLES</a></li>
                              <li><a href="#">PREVENTION SPECIALISEE</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <h3>Pôle Socialisation</h3>
                            <ul>
                              <li><a href="#">CHRS ATHERBEA</a></li>
                              <li><a href="#">LITS HALTE SOINS SANTÉ</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <h3>SIAO</h3>
                            <ul>
                              <li><a href="#">Service Intégré d'Accueil et d'Orientation</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                 * 
                 */
                ?>
              </li>
              <li class="sous_menu">
                <a href="#" class="titre_menu">LES ETABLISSEMENTS</a>
                <ul>
                  <li><a href="#">ETABLISSEMENTS1</a></li>
                  <li><a href="#">ETABLISSEMENTS2</a></li>
                  <li><a href="#">ETABLISSEMENTS3</a></li>
                </ul>
              </li>
              <li><a href="<?php echo SITE_URL;?>actualites.php" class="titre_menu">ACTUALITES</a></li>
              <li><a href="<?php echo SITE_URL;?>benevole.php" class="titre_menu">NOUS AIDER</a></li>
              <li><a href="<?php echo SITE_URL;?>contact.php" class="titre_menu">NOUS CONTACTER</a></li>
            </ul>
            <a href="#" id="bt_fermer" onclick="fermer_menu();"><i class="fas fa-times"></i></a>
          </div>
          <a href="#" id="bt_menu" onclick="afficher_menu();"><i class="fas fa-bars"></i></a>
        </div>
      </div>
      <div id="help">
        <a href="index.html" id="link_help">
          <img src="images/besoin_aide.jpg" alt="besoin d'aide" id="img_help">
          <img src="images/besoin_aide_hover2.jpg" alt="besoin d'aide" id="img_help2">
        </a>
      </div>
    </div>
  </div>