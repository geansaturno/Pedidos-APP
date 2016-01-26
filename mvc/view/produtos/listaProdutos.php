<?php
$pedido = $_REQUEST['produtos'];
?>
<div class="container">
    <div class=" row">
        <div class="page-header">
            <h1>Lista de Produtos</h1>
        </div>
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
                            Nome
                        </th>
                        <th>
                            Descriçao
                        </th>
                        <th>
                            Preço
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedido as $pedido): ?>
                        <tr>
                            <td><?php
                                echo $pedido->getId();
                                ?> </td>
                            <td>
                                <?php
                                $link = "index.php?model=Produto&action=exibir";
                                $link .= "&id=" . $pedido->getId();
                                echo '<a href=' . $link . '>' . $pedido->getNome() . '</a>';
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $pedido->getDescricao();
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "R$ ". $pedido->getPreco();
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>