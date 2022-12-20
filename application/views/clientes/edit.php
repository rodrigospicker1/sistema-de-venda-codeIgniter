<?php $this->load->view('layout/sidebar') ?>

        

        
            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('clientes') ?>">Clientes</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
                      </ol>
                    </nav>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a title="Voltar" href="<?= base_url('clientes') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
                            <p class="float-left"><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Última alteração: <?= formata_data_banco_com_hora($cliente['cliente_data_alteracao']); ?></strong></p>
                        </div>
                        <div class="card-body">

                            <form method="post" name="form_edit">
                                
                              <fieldset class="border p-2">

                                  <legend class="font-small"><i class="fas fa-user-tie"></i>&nbsp;&nbsp;Dados pessoais</legend>
                                  
                                  <div class="form-group row">

                                    <div class="col-md-5">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="cliente_nome" value="<?= $cliente['cliente_nome'] ?>">
                                        <?= form_error('cliente_nome', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>
                                        
                                    <div class="col-md-5">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" name="cliente_sobrenome" value="<?= $cliente['cliente_sobrenome'] ?>">
                                        <?= form_error('cliente_sobrenome', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                    <div class="col-md-2">
                                        <label>Data de nascimento</label>
                                        <input type="date" class="form-control" name="cliente_data_nascimento" value="<?= $cliente['cliente_data_nascimento'] ?>">
                                        <?= form_error('cliente_data_nascimento', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                  </div>

                                  <div class="form-group row">

                                    <div class="col-md-3">
                                        <?php if($cliente['cliente_tipo']  == 1){ ?>

                                            <label>CPF</label>
                                            <input type="text" class="form-control" name="cliente_cpf" value="<?= $cliente['cliente_cpf_cnpj'] ?>">
                                            <?= form_error('cliente_cpf', '<small  class="form-text text-danger">', '</small>') ?>

                                        <?php }else{ ?>

                                            <label>CNPJ</label>
                                            <input type="text" class="form-control" name="cliente_cnpj" value="<?= $cliente['cliente_cpf_cnpj'] ?>">
                                            <?= form_error('cliente_cnpj', '<small  class="form-text text-danger">', '</small>') ?>

                                        <?php } ?>
                                    </div>

                                    <div class="col-md-3">
                                        <?php if($cliente['cliente_tipo']  == 1){ ?>
                                            <label>RG</label>
                                        <?php }else{ ?>
                                            <label>Inscrição estadual</label>
                                        <?php } ?>
                                        <input type="text" class="form-control" name="cliente_rg_ie" value="<?= $cliente['cliente_rg_ie'] ?>">
                                        <?= form_error('cliente_rg_ie', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control" name="cliente_email" value="<?= $cliente['cliente_email'] ?>">
                                        <?= form_error('cliente_email', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                  </div>

                                  <div class="form-group row">

                                    <div class="col-md-6">
                                        <label>Telefone fixo</label>
                                        <input type="text" class="form-control" name="cliente_telefone" value="<?= $cliente['cliente_telefone'] ?>">
                                        <?= form_error('cliente_telefone', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Telefone celular</label>
                                        <input type="text" class="form-control" name="cliente_celular" value="<?= $cliente['cliente_celular'] ?>">
                                        <?= form_error('cliente_celular', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                  </div>


                              </fieldset>

                              <fieldset class="mt-3 border p-2">

                                  <legend class="font-small"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Dados de endereço</legend>
                                  
                                  <div class="form-group row">

                                    <div class="col-md-6">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" name="cliente_endereco" value="<?= $cliente['cliente_endereco'] ?>">
                                        <?= form_error('cliente_endereco', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                    <div class="col-md-2">
                                        <label>Número</label>
                                        <input type="number" class="form-control" name="cliente_numero_endereco" value="<?= $cliente['cliente_numero_endereco'] ?>">
                                        <?= form_error('cliente_numero_endereco', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Complemento</label>
                                        <input type="text" class="form-control" name="cliente_complemento" value="<?= $cliente['cliente_complemento'] ?>">
                                        <?= form_error('cliente_complemento', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                  </div>

                                  <div class="form-group row">

                                     <div class="col-md-4">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control" name="cliente_bairro" value="<?= $cliente['cliente_bairro'] ?>">
                                        <?= form_error('cliente_bairro', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                    <div class="col-md-2">
                                        <label>CEP</label>
                                        <input type="text" class="form-control" name="cliente_cep" placeholder="CEP" value="<?= $cliente['cliente_cep'] ?>">
                                        <?= form_error('cliente_cep', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                    <div class="col-md-5">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" name="cliente_cidade" placeholder="Cidade" value="<?= $cliente['cliente_cidade'] ?>">
                                        <?= form_error('cliente_cidade', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                    <div class="col-md-1">
                                        <label>UF</label>
                                        <input type="text" class="form-control" name="cliente_estado" placeholder="Estado " value="<?= $cliente['cliente_estado'] ?>">
                                        <?= form_error('cliente_estado', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                  </div>

                              </fieldset>

                              <fieldset class="mt-3 mb-3 border p-2">

                                  <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;&nbsp;Configurações</legend>
                                  
                                  <div class="form-group row">

                                    <div class="col-md-4">
                                        <label>Cliente ativo</label>
                                        <select class="form-control" name="ciente_ativo ">
                                            <option value="0" <?php if($cliente['cliente_ativo'] == 0){echo('selected');} ?> >Não</option>
                                            <option value="1" <?php if($cliente['cliente_ativo'] == 1){echo('selected');} ?> >Sim</option>
                                        </select>
                                    </div>

                                    <div class="col-md-8" >
                                        <label>Observações</label>
                                        <textarea type="text" class="form-control" name="cliente_obs" placeholder="Observações"><?= $cliente['cliente_obs'] ?></textarea>
                                        <?= form_error('cliente_obs', '<small  class="form-text text-danger">', '</small>') ?>
                                    </div>

                                  </div>

                              </fieldset>

                                <input type="hidden" name="cliente_tipo" value="<?= $cliente['cliente_tipo'] ?>">
                                <input type="hidden" name="cliente_id" value="<?= $cliente['cliente_id'] ?>">

                              <button type="submit" class="btn btn-primary">Enviar</button>

                            </form>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            