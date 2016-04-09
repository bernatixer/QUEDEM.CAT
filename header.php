      <header class="header white-bg">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>

              <!--logo start-->
              <a href="index.html" class="logo" >QUEDEM<span>CAT</span></a>
              <!--logo end-->
              <div class="horizontal-menu navbar-collapse collapse ">
                  <ul class="nav navbar-nav">
                      <li <?php if(strpos($_SERVER['PHP_SELF'], 'index.php') == true){echo 'class="active"';}?>><a href="index.php">Inici</a></li>
                      <li <?php if(strpos($_SERVER['PHP_SELF'], 'grups.php') == true){echo 'class="active"';}?>><a href="grups.php">Grups</a></li>
                      <li class="dropdown">
                          <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">Classes particulars <b class="icon-angle-down"></b></a>
                          <ul class="dropdown-menu">
                              <li <?php if(strpos($_SERVER['PHP_SELF'], 'P_anunciat.php') == true){echo 'class="active"';}?>><a href="P_anunciat.php">Anuncia't com a professor</a></li>
                              <li <?php if(strpos($_SERVER['PHP_SELF'], 'P_buscar.php') == true){echo 'class="active"';}?>><a href="P_buscar.php">Buscar un professor</a></li>
                          </ul>
                      </li>
                  </ul>

              </div>
              <div class="top-nav ">
                  <ul class="nav pull-right top-menu">
                      <!-- user login dropdown start-->
					<?php
					if(isset($_SESSION['nom'])){
					$dn1 = mysql_fetch_array(mysql_query('SELECT tipus from TDR_usuaris where id="'.$_SESSION['id'].'"'));
					?>
                      <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                              <span class="username"><?php echo $_SESSION['nom'];?></span>
                              <b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu extended logout">
                              <div class="log-arrow-up"></div>
                              <li><a href="perfil.php"><i class=" icon-suitcase"></i>Perfil</a></li>
                              <li><a href="editar.php"><i class="icon-cog"></i> Configuració</a></li>
                              <li><br/><span class="label label-danger"><?php echo $dn1['tipus']; ?></span></li>
                              <li><a href="sortir.php"><i class="icon-key"></i> Sortir</a></li>
                          </ul>
                      </li>
					<?php
					}else{
					?>
					<li class="dropdown">
                        <div class="btn-group">
                            <a class="btn btn-info" href="entrar.php">Entrar</a>
                            <a class="btn btn-success" href="registre.php">Registrar-se</a>
                        </div>
					</li>
					<?php
					}
					?>
                      <!-- user login dropdown end -->
                  </ul>
              </div>

          </div>

      </header>