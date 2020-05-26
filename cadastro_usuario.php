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
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <link href="css/estilo.css" rel="stylesheet">
    <title>Cadastro Geral</title>
    <meta charset="utf-8">
</head>
<body>
<form method="POST" action="cadastro_usuario.php">
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
                                <label for="exampleFirst">Nome completo</label>
                                <input class="form-control" id="nome" type="text" name="name" />
                            </div>

                            <div class="col-sm-5 pb-3">
                                <label for="exampleLast">Endereço</label>
                                <input class="form-control" id="endereco" type="text" name="address" />
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="exampleLast">Mãe</label>
                                <input class="form-control" id="nmae" type="text" name="mother_name" />
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="exampleLast">Pai</label>
                                <input class="form-control" id="npai" type="text" name="daddy_name" />
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="exampleLast">País</label>
                                <input class="form-control" id="pais" type="text" name="country" />
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="exampleCity">Cidade</label>
                                <input class="form-control" id="cidade" type="text" name="city" />
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="exampleSt">Estado</label>
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
                                    <option value="AR">
                                        Arkansas
                                    </option>
                                    <option value="CA">
                                        California
                                    </option>
                                    <option value="CO">
                                        Colorado
                                    </option>
                                    <option value="CT">
                                        Connecticut
                                    </option>
                                    <option value="DE">
                                        Delaware
                                    </option>
                                    <option value="DC">
                                        District Of Columbia
                                    </option>
                                    <option value="FL">
                                        Florida
                                    </option>
                                    <option value="GA">
                                        Georgia
                                    </option>
                                    <option value="HI">
                                        Hawaii
                                    </option>
                                    <option value="ID">
                                        Idaho
                                    </option>
                                    <option value="IL">
                                        Illinois
                                    </option>
                                    <option value="IN">
                                        Indiana
                                    </option>
                                    <option value="IA">
                                        Iowa
                                    </option>
                                    <option value="KS">
                                        Kansas
                                    </option>
                                    <option value="KY">
                                        Kentucky
                                    </option>
                                    <option value="LA">
                                        Louisiana
                                    </option>
                                    <option value="ME">
                                        Maine
                                    </option>
                                    <option value="MD">
                                        Maryland
                                    </option>
                                    <option value="MA">
                                        Massachusetts
                                    </option>
                                    <option value="MI">
                                        Michigan
                                    </option>
                                    <option value="MN">
                                        Minnesota
                                    </option>
                                    <option value="MS">
                                        Mississippi
                                    </option>
                                    <option value="MO">
                                        Missouri
                                    </option>
                                    <option value="MT">
                                        Montana
                                    </option>
                                    <option value="NE">
                                        Nebraska
                                    </option>
                                    <option value="NV">
                                        Nevada
                                    </option>
                                    <option value="NH">
                                        New Hampshire
                                    </option>
                                    <option value="NJ">
                                        New Jersey
                                    </option>
                                    <option value="NM">
                                        New Mexico
                                    </option>
                                    <option value="NY">
                                        New York
                                    </option>
                                    <option value="NC">
                                        North Carolina
                                    </option>
                                    <option value="ND">
                                        North Dakota
                                    </option>
                                    <option value="OH">
                                        Ohio
                                    </option>
                                    <option value="OK">
                                        Oklahoma
                                    </option>
                                    <option value="OR">
                                        Oregon
                                    </option>
                                    <option value="PA">
                                        Pennsylvania
                                    </option>
                                    <option value="RI">
                                        Rhode Island
                                    </option>
                                    <option value="SC">
                                        South Carolina
                                    </option>
                                    <option value="SD">
                                        South Dakota
                                    </option>
                                    <option value="TN">
                                        Tennessee
                                    </option>
                                    <option value="TX">
                                        Texas
                                    </option>
                                    <option value="UT">
                                        Utah
                                    </option>
                                    <option value="VT">
                                        Vermont
                                    </option>
                                    <option value="VA">
                                        Virginia
                                    </option>
                                    <option value="WA">
                                        Washington
                                    </option>
                                    <option value="WV">
                                        West Virginia
                                    </option>
                                    <option value="WI">
                                        Wisconsin
                                    </option>
                                    <option value="WY">
                                        Wyoming
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="exampleZip">Estado Civil</label>
                                <input class="form-control" id="ecivil" type="text" name="civil_state" />
                            </div>
                            <div class="col-sm-5 pb-3">
                                <label for="exampleCity">Escolaridade</label>
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
    </div><!--/row-->
    </div><!--/container-->
    </form>

<!-- Scroll to Top -->

</body>
</html>
