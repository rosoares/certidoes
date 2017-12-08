<script type="text/javascript">
    function alteraStatusEntregaObito(id_certidao) {
        var status = $("#status").val();
        $.ajax({
            url: 'Admin/alteraStatusEntregaObito',
            type: 'post',
            data: '&id='+id_certidao+'&status='+status,
            success:
                function (success) {
                    if (success){
                        alert("Status de Entrega Atualizados");
                    }else{
                        alert("Ocorreu um erro");
                    }
                }
        })
    }
</script>
<br>
<section>
    <dl class="row">
        <dt class="col-md-4"><h5>Id Pedido: <?php echo $certidao->id ?> </h5></dt>
        <dd class="col-md-4"><h5>Cpf do Solicitante: <?php echo $certidao->cpf ?></dd>
    </dl>
    <dl class="row">
        <dt class="col-md-4"><h5>Nome do Falecido: <?php echo $certidao->nome_noivo ?> </h5></dt>
    </dl>
    <dl class="row">
        <dt class="col-md-4"><h5>Data do Falecimento: <?php echo $certidao->data_casamento ?> </h5></dt>
        <dd class="col-md-4"><h5>Cidade do Falecimento: <?php echo $certidao->cidade_casamento ?></dd>
    </dl>
    <hr>
    <dl class="row">
        <dt class="col-md-4"><h5>Rua: <?php echo $certidao->endereco ?> </h5></dt>
        <dd class="col-md-4"><h5>Número: <?php echo $certidao->numero ?></dd>
        <dd class="col-md-4"><h5>Bairro: <?php echo $certidao->bairro ?></dd>
    </dl>
    <dl class="row">
        <dt class="col-md-4"><h5>Complemento: <?php echo $certidao->complemento ?> </h5></dt>
        <dd class="col-md-4"><h5>Referência: <?php echo $certidao->referencia ?></dd>
    </dl>
    <dl class="row">
        <dt class="col-md-4"><h5>E-mail: <?php echo $certidao->email ?> </h5></dt>
        <dd class="col-md-4"><h5>Telefone pra Contato: <?php echo $certidao->telefone ?></dd>
    </dl>
    <hr>
    <dl class="row">
        <dt class="col-md-4"><h5>Status do Pedido: <?php echo $certidao->status_pedido ?> </h5></dt>
    </dl>
    <hr>
    <dl class="row">
        <dt class="col-md-4"><h5>Status do Pedido: <?php echo $certidao->status_pedido ?> </h5></dt>
    </dl>
    <hr>
    <dl class="row">
        <?php if ($certidao->status == '3'): ?>
            <form id="alterarEntrega" class="form-inline">
                <div class="form-group mx-sm-3">
                    <label for="staticLabel" class="sr-only"></label>
                    <input type="text" readonly class="form-control-plaintext" id="staticLabel" value="Alterar Status da Entrega:">
                </div>
                <div class="form-group mx-sm-4">
                    <select class="form-control" id="status" name="status">
                        <option value="0" <?php if (is_null($certidao->entrega) || $certidao->entrega == 0 ) echo 'selected' ?>>Não entregue</option>
                        <option value="1" <?php if ($certidao->entrega == 1 ) echo 'selected' ?>>Saiu para Entrega</option>
                        <option value="2" <?php if ($certidao->entrega == 2 ) echo 'selected' ?>>Entregue</option>
                    </select>
                </div>
                <button type="button" onclick="alteraStatusEntregaObito(<?php echo $certidao->id ?>);" class="btn btn-primary">Alterar</button>
            </form>
        <?php endif; ?>

    </dl>

</section>