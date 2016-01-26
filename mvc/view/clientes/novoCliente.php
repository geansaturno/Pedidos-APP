<div class="container">
    <div class=" row">
        <div class="page-header">
            <h1>Novo Clientes</h1>
        </div>
    </div>
    <div class="row">
        <form method="POST" action="index.php?model=Cliente&action=salvar">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" required="true">
                </div>
                <div class="form-group col-lg-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control small" id="email" placeholder="Email" name="email">
                </div>
                <div class="form-group col-lg-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" placeholder="Ex. (xx)xxxxxxxxx" name="telefone">
                </div>
                <button type="submit" class="btn btn-primary btn-lg col-lg-1">Salvar</button>
            </div>
        </form>
    </div>
</div>
