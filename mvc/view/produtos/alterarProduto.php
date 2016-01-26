<?php $pedido = $_REQUEST["produto"]; ?>
<div class="container">
    <div class=" row">
        <div class="page-header">
            <h1>Alterar Produto</h1>
        </div>
    </div>
    <div class="row">
        <form method="POST" action="index.php?model=Produto&action=salvarAlteracoes">
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
                    <label for="telefone">Preço</label>
                    <div class="input-group">
                        <div class="input-group-addon">R$</div>
                        <input type="number" class="form-control" id="preco" step="any" placeholder="Preço" name="preco" value="<?php echo $pedido->getPreco(); ?>">
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" rows="3" name="descricao"><?php echo $pedido->getDescricao(); ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg col-lg-1">Salvar</button>
            </div>
        </form>
    </div>
</div>
