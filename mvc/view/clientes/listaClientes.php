<?php
$pedido = $_REQUEST['clientes'];
?>
<div class="container">
    <div class=" row">
        <div class="page-header">
            <h1>Lista de Clientes</h1>
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
                            Email
                        </th>
                        <th>
                            Telefone
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedido as $pedido): ?>
                        <tr>
                            <td><?php
                                echo $pedido->getId();
                                ?>
                            </td>
                            <td>
                                <?php
                                $link = "index.php?model=Cliente&action=exibir";
                                $link .= "&id=" . $pedido->getId();
                                echo '<a href=' . $link . '>' . $pedido->getNome() . '</a>';
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $pedido->getEmail();
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $pedido->getTelefone();
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>