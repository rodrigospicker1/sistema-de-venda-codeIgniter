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

                    <?php if($message_success = $this->session->flashdata('sucesso')){ ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong><i class="fas fa-smile-wink"></i>&nbsp;&nbsp;<?= $message_success; ?></strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                            </div>
                        </div>

                    <?php }else if($message_error = $this->session->flashdata('error')){ ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong><?= $message_error; ?></strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a title="Cadastrar novo cliente" href="<?php echo base_url('clientes/add'); ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-user-tie"></i>&nbsp; Novo </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>CPF / CNPJ</th>
                                            <th>Tipo cliente</th>
                                            <th class="text-center">Ativo</th>
                                            <th class="no-sort" >Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($clientes as $cliente){ ?>
                                        <tr>
                                            <td><?= $cliente['cliente_id'] ?></td>
                                            <td><?= $cliente['cliente_nome'] ?></td>
                                            <td><?= $cliente['cliente_cpf_cnpj'] ?></td>
                                            <td class="text-center"><?php if($cliente['cliente_tipo'] == 1){echo('Pessoa física');}else{echo('Pessoa jurídica');} ?></td>
                                            <td class="text-center"><?php if($cliente['cliente_ativo'] == 1){echo('<span class="badge-primary btn-sm">Sim</span>');}else{echo('<span class="badge-primary btn-sm">Não</span>');} ?></td>
                                            <td>
                                                <a title="Editar" href="<?= base_url('clientes/edit/'.$cliente['cliente_id']) ?>" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></a>
                                                <a title="Excluir" href="javascript(void)" data-toggle="modal" data-target="#cliente-<?= $cliente['cliente_id']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i></a>
                                            </td>
                                        </tr>

                                        <!-- MODAL -->
                                        <div class="modal fade" id="cliente-<?= $cliente['cliente_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Deletar administrador?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Para excluir o cliente clique em <strong>"Sim"</strong></div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
                                                        <a class="btn btn-danger btn-sm" href="<?= base_url('clientes/del/'.$cliente['cliente_id']); ?>">Sim</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            