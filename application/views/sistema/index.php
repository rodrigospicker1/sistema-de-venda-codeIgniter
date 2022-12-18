<?php $this->load->view('layout/sidebar') ?>

        

        
            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
                      </ol>
                    </nav>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">

                            <form method="post" name="form_edit">

                              <div class="form-group row">
                                    
                                <div class="col-md-3">
                                    <label>Razão social</label>
                                    <input type="text" class="form-control" name="sistema_razao_social" placeholder="Razão social" value="<?= $sistema->sistema_razao_social ?>">
                                    <?= form_error('sistema_razao_social', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>
                                    
                                <div class="col-md-3">
                                    <label>Nome fantasia</label>
                                    <input type="text" class="form-control" name="sistema_nome_fantasia" placeholder="Nome fantasia" value="<?= $sistema->sistema_nome_fantasia ?>">
                                    <?= form_error('sistema_nome_fantasia', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>

                                <div class="col-md-3">
                                    <label>CNPJ</label>
                                    <input type="text" class="form-control" name="sistema_cnpj" placeholder="CNPJ" value="<?= $sistema->sistema_cnpj ?>">
                                    <?= form_error('sistema_cnpj', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>

                                <div class="col-md-3">
                                    <label>Inscrição estadual</label>
                                    <input type="text" class="form-control" name="sistema_ie" placeholder="Inscrição estadual" value="<?= $sistema->sistema_ie ?>">
                                    <?= form_error('sistema_cnpj', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>

                              </div>

                              <div class="form-group row">
                                    
                                <div class="col-md-3">
                                    <label>Telefone fixo</label>
                                    <input type="text" class="form-control" name="sistema_telefone_fixo" placeholder="Telefone fixo" value="<?= $sistema->sistema_telefone_fixo ?>">
                                    <?= form_error('sistema_telefone_fixo', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>
                                    
                                <div class="col-md-3">
                                    <label>Telefone móvel</label>
                                    <input type="text" class="form-control" name="sistema_telefone_movel" placeholder="Telefone móvel" value="<?= $sistema->sistema_telefone_movel ?>">
                                    <?= form_error('sistema_telefone_movel', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>

                                <div class="col-md-3">
                                    <label>URL do site</label>
                                    <input type="text" class="form-control" name="sistema_site_url" placeholder="URL do site" value="<?= $sistema->sistema_site_url ?>">
                                    <?= form_error('sistema_site_url', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>

                                <div class="col-md-3">
                                    <label>E-mail de contato</label>
                                    <input type="text" class="form-control" name="sistema_email" placeholder="E-mail de contato" value="<?= $sistema->sistema_email ?>">
                                    <?= form_error('sistema_email', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>

                              </div>

                              <div class="form-group row">
                                    
                                <div class="col-md-4">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" name="sistema_endereco" placeholder="Endereço" value="<?= $sistema->sistema_endereco ?>">
                                    <?= form_error('sistema_endereco', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>
                                    
                                <div class="col-md-2">
                                    <label>CEP</label>
                                    <input type="text" class="form-control" name="sistema_cep" placeholder="CEP" value="<?= $sistema->sistema_cep ?>">
                                    <?= form_error('sistema_cep', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>

                                <div class="col-md-2">
                                    <label>Número</label>
                                    <input type="text" class="form-control" name="sistema_numero" placeholder="Número" value="<?= $sistema->sistema_numero ?>">
                                    <?= form_error('sistema_numero', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>

                                <div class="col-md-2">
                                    <label>Cidade</label>
                                    <input type="text" class="form-control" name="sistema_cidade" placeholder="Cidade" value="<?= $sistema->sistema_cidade ?>">
                                    <?= form_error('sistema_cidade', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>

                                <div class="col-md-2">
                                    <label>UF</label>
                                    <input type="text" class="form-control" name="sistema_estado" placeholder="UF" value="<?= $sistema->sistema_estado ?>">
                                    <?= form_error('sistema_estado', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>

                              </div>

                              <div class="form-group row">
                                    
                                <div class="col-md-12">
                                    <label>Texto da ordem de serviço e venda </label>
                                    <textarea class="form-control" name="sistema_txt_ordem_servico" placeholder="Texto da ordem de serviço e venda"><?= $sistema->sistema_txt_ordem_servico ?></textarea>
                                    <?= form_error('sistema->sistema_txt_ordem_servico', '<small  class="form-text text-danger">', '</small>') ?>
                                </div>

                              </div>
                              

                                <button type="submit" class="btn btn-sm btn-primary">Enviar</button>

                            </form>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            