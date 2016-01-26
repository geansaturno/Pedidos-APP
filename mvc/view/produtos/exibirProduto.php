<?php
$pedido = $_REQUEST['produto'];
?>
<div class="container">
    <div class=" row">
        <div class="page-header">
            <h1>Exibir Produto</h1>
        </div>
    </div>
    <div class="row">
        <ol class="property-list">
            <li class="fieldcontain">
                <span id="label" class="property-label">Nome</span>
                <div class="property-value"><?php echo $pedido->getNome(); ?></div>
            </li>
            <li class="fieldcontain">
                <span id="label" class="property-label">ID</span>
                <div class="property-value"><?php echo $pedido->getID(); ?></div>
            </li>
            <li class="fieldcontain">
                <span id="label" class="property-label">Descriçao</span>
                <div class="property-value"><?php echo $pedido->getDescricao(); ?></div>
            </li>
            <li class="fieldcontain">
                <span id="label" class="property-label">Preço</span>
                <div class="property-value"><?php echo "R$ " . $pedido->getPreco(); ?></div>
            </li>
        </ol>
    </div>

    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="index.php?model=Produto&action=alterar&id=<?php echo $pedido->getId(); ?>">Alterar</a></li>
            <li role="presentation"><a href="index.php?model=Produto&action=deletar&id=<?php echo $pedido->getId(); ?>">Deletar</a></li>
        </ul>
    </div>
</div>
