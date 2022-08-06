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
                                <h1 class="font-weight-bold mb-0">Salida de Visitante</h1>
                                <p class="lead text-muted">Aqui registras tu salida como visitante del edificio</p>
                            </div>
                        </div>
                    </div>
                </section>
                    <section class="bg-grey w-100">   
                        <div class="container">
                            <div class="col-lg-4 my-3">
                                <div class="card rounded-0">
                                        <div class="card-header bg-light">
                                            <h3 class="font-weight mb-0">Salida de la Visita</h1>
                                        </div>
                                                <form action="./insertarVisita.php" method="post">
                                                <select  name="lista1" class="form-control" >
                                                 <option value="0"> Seleccione Visitante </option>
                                                <?php
                                                include("./conex_bd.php");
                                                $sql = "SELECT VIS_NOMBRE, VIS_APELLIDOPATERNO, VIS_ID FROM EA_VISITANTE WHERE VIS_ESTADO='SI'";
                                                $resultado = mysqli_query($conex,$sql);
                                                while($valores = mysqli_fetch_array($resultado))
                                                {
                                                    echo '<option value="'.$valores['VIS_ID'].'">'.$valores['VIS_NOMBRE']." ".$valores ['VIS_APELLIDOPATERNO'].'</option>';
                                                }
                                                ?>
                                                </select>
                                                <br>
                                                <input type="submit" value="Registrar Salida"></input>
                                        <div class="card-body pt-2">                                  
                                        </div>
                                </div>
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