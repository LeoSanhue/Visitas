    <!-- head -->
    <?php include('../partes/head.php') ?>
    <!-- fin head -->


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
        <div id="content" class="bg-grey w-100">

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
                
              <section >
                  <div class="container center-v">
                      <div class="row center-h">
                          <div class="col-lg-4 my-3">
                            <div class="card rounded-0">
                                <div class="card-header bg-light " >
                                    <h6 class="form-register"> Registro Nuevo Visitante</h6>
                                </div>
                                <div class="card-body pt-2 allign-self-center">
                                <form action="insertardatos.php" method="POST">
                                <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre"/>
                                <input class="controls" type="text" name="apellidoP" id="apellidoP" placeholder="Ingrese su Apellido Paterno"/>
                                <input class="controls" type="text" name="apellidoM" id="apellidoM" placeholder="Ingrese su Apellido Materno"/>                                
                                <input class="controls" type="text" name="rut" id="rut" placeholder="Ingrese su RUT" maxlength="10"/>
                                <input class="controls" type="tel" name="telefono" id="telefono" placeholder="Ingrese su Telefono"/>
                                    <div class="d-flex border-bottom py-2">
                                        <input class="btn btn-primary w-100 align-self-center" type="submit" value="Ingresar Nuevo Visitante"/>    
                                    </div>
                                    </form>                          
                                </div>
                            </div>
                            </div>
                        </div>
                </section>
                <section>

                        <div class ="article center-h rounded-0 ">
                        <?php include("conex_bd.php")?>
                                <table class="table table-striped">
		                        <thead>
		                        <tr>
			                    <th>RUT</th>
			                    <th>NOMBRE</th>
			                    <th>APELLIDO PATERNO</th>
                                <th>APELLIDO MATERNO</th>
			                    <th>Telefono</th>
		                        </tr>
		                        </thead>
                                <?php
                                    foreach($conex->query('SELECT * FROM EA_VISITANTE') as $row){ ?>
                                        <tr>
                                        <td><?php echo $row['VIS_RUT']  ?></td>
                                        <td><?php echo $row['VIS_NOMBRE'] ?></td>
                                        <td><?php echo $row['VIS_APELLIDOPATERNO'] ?></td>
                                        <td><?php echo $row['VIS_APELLIDOMATERNO'] ?></td>
                                        <td><?php echo $row['VIS_TELEFONO'] ?></td>
                                     </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                        </div>

                        </body>
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
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, { 
                type: 'bar',
                data: {
                    labels: ['Feb 2020', 'Mar 2020', 'Abr 2020', 'May 2020'],
                    datasets: [{
                        label: 'Nuevos equipos',
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
