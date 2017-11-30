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
                  <label for="data" class="col-form-label">Data do Casamento</label>
                  <input name="data_casamento" type="text" class="form-control" id="data" placeholder="Data do Casamento">
                </div>
              </div>
              <div class="form-group">
                <label for="nome_noivo" class="col-form-label">Nome do Noivo</label>
                <input name="nome_noivo" type="text" class="form-control" id="nome_noivo" placeholder="Nome do Noivo">
              </div>
              <div class="form-group">
                <label for="nome_noiva" class="col-form-label">Nome da Noiva</label>
                <input name="nome_noiva" type="text" class="form-control" id="nome_noiva" placeholder="Nome da Noiva">
              </div>
              <div class="form-group">
                <label for="cidade_casamento" class="col-form-label">Cidade do Casamento</label>
                <input name="cidade_casamento" type="text" class="form-control" id="cidade_casamento" placeholder="Cidade do Casamento">
              </div>
              <br>