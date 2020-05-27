<?php
require 'middleware/middleware_login.php';
require 'helpers/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST["name"];
    $address = $_POST["address"];
    $mother_name = $_POST["mother_name"];
    $daddy_name = $_POST["daddy_name"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $civil_state = $_POST['civil_state'];
    $instruction = $_POST['instruction'];

    $status = create_user($name, $address, $mother_name, $daddy_name, $country, $state, $civil_state, $instruction);
    if ($status) {
        flash_success('Cadastro efetuado com sucesso');
    } else {
        flash_error('Não foi possível efetuar o cadastro, tente novamente');
    }
}

?>

<?php include 'layout/head.php'?>

<form method="POST" action="<?=link_to('cadastro_usuario.php')?>">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Cadastro</h3>
                    </div>
                    <div class="card-body">
                        <div class="row pb-4">
                            <div class="col-lg-12">
                                <?=show_alerts()?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-5 pb-3">
                                <label for="nome">Nome completo</label>
                                <input class="form-control" id="nome" type="text" name="name" />
                            </div>

                            <div class="col-sm-5 pb-3">
                                <label for="endereco">Endereço</label>
                                <input class="form-control" id="endereco" type="text" name="address" />
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="nmae">Mãe</label>
                                <input class="form-control" id="nmae" type="text" name="mother_name" />
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="npai">Pai</label>
                                <input class="form-control" id="npai" type="text" name="daddy_name" />
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="pais">País</label>
                                <input class="form-control" id="pais" type="text" name="country" />
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="cidade">Cidade</label>
                                <input class="form-control" id="cidade" type="text" name="city" />
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="uf">Estado</label>
                                <select class="form-control custom-select" id="uf" name="state">
                                    <option class="text-white bg-warning">
                                        Selecione o Estado
                                    </option>
                                    <option value="AL">
                                        Alabama
                                    </option>
                                    <option value="AK">
                                        Alaska
                                    </option>
                                    <option value="AZ">
                                        Arizona
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="ecivil">Estado Civil</label>
                                <input class="form-control" id="ecivil" type="text" name="civil_state" />
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="ginstrucao">Escolaridade</label>
                                <input class="form-control" id="ginstrucao" type="text" name="instruction" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">
                                Cadastrar usuário
                            </button>
                        </div>
                    </div>
                </div><!--/card-->
            </div>
        </div><!--/row-->
    </div><!--/col-->
</form>

<!-- Scroll to Top -->


<?php include 'layout/bottom.php'?>
