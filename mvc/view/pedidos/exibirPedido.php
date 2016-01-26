<?php
$pedido = $_REQUEST['pedido'];
?>
<div class="container">
    <div class=" row">
        <div class="page-header">
            <h1>Exibir Pedido</h1>
        </div>
    </div>
    <div class="row">
        <ol class="property-list">
            <li class="fieldcontain">
                <span id="label" class="property-label">ID</span>
                <div class="property-value"><?php echo $pedido->getCliente()->getID() . " - " . $pedido->getProduto()->getId(); ?></div>
            </li>
            <li class="fieldcontain">
                <span id="label" class="property-label">Produto</span>
                <div class="property-value">
                    <?php
                    $link = "index.php?model=Produto&action=exibir";
                    $link .= "&id=" . $pedido->getProduto()->getID();
                    echo "<a href=$link>" . $pedido->getProduto()->getNome() . "</a>";
                    ?>
                </div>
            </li>
            <li class="fieldcontain">
                <span id="label" class="property-label">Cliente</span>
                <div class="property-value">
                    <?php
                    $link = "index.php?model=Cliente&action=exibir";
                    $link .= "&id=" . $pedido->getCliente()->getId();
                    echo "<a href=$link>" . $pedido->getCliente()->getNome() . "</a>";
                    ?>
                </div>
            </li>
        </ol>
    </div>
    <div class="row">
        <ul class="nav nav-pills">
            <?php 
                $link = "index.php?model=Pedido&action=deletar&cid=" . $pedido->getCliente()->getID();
                $link .= "&pid=" . $pedido->getProduto()->getId();
            ?>
            <li role="presentation"><a href="index.php?model=Pedido&action=deletar&cid=<?php echo $link; ?>">Deletar</a></li>
        </ul>
    </div>
</div>
