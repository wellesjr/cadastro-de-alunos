<!DOCTYPE html>
<html lang="pt-br">

<?php $this->load->view('includes/head.php')  ?>

<body class="  ">

    <?php $this->load->view('includes/header.php')  ?>

    <main class="main-content">
        <div class="position-relative iq-banner">
            <div class="iq-navbar-header" style="height: 80px;">
                <div class="iq-header-img">
                    <img src="../../assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-50 animated-scaleX">
                </div>
            </div> <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>

        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title"><?php echo $title ?></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--  -->
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped" data-toggle="data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ações</th>
                                            <th></th>

                                            <th>Nome</th>
                                            <th>Cidade</th>
                                            <th>Estado</th>
                                            <th>CEP</th>
                                            <th>Rua</th>
                                            <th>N°</th>
                                            <th>Bairro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($alunos as $aluno) { ?>
                                            <tr>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">

                                                        <a class="btn btn-sm btn-icon btn-warning" href="<?= base_url('page/editar/' . $aluno['id_aluno']) ?>">
                                                            <span class="btn-inner">
                                                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                            </span>
                                                        </a>

                                                        <a class="btn btn-sm btn-icon btn-danger" href="<?= base_url('page/excluir/' . $aluno['id_aluno']) ?>">
                                                            <span class="btn-inner">
                                                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                            </span>
                                                        </a>

                                                    </div>
                                                </td>
                                                <td>
                                                    <?php if ($aluno['foto_aluno'] != NUll) { ?>
                                                        <img src="<?php echo base_url('uploads/' . $aluno['foto_aluno']) ?>" class="theme-color-default-img profile-pic rounded avatar-80">
                                                    <?php } else { ?>
                                                        <img src=" <?php echo base_url('assets/images/avatars/01.png'); ?>" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-80">
                                                    <?php } ?>
                                                </td>
                                                <td><?= $aluno['nome_aluno'] ?></td>
                                                <td><?= $aluno['cidade'] ?></td>
                                                <td><?= $aluno['nome_completo'] ?></td>
                                                <td><?= $aluno['cep'] ?></td>
                                                <td><?= $aluno['rua'] ?></td>
                                                <td><?= $aluno['numero'] ?></td>
                                                <td><?= $aluno['bairro'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('includes/footer.php')  ?>
    </main>

</body>

</html>