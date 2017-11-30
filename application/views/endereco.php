<center><h1>Informações para Contato</h1></center>
              <br>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="email" class="col-form-label">E-mail</label>
                  <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                  <label for="telefone" class="col-form-label">Telefone</label>
                  <input name="telefone" type="text" class="form-control" id="telefone" placeholder="Telefone">
                </div>
              </div>
<br>
<center><h1>Agora um Endereço para Entrega</h1></center>
              <br>
              <div class="form-group">
                <label for="endereco" class="col-form-label">Endereço</label>
                <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Endereço">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="numero" class="col-form-label">Número</label>
                  <input name="numero" type="text" class="form-control" id="numero" placeholder="Número">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCity" class="col-form-label">Bairro</label>
                  <input name="bairro" type="text" class="form-control" id="bairro" placeholder="Bairro">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="complemento" class="col-form-label">Complemento</label>
                  <input name="complemento" type="text" class="form-control" id="complemento" placeholder="Complemento">
                </div>
                <div class="form-group col-md-6">
                  <label for="referencia" class="col-form-label">Referência</label>
                  <input name="referencia" type="text" class="form-control" id="referencia" placeholder="Referência">
                </div>
              </div>
              <br>
              <center><button type="button" onclick="submitForm();" class="btn btn-primary">Solicitar</button></center>
            </form>
            
             <form id="comprar" action="https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
              <input type="hidden" name="code" id="code" value="" />
            </form>

            <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>

          </div>
        </div>
      </div>
</section>