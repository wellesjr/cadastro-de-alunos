<!DOCTYPE html>
<html lang="pt-br">

<?php $this->load->view('includes/head.php')  ?>

<body class="  ">

    <?php $this->load->view('includes/header.php')  ?>

    <main class="main-content">
        <div class="position-relative iq-banner">
            <div class="iq-navbar-header" style="height: 80px;">
                <div class="iq-header-img">
                    <img src="<?php echo base_url('assets/images/dashboard/top-header.png'); ?>" alt="header" class="theme-color-default-img img-fluid w-100 h-50 animated-scaleX">
                </div>
            </div> <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>

        <?php
        switch ($tela):

            case 'cadastrar':  ?>

                <div class="conatiner-fluid content-inner mt-n5 py-0">
                    <div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">

                                    </div>
                                    <div class="card-body">
                                        <?php
                                        echo form_open_multipart() ?>
                                        <div class="form-group">
                                            <div class="profile-img-edit position-relative ">
                                                <img src=" <?php echo base_url('assets/images/avatars/01.png'); ?>" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100">
                                            </div><br>
                                            <div class="col-md-9">
                                                <?php
                                                echo form_label('Adicionar Foto', 'imagem');
                                                ?><br>
                                                <?php
                                                echo form_upload('imagem', '', array('class' => 'form-control form-control-sm col-md-12 '));
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="header-title">
                                            <h4 class="card-title">Informações do Aluno</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="new-user-info">

                                            <div class="form-group col-md-12">
                                                <div class="row">

                                                    <div class="form-group col-md-10"><?php
                                                                                        echo form_label('Nome Completo (*)', 'nome_aluno');
                                                                                        echo form_input('nome_aluno', set_value('nome_aluno'), array('class' => 'form-control col-md-10', 'placeholder' => 'Nome Completo', 'required' => ''))
                                                                                        ?>
                                                    </div>
                                                    <div class="form-group col-md-3"><?php
                                                                                        echo form_label('CEP', 'cep');
                                                                                        echo form_input('cep', set_value('cep'), array('class' => 'form-control col-md-3', 'placeholder' => '00000000'));
                                                                                        ?>
                                                    </div>
                                                    <div class="form-group col-md-4"><?php

                                                                                        echo form_label('Estado', 'estado');
                                                                                        echo  form_dropdown('estado', $estados, '', array('class' => 'form-control col-md-4'));
                                                                                        ?>
                                                    </div>
                                                    <div class="form-group col-md-5"><?php
                                                                                        echo form_label('Cidade', 'cidade');
                                                                                        echo form_input('cidade', set_value('cidade'), array('class' => 'form-control col-md-5', 'placeholder' => 'Cidade'));
                                                                                        ?>
                                                    </div>
                                                    <div class="form-group col-md-6"><?php
                                                                                        echo form_label('Rua', 'rua');
                                                                                        echo form_input('rua', set_value('rua'), array('class' => 'form-control col-md-6', 'placeholder' => 'Rua'));
                                                                                        ?>
                                                    </div>
                                                    <div class="form-group col-md-2"><?php
                                                                                        echo form_label('N°', 'numero');
                                                                                        echo form_input('numero', set_value('numero'), array('class' => 'form-control col-md-2', 'placeholder' => 'Numero'));
                                                                                        ?>
                                                    </div>
                                                    <div class="form-group col-md-4"><?php
                                                                                        echo form_label('Bairro', 'bairro');
                                                                                        echo form_input('bairro', set_value('bairro'), array('class' => 'form-control col-md-5', 'placeholder' => 'Bairro'));
                                                                                        ?>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <?php
                                            echo form_submit('salvar', 'Adicionar Novo Aluno', array('class' => 'btn btn-primary center'));
                                            echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
                break;
            case 'editar': ?>

                <div class="conatiner-fluid content-inner mt-n5 py-0">
                    <div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">

                                    </div>
                                    <div class="card-body">
                                        <?php
                                        echo form_open_multipart() ?>
                                        <div class="form-group">
                                            <div class="profile-img-edit position-relative ">
                                                <?php if ($aluno->foto_aluno != NUll) { ?>
                                                    <img src="<?php echo base_url('uploads/' . $aluno->foto_aluno) ?>" class="theme-color-default-img profile-pic rounded avatar-100">
                                                <?php } else { ?>
                                                    <img src=" <?php echo base_url('assets/images/avatars/01.png'); ?>" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100">
                                                <?php } ?>
                                            </div><br>
                                            <div class="col-md-9">
                                                <?php
                                                echo form_label('Adicionar Foto', 'imagem');
                                                ?><br>
                                                <?php
                                                echo form_upload('imagem', '', array('class' => 'form-control form-control-sm col-md-12 '));
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="header-title">
                                            <h4 class="card-title">Informações do Aluno</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="new-user-info">

                                            <div class="form-group col-md-12">
                                                <div class="row">

                                                    <div class="form-group col-md-10"><?php
                                                                                        echo form_label('Nome Completo (*)', 'nome_aluno');
                                                                                        echo form_input('nome_aluno', set_value('nome_aluno', $aluno->nome_aluno), array('class' => 'form-control col-md-10', 'placeholder' => 'Nome Completo', 'required' => ''))
                                                                                        ?>
                                                    </div>
                                                    <div class="form-group col-md-3"><?php
                                                                                        echo form_label('CEP', 'cep');
                                                                                        echo form_input('cep', set_value('cep', $aluno->cep), array('class' => 'form-control col-md-3', 'placeholder' => '00000000'));
                                                                                        ?>
                                                    </div>
                                                    <div class="form-group col-md-4"><?php

                                                                                        echo form_label('Estado', 'estado');
                                                                                        echo  form_dropdown('estado', $estados, set_value($aluno->id_estado), array('class' => 'form-control col-md-4'));
                                                                                        ?>
                                                    </div>
                                                    <div class="form-group col-md-5"><?php
                                                                                        echo form_label('Cidade', 'cidade');
                                                                                        echo form_input('cidade', set_value('cidade', $aluno->cidade), array('class' => 'form-control col-md-5', 'placeholder' => 'Cidade'));
                                                                                        ?>
                                                    </div>
                                                    <div class="form-group col-md-6"><?php
                                                                                        echo form_label('Rua', 'rua');
                                                                                        echo form_input('rua', set_value('rua', $aluno->rua), array('class' => 'form-control col-md-6', 'placeholder' => 'Rua'));
                                                                                        ?>
                                                    </div>
                                                    <div class="form-group col-md-2"><?php
                                                                                        echo form_label('N°', 'numero');
                                                                                        echo form_input('numero', set_value('numero', $aluno->numero), array('class' => 'form-control col-md-2', 'placeholder' => 'Numero'));
                                                                                        ?>
                                                    </div>
                                                    <div class="form-group col-md-4"><?php
                                                                                        echo form_label('Bairro', 'bairro');
                                                                                        echo form_input('bairro', set_value('bairro', $aluno->bairro), array('class' => 'form-control col-md-5', 'placeholder' => 'Bairro'));
                                                                                        ?>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <?php
                                            echo form_submit('salvar', 'Alterar', array('class' => 'btn btn-primary center'));
                                            echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
                break;
            case 'excluir': ?>

                <div class="conatiner-fluid content-inner mt-n5 py-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title"><?= $title ?></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="new-user-info">
                                        <div class="form-group col-md-12">
                                            <?php echo form_open_multipart() ?>
                                            <div class=" row ">
                                                <div class="col-md-2">
                                                    <div class="profile-img-edit position-relative">
                                                        <?php if ($aluno->foto_aluno != NUll) { ?>
                                                            <img src="<?php echo base_url('uploads/' . $aluno->foto_aluno) ?>" class="theme-color-default-img profile-pic rounded avatar-100">
                                                        <?php } else { ?>
                                                            <img src=" <?php echo base_url('assets/images/avatars/01.png'); ?>" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class=" row ">
                                                        <div class=" col-md-6">
                                                            <?php
                                                            echo form_label('Nome Completo', 'nome_aluno');
                                                            echo form_input('nome_aluno', set_value('nome_aluno', $aluno->nome_aluno), array('class' => 'form-control col-md-6'));
                                                            ?>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <?php
                                                            echo form_label('CEP', 'cep');
                                                            echo form_input('cep', set_value('cep', $aluno->cep), array('class' => 'form-control col-md-3'));
                                                            ?>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <?php
                                                            echo form_label('Estado:', 'estado');
                                                            echo form_input('estado', set_value('estado', $aluno->nome_completo), array('class' => 'form-control col-md-3'));
                                                            ?>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <?php
                                                            echo form_label('Cidade:', 'cidade');
                                                            echo form_input('cidade', set_value('cidade', $aluno->cidade), array('class' => 'form-control col-md-3'));
                                                            ?>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <?php
                                                            echo form_label('Rua:', 'rua');
                                                            echo form_input('rua', set_value('rua', $aluno->rua), array('class' => 'form-control col-md-4'));
                                                            ?>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <?php
                                                            echo form_label('N°:', 'numero');
                                                            echo form_input('numero', set_value('cidade', $aluno->numero), array('class' => 'form-control col-md-3'));
                                                            ?>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <?php
                                                            echo form_label('Bairro:', 'bairro');
                                                            echo form_input('bairro', set_value('bairro', $aluno->bairro), array('class' => 'form-control col-md-3'));
                                                            ?>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Você realmente deseja excluir este aluno</p>
                                                    <div class="row d-flex justify-content-start">
                                                        <div class="col-md-2">
                                                            <?php
                                                            echo form_submit('enviar', 'Sim', array('class' => 'btn btn-primary center'));
                                                            echo form_close(); ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="<?= base_url('home') ?>">
                                                                <button type=" button" class="btn btn-danger">Não</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
                break;
        endswitch;
        ?>



        <?php $this->load->view('includes/footer.php')  ?>
    </main>

</body>

</html>