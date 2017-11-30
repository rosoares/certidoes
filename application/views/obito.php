<section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <center><h1>Preencha as Informações da Certidão</h1></center>
            <br>
            <?php 
              if(!empty($this->session->erros)):
                $erros = $this->session->erros;
                $this->session->unset_userdata('erros'); 
            ?>
              <?php foreach($erros as $erro): ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $erro; ?>
                </div>
              <?php endforeach; ?>  
            <?php endif; ?>
            <?php unset($this->session->erros) ?>
            <form id="form">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="cpf" class="col-form-label">CPF:</label>
                  <input name="cpf" type="text" class="form-control" id="cpf" placeholder="CPF">
                </div>
                <div class="form-group col-md-6">
                  <label for="data" class="col-form-label">Data do Falecimento</label>
                  <input name="data_falecimento" type="text" class="form-control" id="data" placeholder="Data do Falecimento">
                </div>
              </div>
              <div class="form-group">
                <label for="nome_falecido" class="col-form-label">Nome do Falecido</label>
                <input name="nome_falecido" type="text" class="form-control" id="nome_falecido" placeholder="Nome do Falecido">
              </div>
              <div class="form-group">
                <label for="cidade_falecimento" class="col-form-label">Cidade do Falecimento</label>
                <input name="cidade_falecimento" type="text" class="form-control" id="cidade_falecimento" placeholder="Cidade do Falecimento">
              </div>
              <br>