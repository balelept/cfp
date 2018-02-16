
<?php
include_once 'connect.php';
include_once 'result.php';
?>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sidebar Menu Hover Show/Hide CSS</title>



      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="style_menu.css">

</head>

<body>
    <div class="left">
      <nav class="main-menu">
            <ul>
                <li>
                    <a href="index.php">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Inicio
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="../formulario/acao.php">
                        <i class="fa fa-book fa-2x"></i>
                        <span class="nav-text">
                            Ações de formacao
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="#">
                       <i class="fa fa-user fa-2x"></i>
                        <span class="nav-text">
                            Formandos
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="#">
                       <i class="fa fa-user fa-2x"></i>
                        <span class="nav-text">
                            Formadores
                        </span>
                    </a>

                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart-o fa-2x"></i>
                        <span class="nav-text">
                            Gradwaaaaaaaaaaa
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-font fa-2x"></i>
                        <span class="nav-text">
                            Typography and Icons
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                       <i class="fa fa-table fa-2x"></i>
                        <span class="nav-text">
                            Tables
                        </span>
                    </a>
                </li>
                <li>
                   <a href="basededados.php">
                        <i class="fa fa-archive fa-2x"></i>
                        <span class="nav-text">
                            Base de Dados
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                   <a href="../includes/logout.php">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
      </div>
  </body>
</html>
