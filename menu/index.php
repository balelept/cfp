<!DOCTYPE html>

<html>
    <head>
      <?php
      include('../includes/session.php'); // Includes Login Script
      if (!isset($_SESSION['login_user'])) {
        header('Location: ../login/index.php');
      }
      ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 3</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style5.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Centro de formação de professores</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Menu</p>
                    <li>
                        <a href="#aFormacao" data-toggle="collapse" aria-expanded="false">Ação de formação</a>
                        <ul class="collapse list-unstyled" id="aFormacao">
                            <li><a href="#">Lista de ações</a></li>
                            <li><a href="#">Inserir ação</a></li>
                            <li><a href="#">Atribuir notas</a></li>
                            <li><a href="#">Alterar notas</a></li>
                            <li><a href="#">Criar turma</a></li>
                            <a href="#update1" data-toggle="collapse" aria-expanded="false">Actualizar Dados</a>
                            <ul class="collapse list-unstyled" id="update1">
                                <li><a href="#">Grupos de Recrutamento</a></li>
                                <li><a href="#">Modalidades</a></li>
                                <li><a href="#">Área de Formação</a></li>
                            </ul>
                        </ul>
                    </li>
                    <li>
                        <a href="#formandos" data-toggle="collapse" aria-expanded="false">Formandos</a>
                        <ul class="collapse list-unstyled" id="formandos">
                            <li><a href="#">Lista de formandos</a></li>
                            <li><a href="#">Criar Turma</a></li>
                            <li><a href="#">Inserir Formando</a></li>
                            <a href="#update2" data-toggle="collapse" aria-expanded="false">Actualizar Dados</a>
                            <ul class="collapse list-unstyled" id="update2">
                                <li><a href="#">Habilitação Académica</a></li>
                                <li><a href="#">Escalão</a></li>
                                <li><a href="#">Agrupamentos</a></li>
                                <li><a href="#">Centros de Formação</a></li>
                                <li><a href="#">Escolas</a></li>
                            </ul>
                        </ul>
                    </li>
                    <li>
                        <a href="#formadores" data-toggle="collapse" aria-expanded="false">Formadores</a>
                        <ul class="collapse list-unstyled" id="formadores">
                            <li><a href="#">Lista de formadores</a></li>
                            <li><a href="#">Inserir Formador</a></li>
                            <a href="#update3" data-toggle="collapse" aria-expanded="false">Actualizar Dados</a>
                            <ul class="collapse list-unstyled" id="update3">
                                <li><a href="#">Habilitação Académica</a></li>
                                <li><a href="#">Escalão</a></li>
                                <li><a href="#">Agrupamentos</a></li>
                                <li><a href="#">Centros de Formação</a></li>
                                <li><a href="#">Escolas</a></li>
                            </ul>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Informações</a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="../perfil/perfil.php"><?php echo $_SESSION['login_user']."PERFIL"; ?></a></li>
                                <li><a href="../includes/logout.php">SAIR</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <h2>Collapsible Sidebar Using Bootstrap 3</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                <div class="line"></div>

                <h2>Lorem Ipsum Dolor</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                <div class="line"></div>

                <h2>Lorem Ipsum Dolor</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                <div class="line"></div>

                <h3>Lorem Ipsum Dolor</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>





        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
