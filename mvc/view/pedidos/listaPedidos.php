<?php
$pedidos = $_REQUEST['pedidos'];
$produtos = $_REQUEST['produtos'];
$pedido = $_REQUEST['clientes'];
?>
<div class="container">
    <div class=" row">
        <div class="page-header">
            <h1>Lista de Pedidos</h1>
        </div>
    </div>
    <div class="row">
        <form method="POST" action="index.php?model=Pedido&action=salvar">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="nome">Produtos</label>
                    <select class="form-control" name="produtoId">
                        <?php foreach ($produtos as $pedido): ?>
                            <?php 
                            $option = '<option value="' . $pedido->getID() . '">';
                            $option .= $pedido->getNome() . '</option>';
                            echo $option;?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="email">Clientes</label>
                    <select class="form-control" name="clienteId">
                        <?php foreach ($clientes as $pedido): ?>
                            <?php 
                            $option = '<option value="' . $pedido->getID() . '">';
                            $option .= $pedido->getNome() . '</option>';
                            echo $option;?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg col-lg-2">Salvar</button>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Cliente
                        </th>
                        <th>
                            Produto
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $pedido): ?>
                        <tr>
                            <td><?php
                                $clienteId = $pedido->getCliente()->getId();
                                $produtoId = $pedido->getProduto()->getId();
                                $link = "index.php?model=Pedido&action=exibir";
                                $link .= "&cid=$clienteId&pid=$produtoId";
                                echo '<a href=' . $link . '>' . $clienteId . ' - ' . $produtoId . '</a>';
                                ?> </td>
                            <td>
                                <?php
                                $link = "index.php?model=Cliente&action=exibir";
                                $link .= "&id=" . $clienteId;
                                echo '<a href=' . $link . '>' . $pedido->getCliente()->getNome() . '</a>';
                                ?>
                            </td>
                            <td>
                                <?php
                                $link = "index.php?model=Produto&action=exibir";
                                $link .= "&id=" . $produtoId;
                                echo '<a href=' . $link . '>' . $pedido->getProduto()->getNome() . '</a>';
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>