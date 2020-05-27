<?php
require 'middleware/middleware_login.php';
require 'helpers/connection.php';
?>
<?php include 'layout/head.php'?>


<?php $users = list_table('brunoro_usuario', 5, isset($_GET['page']) ? $_GET['page'] : 0) ?>
<?php $count = paginate('brunoro_usuario'); ?>

<div class="container py-3">
    <div class="row">
        <div class="col-md-12">
            <div class="row pb-4">
                <div class="col-lg-12">
                    <?=show_alerts()?>
                </div>
            </div>
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h3 class="mb-0">Listagem</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Mãe</th>
                            <th>Pai</th>
                            <th>País</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                            <th>Estado Cívil</th>
                            <th>Grau Instrução</th>
                            <th>Unidade</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <th><?=$user['id_usuario']?></th>
                                    <td><?=$user['usu_nome']?></td>
                                    <td><?=$user['usu_endereco']?></td>
                                    <td><?=$user['usu_nmae']?></td>
                                    <td><?=$user['usu_npai']?></td>
                                    <td><?=$user['usu_pais']?></td>
                                    <td><?=$user['usu_uf']?></td>
                                    <td><?=$user['usu_cidade']?></td>
                                    <td><?=$user['usu_ecivil']?></td>
                                    <td><?=$user['usu_ginstrucao']?></td>
                                    <td><?=$user['usu_id_unidade']?></td>
                                    <td>
                                        <a href="<?=link_to(sprintf('deletar_usuario.php?id=%s', $user['id_usuario']))?>" class="btn btn-danger btn-sm">
                                            Remover
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php for ($page = 1; $page <= $count; $page++) { ?>
                                <li class="page-item<?= (isset($_GET['page']) && $_GET['page'] == $page) || !isset($_GET['page']) && $page == 1 ? ' active' : '' ?>">
                                    <a class="page-link" href="?page=<?=$page?>"><?=$page?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/bottom.php'?>
