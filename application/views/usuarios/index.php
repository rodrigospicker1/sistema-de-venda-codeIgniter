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
                            <a title="Cadastrar novo usuário" href="<?php echo base_url('usuarios/add'); ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-user-plus"></i>&nbsp; Novo </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Usuário</th>
                                            <th>Perfil</th>
                                            <th>Login</th>
                                            <th class="text-center">Ativo</th>
                                            <th class="no-sort" >Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($usuarios as $user){ ?>
                                        <tr>
                                            <td><?= $user['id'] ?></td>
                                            <td><?= $user['username'] ?></td>
                                            <?php foreach($groups as $group){ 

                                                if($group['user_id'] == $user['id']){ 

                                                    if($group['group_id'] == 1){ ?> <td>Adimistrador</td> <?php }
                                                    else{?> <td>Vendedor</td> <?php }
                                            }} ?>
                                            <td><?= $user['email'] ?></td>
                                            <td class="text-center"><?php if($user['active'] == 1){echo('<span class="badge-primary btn-sm">Sim</span>');}else{echo('<span class="badge-primary btn-sm">Não</span>');} ?></td>
                                            <td>
                                                <a title="Editar" href="<?= base_url('usuarios/edit/'.$user['id']) ?>" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></a>
                                                <a title="Excluir" href="<?= base_url('usuarios/del/'.$user['id']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i></a>
                                            </td>
                                        </tr>
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

            