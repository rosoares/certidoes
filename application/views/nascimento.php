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
                  <label for="data" class="col-form-label">Data de Nascimento</label>
                  <input name="data" type="text" class="form-control" id="data_nascimento" placeholder="Data de Nascimento">
                </div>
              </div>
              <div class="form-group">
                <label for="nome" class="col-form-label">Nome</label>
                <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome">
              </div>
              <div class="form-group">
                <label for="nome_mae" class="col-form-label">Nome da Mãe</label>
                <input name="nome_mae" type="text" class="form-control" id="nome_mae" placeholder="Nome da Mãe">
              </div>
              <div class="form-group">
                <label for="nome_pai" class="col-form-label">Nome do Pai</label>
                <input name="nome_pai" type="text" class="form-control" id="nome_pai" placeholder="Nome do Pai">
              </div>
              <div class="form-group">
                <label for="cidade_falecimento" class="col-form-label">Cidade do Nascimento</label>
                <input name="cidade_nascimento" type="text" class="form-control" id="cidade_nascimento" placeholder="Cidade do Nascimento">
              </div>
              <br>