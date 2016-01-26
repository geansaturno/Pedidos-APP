<?php $pedido = $_REQUEST["cliente"]; ?>
<div class="container">
    <div class=" row">
        <div class="page-header">
            <h1>Alterar Cliente</h1>
        </div>
    </div>
    <div class="row">
        <form method="POST" action="index.php?model=Cliente&action=salvarAlteracoes">
            <div class="row">
                <div class="form-group col-lg-4" hidden="">
                    <label for="id">Id</label>
                    <input type="number" class="form-control" id="id" name="id" required="true" value="<?php echo $pedido->getId(); ?>">
                </div>
                <div class="form-group col-lg-4">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" required="true" value="<?php echo $pedido->getNome(); ?>">
                </div>
                <div class="form-group col-lg-4">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $pedido->getEmail(); ?>">
                </div>
                <div class="form-group col-lg-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" placeholder="Ex. (xx)xxxxxxxx" name="telefone" value="<?php echo $pedido->getTelefone(); ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-lg col-lg-1">Salvar</button>
            </div>
        </form>
    </div>
</div>
