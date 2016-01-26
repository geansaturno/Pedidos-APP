
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Pedido App</a>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="index.php?model=Pedido&action=listar" role="button" aria-haspopup="true" aria-expanded="false">Pedidos</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-left">
                            <li><a href="index.php?model=Cliente&action=novo">Novo Cliente</a></li>
                            <li><a href="index.php?model=Cliente&action=listar">Lista de Clientes</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produtos<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-left">
                            <li><a href="index.php?model=Produto&action=novo">Novo Produto</a></li>
                            <li><a href="index.php?model=Produto&action=listar">Lista de Produto</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>