
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#id</th>
            <th>Cpf</th>
            <th>Nome</th>
            <th>Nome do Pai</th>
            <th>Nome da Mãe</th>
            <th>Status</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($solicitacoes as $row): ?>
            <tr>
                <td><a href="descricaoCertidaoNascimento/<?php echo $row->id ?>">
                <td><?php echo $row->cpf ?></td>
                <td><?php echo $row->nome ?></td>
                <td><?php echo $row->nome_mae ?></td>
                <td><?php echo $row->nome_pai ?></td>
                <td><?php echo $row->status_pedido ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</main>
</div>
</div>
