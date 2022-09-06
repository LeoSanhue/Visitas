    <!-- head -->
    <?php include('../partes/head.php') ?>
    <!-- fin head -->
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="table-sort.js"></script>
<body>
    <div class="d-flex" id="content-wrapper">
    <!-- sideBar -->
    <?php include('../partes/sidebar.php') ?>
    <!-- fin sideBar -->
        <div class="w-100">
    <!-- Navbar -->
            <?php include('../partes/nav.php') ?>
    <!-- Fin Navbar -->

        <!-- Page Content -->
            <div id="content" class="bg-light w-100">
                    <section class="bg-light py-3">
                        <div class="container">
                           <div class="row">
                                <div class="col-lg-9 col-md-8">
                                 <h1 class="font-weight-bold mb-0">Registro de visitas</h1>
                                    <p class="lead text-muted">Seleccione al Visitante y arrendatario por favor</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                    <div class="container center-v">
                          <div class="row center-h">
                              <div class="col-lg-7 my-9">
                                <div class="card rounded-0">
                                    <div class="card-header bg-light" >
                                        <h6 class="form-register"> Registro Nuevo Visitante</h6>
                                    </div>
                                    <div class="card-body pt-2 allign-self-center">
                                    <form action="./InsertarVisita.php" method="post">
                                    <br>
                                             <select id= "buscador"  name="lista1" class="form-control" >
                                             <option value="0"> Seleccione Visitante </option>
                                                <?php
                                                include("./conex_bd.php");
                                                $validacion1=0;
                                                $sql = "SELECT VIS_NOMBRE, VIS_APELLIDOPATERNO, VIS_ID from EA_VISITANTE WHERE VIS_ESTADO = 'NO'";
                                                $resultado = mysqli_query($conex,$sql);
                                                if($resultado){
                                                    foreach($conex->query("SELECT VIS_NOMBRE, VIS_APELLIDOPATERNO, VIS_ID FROM EA_VISITANTE WHERE VIS_ESTADO = 'NO'") as $valores)
                                                    {
                                                        echo '<option value="'.$valores['VIS_ID'].'">'.$valores['VIS_NOMBRE']." ".$valores ['VIS_APELLIDOPATERNO'].'</option>';
                                                    }
                                                }else{
                                                    $validacion1 = 1;
                                                    echo '<option value="0"> No hay Visitantes Disponibles </option>';
                                                    }
                                                ?>
                                                </select>
                                                <br>
                                                <select id="buscador" name="lista2" class="form-control" >
                                             <option value="0"> Seleccione Arrendatario </option>
                                                <?php
                                                include("./conex_bd.php");
                                                $validacion2=0;
                                                $sql = "SELECT ARR_NOMBRE, ARR_APELLIDOPATERNO, ARR_ID FROM EA_DUENO_ARRENDATARIO";
                                                $resultado = mysqli_query($conex,$sql);
                                                if($resultado){
                                                    foreach($conex->query("SELECT ARR_NOMBRE, ARR_APELLIDOPATERNO, ARR_ID from EA_DUENO_ARRENDATARIO") as $valores)
                                                    {
                                                        echo '<option value="'.$valores['ARR_ID'].'">'.$valores['ARR_NOMBRE']." ".$valores ['ARR_APELLIDOPATERNO'].'</option>';
                                                    }
                                                }else{
                                                    $validacion2 = 1;
                                                    echo '<option value="0"> No hay arrendatarios disponibles</option>';
                                                }
                                                ?>
                                                </select>
                                                
                                                <br>
                                                <?php
                                                    if($validacion1==0 && $validacion2==0)
                                                    {?>
                                                <input class = "btn btn-primary w-100 align-self-center" type="submit" value="Registrar Visita"></input>
                                                <?php
                                                    }
                                                ?>
                                                
                                        </form>                             
                                    </div>
                               </div>
                           </div>
                        </div>
                    </div>
                   
                    </section>
                <script>
                    $(document).ready(function () {
                        $('#entradafilter').keyup(function () {
                            var rex = new RegExp($(this).val(), 'i');
                                $('.contenidoLista tr').hide();
                                $('.contenidoLista tr').filter(function () {
                                    return rex.test($(this).text());
                                }).show();
                     })
                });
                </script>
                <br>
                <br>
                <style>
                    table,th,td{
                        border: 1px solid black;
                        border-collapse: collapse;
                    }

                    table thead tr{
                        background: #111B54;
                        color: white;

                    }
                </style>
                <script>
                        $('entradafilter').select2({
                        entradafilter:true
                        });
                </script>  
                <section>
                        <div class ="container center-h rounded-0"> 
                            <div class="input-group "> <span class="input-group-addon" ></span>
                                <input type ="text" id="entradafilter" class="form-control bg-light border-primary" placeholder= "Busca entre los visitantes fuera del edificio o presiona la columna para ordenar!" />
                            </div>
                            <div class="table-responsive">
                                <table border="1" class="table table-striped table-sort">
		                        <thead> 
		                        <tr>
			                    <th>RUT</th>
			                    <th>NOMBRE</th>
			                    <th>APELLIDO PATERNO</th>
                                <th>APELLIDO MATERNO</th>
		                        </tr>
		                        </thead>
                                <tbody class="contenidoLista">
                                <?php
                                  include("./conex_bd.php");
                                  if($conex==true){
                                        foreach($conex->query("SELECT VIS_RUT, VIS_NOMBRE, VIS_APELLIDOPATERNO, VIS_APELLIDOMATERNO FROM EA_VISITANTE WHERE VIS_ESTADO='NO'") as $row){ ?>
                                        <tr>
                                        <td><?php echo $row['VIS_RUT']  ?></td>
                                        <td><?php echo $row['VIS_NOMBRE'] ?></td>
                                        <td><?php echo $row['VIS_APELLIDOPATERNO'] ?></td>
                                        <td><?php echo $row['VIS_APELLIDOMATERNO'] ?></td>
                                     </tr>
                                    <?php
                                        }}
                                    ?>
                                </tbody>
                                </table>
                                </div>
                        </div>
                </section>    
                
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script scr= "js/jquery.min.js"></script>
        <script scr= "js/main.js"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, { 
                type: 'bar',
                data: {
                    labels: ['Feb 2020', 'Mar 2020', 'Abr 2020', 'May 2020'],
                    datasets: [{
                        label: 'Nuevos Visitantes',
                        data: [50, 100, 150, 200],
                        backgroundColor: [
                            '#12C9E5',  
                            '#12C9E5',
                            '#12C9E5',
                            '#111B54'
                        ],
                        maxBarThickness: 30,
                        maxBarLength: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>


</body>


</html>
