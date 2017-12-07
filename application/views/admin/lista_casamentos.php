

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#id</th>
            <th>Cpf</th>
            <th>Nome do Noivo</th>
            <th>Nome da Noiva</th>
            <th>Status</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($solicitacoes as $row): ?>
             <tr>
                 <td><a href="#"> <?php echo $row->id ?></a></td>
                <td><?php echo $row->cpf ?></td>
                <td><?php echo $row->nome_noivo ?></td>
                <td><?php echo $row->nome_noiva ?></td>
                <td><?php echo $row->status_pedido ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</main>
</div>
</div>
