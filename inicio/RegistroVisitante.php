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
                                 <h1 class="font-weight-bold mb-0">Visitas</h1>
                                    <p class="lead text-muted">Registrate para poder ingresar al condominio</p>
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
                                        <form action="insertardatos.php" method="POST">
                                        <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre" minlength="4" maxlenght="22"  pattern="[a-zA-Z]+*" />
                                        <input class="controls" type="text" name="apellidoP" id="apellidoP" placeholder="Ingrese su Apellido Paterno" minlength="4" maxlenght="22"  pattern="[a-zA-Z]+*" />
                                        <input class="controls" type="text" name="apellidoM" id="apellidoM" placeholder="Ingrese su Apellido Materno" minlength="4" maxlenght="22"  pattern="[a-zA-Z]+*" />                                
                                        <input class="controls" type="text" name="rut" id="rut" placeholder="Ingrese RUT sin puntos o guión" minlength="10" maxlength="10" required oninput="checkRut(this)"/>
                                        <input class="controls" type="tel" name="telefono" id="telefono" placeholder="Ingrese su Teléfono (ej.123456789)" minlength="9" maxlength="9" pattern="[0-9]{9}"/>
                                        <div class="d-flex border-bottom py-2">
                                            <script src="validarRUT.js"></script>
                                            <script src="textfield.js"></script>
                                            <input class="btn btn-primary w-100 align-self-center" type="submit" value="Ingresar Nuevo Visitante"/>    
                                        </div>
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
                <section>
                        <div class ="container center-h rounded-0"> 
                            <div class="input-group "> <span class="input-group-addon" ></span>
                                <input type ="text" id="entradafilter" class="form-control bg-light border-primary" placeholder= "Busca entre los visitantes registrados o presiona en la columna para ordenar!" />
                            </div>
                                <table border="1" class="table table-striped table-sort"> 
		                        <thead>
		                        <tr>
			                    <th>RUT</th>
			                    <th>NOMBRE</th>
			                    <th>APELLIDO PATERNO</th>
                                <th>APELLIDO MATERNO</th>
			                    <th>TELÉFONO</th>
		                        </tr>
		                        </thead>
                                <tbody class="contenidoLista">
                                <?php
                                  include("./conex_bd.php");
                                  if($conex==true){
                                     foreach($conex->query('SELECT * FROM EA_VISITANTE ORDER BY VIS_APELLIDOPATERNO ASC') as $row){ ?>
                                        <tr>
                                        <td><?php echo $row['VIS_RUT']  ?></td>
                                        <td><?php echo $row['VIS_NOMBRE'] ?></td>
                                        <td><?php echo $row['VIS_APELLIDOPATERNO'] ?></td>
                                        <td><?php echo $row['VIS_APELLIDOMATERNO'] ?></td>
                                        <td><?php echo $row['VIS_TELEFONO'] ?></td>
                                     </tr>
                                    <?php
                                        }}
                                    ?>
                                </tbody>
                                </table>
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
