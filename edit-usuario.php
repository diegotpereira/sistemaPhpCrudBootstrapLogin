<?php include_once('config.php');
if (isset($_REQUEST['editId']) and $_REQUEST['editId'] != "") {
    # code...
    $row   =  $db->getAllRecords('usuarios', '*', 'AND id="'. $_REQUEST['editId']. '"');
}
if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
    # code...
    extract($_REQUEST);
    if ($usuario_nome == "") {
        # code...
        header('location:' . $_SERVER['PHP_SELF'] .'?msg=un&editId='. $_REQUEST['editId']);
        exit;
    } elseif ($usuario_email == "") {
        # code...'
        header('location:' . $_SERVER['PHP_SELF'] .'?msg=ue&editId='. $_REQUEST['editId']);
        exit;
    } elseif ($usuario_telefone == "") {
        # code...
        header('location:' . $_SERVER['PHP_SELF'] .'?msg=up&editId'. $_REQUEST['editId']);
        exit;
    }
    $data = array(
        'usuario_nome' => $usuario_nome,
        'usuario_email' => $usuario_email,
        'usuario_telefone' => $usuario_telefone,
                );
    $update = $db->update('usuarios', $data, array('id' => $edit));
    if ($update) {
        # code...
        header('location: home.php?msg=rus');
        exit;
    } else {
        # code...
        header('location:home.php?msg=rnu');
        exit;
    }
}

?>
<!doctype html>
<html lang="pt-br" xmlns="https://www.facebook.com/2008/fbml" xmlns.addthis="https://addthis.com/help/api-spec" prefix="og: http://ogp.me/ns#" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar</title>


    <link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
    <div class="bg-light border-bottom shadow-sm sticky-top">
        <div class="container">
            <header class="blog-header py-1">
                <nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand text-muted p-0 m-0" href=""><img src="" alt''></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-17" class="active nav-item"><a title="Home" href="https://learncodeweb.com/" class="nav-link">Home</a></li>
                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-16" class="nav-item"><a title="Web Development" href="https://learncodeweb.com/learn/web-development/" class="nav-link">Web Development</a></li>
                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-558" class="nav-item"><a title="PHP" href="https://learncodeweb.com/learn/php/" class="nav-link">PHP</a></li>
                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-14" class="nav-item"><a title="Bootstrap" href="https://learncodeweb.com/learn/bootstrap-framework/" class="nav-link">Bootstrap</a></li>
                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-559" class="nav-item"><a title="WordPress" href="https://learncodeweb.com/learn/wordpress/" class="nav-link">WordPress</a></li>
                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-15" class="nav-item"><a title="Snippets" href="https://learncodeweb.com/learn/snippets/" class="nav-link">Snippets</a></li>
                        </ul>
                    
                        <form method="get" action="" class="form-inline my-2 my-lg-0">
                            <div class="input-group input-group-md">
                                <input type="text" class="form-control search-width" name="s" id="search" value="" placeholder="Procurar..." aria-label="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary" id="searchBtn"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </nav>
            </header>
        </div>
    </div>

    <div class="container">
        <h1><a href=""></a></h1>
        <?php
        if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "un") {
            # code...
            echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triagle"></i> Nome de Usuário é obrigatório!</div>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ue") {
            # code...
            echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> E-mail é obrigatório!</div>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "up") {
            # code...
            echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Telefone é obrigatório!</div>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {
            # code...
            echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Salvo com Sucesso!</div>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {
            # code...
            echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></I> Erro ao salvar!</strong></div>';
        }
        ?>
        <div class="card">
            <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Novo Usuário</strong> <a href="home.php" class="float-rigth btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i>Navegar</a></div>
            <div class="card-body">
                <div class="col-sm-6">
                    <h5 class="card-title">Campos com <span class="text-danger">*</span> é obriatório!</h5>
                    <form method="post">
                        <div class="form-group">
                            <label>Nome<span class="text-danger">*</span></label>
                            <input type="text" name="usuario_nome" id="usuario_nome" class="form-control" value="<?php echo $row[0] ['usuario_nome']; ?>" placeholder="Digite seu nome" required>
                        </div>
                        <div class="form-group">
                            <label>E-mail<span class="text-danger">*</span></label>
                            <input type="text" name="usuario_email" id="usuario_email" class="form-control" value="<?php echo $row[0] ['usuario_email']; ?>" placeholder="Digite seu e-mail" required>
                        </div>
                        <div class="form-group">
                            <label>Telefone<span class="text-danger">*</span></label>
                            <input type="tel" name="usuario_telefone" id="usuario_telefone" maxlength="12" class="form-control" value="<?php echo $row[0] ['usuario_telefone']; ?>" placeholder="Digite seu telefone" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId'] ?>">
                            <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Atualizar Usuário</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>

</html>