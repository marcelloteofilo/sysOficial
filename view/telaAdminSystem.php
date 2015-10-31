<?php
//session_start();
//if (!isset($_SESSION['login']) == true and !isset($_SESSION['senha']) == true) {
// session_destroy();
// unset($_SESSION['login']);
//unset($_SESSION['senha']);
// header('location: usuario/login.php#login');
//} else {
//  $logado = $_SESSION['login'];
//}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SysTransportes</title>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/paginaTemplate.css">
        <script type="text/javascript" src="../js/scriptsUsuarios.js"></script>

    <header class="navbar-fixed-top navbar" style="background:#0EB493;">
        <div class="container">
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
                <ul  class="nav navbar-nav">
                    <li class="current"><a href="usuario/logout.php">Início</a></li>
                </ul>
                <ul  class="nav navbar-nav">
                    <li class="current"><a href="#"><!--<?php echo "Usuario: " . $logado; ?>--></a></li>
                </ul>
            </nav>
            <div class="navbar-header">
                <a  class="navbar-brand" href="#">SysTransportes</a>
            </div>
        </div>
    </header>
    <br>

</head>


<script type="text/javascript">

</script>

<body style="background:#F3F8F7">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="offer offer-default">
                    <div class="offer-content">
                        <h3   class="lead">
                            Usuários
                        </h3>
                        <p>Cads. usuários SysTransportes</p>
                        <a class="btn btn-lg btn-block btn-default" href="usuario/telaAdminUsuarios.php">Acesse</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="offer offer-success">
                    <div class="offer-content">
                        <h3 class="lead">
                            Cotações
                        </h3>
                        <p>Cads. cotações SysTransportes</p>
                        <a class="btn btn-lg btn-block btn-default" href="carga/telaAdminCarga.php">Acesse</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="offer offer-info">
                    <div class="offer-content">
                        <h3 class="lead">
                            Mercadoria
                        </h3>
                        <p>Cads. mercad. SysTransportes</p>
                        <a class="btn btn-lg btn-block btn-default" href="mercadoria/telaAdminMercadorias.php">Acesse</a>
                    </div>
                </div>
            </div>

            
            <!--COLETA-->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="offer offer-new1">
                    <div class="offer-content">
                        <h3 class="lead">
                            Coleta
                        </h3>
                        <p>Cads. Coleta SysTransportes</p>
                        <a class="btn btn-lg btn-block btn-default" href="coleta/telaAdminColeta.php">Acesse</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="offer  offer-primary">
                    <div class="offer-content">
                        <h3 class="lead">
                            Veiculos
                        </h3>
                        <p>Cads. veiculos SysTransportes</p>
                        <a class="btn btn-lg btn-block btn-default" href="veiculo/telaAdminVeiculos.php">Acesse</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="offer offer-new1">
                    <div class="offer-content">
                        <h3 class="lead">
                            CTE's
                        </h3>
                        <p>Cads. CTE's SysTransportes</p>
                        <a class="btn btn-lg btn-block btn-default" href="cte/telaAdminCte.php">Acesse</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="offer offer-new1">
                    <div class="offer-content">
                        <h3 class="lead">
                            Frete
                        </h3>
                        <p>Cads. Frete SysTransportes</p>
                        <a class="btn btn-lg btn-block btn-default" href="frete/telaAdminFrete.php">Acesse</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>