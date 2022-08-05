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
                                <p class="lead text-muted">Revisa la última información</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="bg-mix py-3">
                <div class="container">
                   
                </div>
              </section>

 

              <section>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-4 my-3">
                            <div class="card rounded-0">
                                <div class="card-header bg-light">
                                    <h6 class="form-register"> Historial de Visitas</h6>
                                </div>
                                <div class="card-body pt-2">
                               <div> 
                               <tr>
                               <td>
                                <form method="post" enctype="multipart/form-data">
                                 <label> Seleccionar Arrendatario</label><br>
                                    <div class='col-sm-9'></div>
                                    <select id="buscador" name="lista1" class="form-control" >
                                    <option value="0">Seleccione</option>
                                    <?php
                                       include("./conex_bd.php");
                                       $sql =  "SELECT A.ARR_NOMBRE, A.ARR_APELLIDOPATERNO, A.ARR_APELLIDOMATERNO, A.ARR_ID from EA_DUENO_ARRENDATARIO A";
                                       $resultado = mysqli_query($conex,$sql);
                                        $A = 1;
                                        
                                       foreach($conex->query('SELECT A.ARR_NOMBRE, A.ARR_APELLIDOPATERNO, A.ARR_APELLIDOMATERNO, A.ARR_ID from EA_DUENO_ARRENDATARIO A') as $valores)
                                        {
                                            
                                            echo '<option value="'. $valores['ARR_ID'].'">'.$valores['ARR_NOMBRE']. " ". $valores['ARR_APELLIDOPATERNO']. " ". $valores['ARR_APELLIDOMATERNO'].'</option>';
                                        }

                                        
                                        if($valores['ARR_NOMBRE'] == null){ ?>
                                            <option value="0">No hay Arrendatarios disponibles</option>>
                                     <?php
                                      }
                                     ?>
         

                                    </select> <br> <br>

                                    <button class="btn btn-success btn-sm" type="submit" value="Submit" name="ver">Ver Historial</button>
                                </form>   
                                </td>
                                </tr>
                                
                                </div>
                                </div>                          
                            </div>
                            
                    </div>
                    
              </section>                               
      
              <script>
                  if($A==0){
                    $(document).ready(function () {
                        $('#entradafilter').keyup(function () {
                            var rex = new RegExp($(this).val(), 'i');
                                $('.contenido tr').hide();
                                $('.contenido tr').filter(function () {
                                    return rex.test($(this).text());
                                }).show();
 
                     })
                })};
                </script>  


              <section>
                        <div class ="article center-h rounded-0"> 
                        <?php include("./conex_bd.php");?>
                                <table border="1" class="table table-striped">  
		                        <thead>
		                        <tr>
			                    <th>RUT</th>
                                <th> APELLIDO</th>
                                <th> NOMBRE</th>
			                    <th>FECHA / HORA ENTRADA</th>
			                    <th>FECHA / HORA SALIDA</th>
		                        </tr>
		                        </thead>
                                <tbody class= "contenido">

                                <?php
                                    
                                    if(isset($_POST["ver"])){
                                        $arr=$_POST["lista1"];
                                        foreach($conex->query("SELECT V.VIS_RUT, date_format(R.RGT_HORAINGRESO, '%m-%d-%Y %H:%m:%s') AS INGRESO , V.VIS_APELLIDOPATERNO, V.VIS_NOMBRE, date_format(R.RGT_HORASALIDA, '%m-%d-%Y %H:%m:%s') AS SALIDA FROM EA_DUENO_ARRENDATARIO A, EA_REGISTRAR R, EA_VISITANTE V WHERE  A.ARR_ID = $arr AND V.VIS_ID=R.VIS_ID AND A.ARR_ID=R.ARR_ID;") as $row){ ?>
                                            <tr>
                                            <td><?php echo $row['VIS_RUT'] ?></td>
                                            <td><?php echo $row['VIS_APELLIDOPATERNO'] ?></td>
                                            <td><?php echo $row['VIS_NOMBRE'] ?></td>
                                            <td><?php echo $row['INGRESO'] ?></td>
                                            <td><?php echo $row['SALIDA'] ?></td>
                                         </tr>
                                        <?php
                                            } $A=0; ?>

                                          <!--   <div class="input-group"> <span class="input-group-addon"></span>
                                            <input type ="text" id="entradafilter" class="form-control"placeholder= "Buscar" />
                                        </div> -->

                                   <?php }

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

<script>
    $('buscador').select2({
        buscador:true
    });
</script>  

  
