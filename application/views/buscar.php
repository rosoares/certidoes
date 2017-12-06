<script type="text/javascript">
    $(document).ready(function () {
        $("#resultados").hide();
    });
    
    function buscaCertidao() {
        var id = $("#id").val();
        var tipo = $("#tipo").val();
        var cpf = $("#cpfsol").val();
        $.ajax({
            data:"&id="+id+"&tipo="+tipo+"&cpf="+cpf,
            type: "post",
            url: "Certidoes/Buscar",
            success:
                function (data) {
                    if (data == ''){
                        data = "Não foram encontrados resultados";
                    }
                    $("#result").html(data);
                    $("#resultados").show();
                }
        })
    }
</script>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <center><h1>Buscar Pedido</h1></center>
                <br>
                <form id="busca" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tipo" class="col-form-label">Selecione o tipo de certidão:</label>
                            <select name="tipo" class="form-control" id="tipo">
                                <option value="C">Certidão de Casamento</option>
                                <option value="O">Certidão de Óbito</option>
                                <option value="N">Certidão de Nascimento</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="id" class="col-form-label">Código do Pedido:</label>
                            <input name="id" type="text" class="form-control" id="id" placeholder="Código">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="cpfsol" class="col-form-label">CPF do Solicitante:</label>
                            <input name="cpfsol" type="text" class="form-control" id="cpfsol" placeholder="CPF">
                        </div>
                    </div>
                    <br>
                    <center><button type="button" onclick="buscaCertidao();" class="btn btn-primary">Solicitar</button></center>
                </form>
                <div id="resultados">
                    <hr>
                    <center><h1>Resultados do Busca</h1></center>
                    <br>
                    <div id="result">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>