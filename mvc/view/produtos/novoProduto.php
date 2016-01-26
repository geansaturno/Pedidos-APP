<div class="container">
    <div class=" row">
        <div class="page-header">
            <h1>Novo Produto</h1>
        </div>
    </div>
    <div class="row">
        <form method="POST" action="index.php?model=Produto&action=salvar">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" required="true">
                </div>
                <div class="form-group col-lg-4">
                    <label for="telefone">Preço</label>
                    <div class="input-group">
                        <div class="input-group-addon">R$</div>
                        <input type="number" class="form-control" step="any" id="preco" placeholder="Preço" name="preco">
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" rows="3" name="descricao"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg col-lg-1">Salvar</button>
            </div>
        </form>
    </div>
</div>
