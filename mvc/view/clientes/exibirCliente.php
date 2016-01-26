<?php
$pedido = $_REQUEST['cliente'];
?>
<div class="container">
    <div class=" row">
        <div class="page-header">
            <h1>Exibir Cliente</h1>
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
                <span id="label" class="property-label">Email</span>
                <div class="property-value"><?php echo $pedido->getEmail(); ?></div>
            </li>
            <li class="fieldcontain">
                <span id="label" class="property-label">Telefone</span>
                <div class="property-value"><?php echo $pedido->getTelefone(); ?></div>
            </li>
        </ol>
    </div>
    
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="index.php?model=Cliente&action=alterar&id=<?php echo $pedido->getId(); ?>">Alterar</a></li>
            <li role="presentation"><a href="index.php?model=Cliente&action=deletar&id=<?php echo $pedido->getId(); ?>">Deletar</a></li>
        </ul>
    </div>
</div>
