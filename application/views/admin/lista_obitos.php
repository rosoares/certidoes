
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#id</th>
            <th>Cpf</th>
            <th>Nome do Falecido</th>
            <th>Status</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($solicitacoes as $row): ?>
            <tr>
                <td><?php echo $row->id ?></td>
                <td><?php echo $row->cpf ?></td>
                <td><?php echo $row->nome_falecido ?></td>
                <td><?php echo $row->status_pedido ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</main>
</div>
</div>
