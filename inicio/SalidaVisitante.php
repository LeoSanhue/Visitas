     <!-- head -->
     <?php include('../partes/head.php') ?>
    <!-- fin head -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src=table-sort.js></script>
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
                <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                                <li class="breadcrumb-item">Visitas</li>
                                <li class="breadcrumb-item active" aria-current="page">Salida de Visitante</li>
                        </ol>
                </nav>   

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


                    <section class="bg-light w-100">   
                        <div class="container">
                        <div class="row center-h">
                            <div class="col-lg-4 my-3">
                                <div class="card rounded-0">
                                        <div class="card-header bg-light">
                                            <h3 class="font-weight mb-0">Salida de la Visita</h1>
                                        </div>
                                               
                                        <div class="card-body pt-2" >     
                                        <td>
                                        <form method="post" enctype="multipart/form-data">
                                                <label> Seleccionar Visitante</label><br>
                                                <div class='col-sm-9'></div>
                                                <select id="buscador"  name="lista1" class="form-control" >
                                                 <option value="0"> Seleccione </option>
                                                <?php
                                                include("./conex_bd.php");
                                                $sql = "SELECT VIS_NOMBRE, VIS_APELLIDOPATERNO, VIS_ID FROM EA_VISITANTE WHERE VIS_ESTADO='SI'";
                                                $resultado = mysqli_query($conex,$sql);
                                                $a=0;
                                                foreach($conex->query('SELECT VIS_NOMBRE, VIS_APELLIDOPATERNO, VIS_ID FROM EA_VISITANTE WHERE VIS_ESTADO="SI" ')as $valores) 
                                                {
                                                    echo '<option value="'.$valores['VIS_ID'].'">'.$valores['VIS_NOMBRE']." ".$valores ['VIS_APELLIDOPATERNO'].'</option>';
                                                }
                                                    if($valores['VIS_NOMBRE'] == null){ 
                                                        $a=1?>
                                                        <option value="0">No hay Visitantes disponibles</option>>
                                                 <?php
                                                 }
                                                 ?>                                            
                                                
                                                </select>
                                                <br>

                                                <?php
                                                    if($a==0)
                                                    {?>
                                                        <input class="btn btn-primary w-100 align-self-center" type="submit" name="RegistrarSalida"></input>
                                                        <?php include("EliminarVisita.php");?>
                                                     <?php
                                                    }
                                                    ?>  

                                         </form>   
                                         </td>                          
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


                <style>
                    table,th,td{
                        border: 1px solid #111B54;
                        border-collapse: collapse;
                    }

                    table thead tr{
                        background:  #111B54;
                        color: white;

                    }
                </style>


                    <section>
                        <div class ="container center-h rounded-0"> 
                            <div class="input-group"> <span class="input-group-addon"></span>
                                <input type ="text" id="entradafilter" class="form-control bg-light border primary" placeholder= "Busca un Dato" />
                            </div>
                            <?php include("./conex_bd.php")?>
                                <table class="table table-striped table-sort">
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
                                  if($conex){
                                     foreach($conex->query("SELECT VIS_RUT, VIS_NOMBRE, VIS_APELLIDOPATERNO, VIS_APELLIDOMATERNO FROM EA_VISITANTE WHERE VIS_ESTADO='SI'") as $row){ ?>
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

<script>
    $('entradafilter').select2({
        entradafilter:true
    });
</script>  
