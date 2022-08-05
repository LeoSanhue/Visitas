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
                        <h1 class="font-weight-bold mb-0"> Ingreso de la visita</h1>
                        <p class="lead text-muted">Seleccione Visitante y arrendatario por favor</p>
                     </div>
                </div>
             </div>

         </section>
         <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 my-3">
                            <div class="card rounded-0">
                                <div class="card-header bg-light">
                                    <h6 class="form-register"> Registro de la visita</h6>
                                </div>
                               
                                <div class="card-body">
                                        <tr>
                                        <td>
                                        <form action="./insertarVisita.php" method="post">
                                             <select  name="lista1" class="form-control" >
                                             <option value="0"> Seleccione Visitante </option>
                                                <?php
                                                include("./conex_bd.php");
                                                $sql = "SELECT VIS_NOMBRE, VIS_APELLIDOPATERNO, VIS_ID from EA_VISITANTE";
                                                $resultado = mysqli_query($conex,$sql);
                                                while($valores = mysqli_fetch_array($resultado))
                                                {
                                                    echo '<option value="'.$valores['VIS_ID'].'">'.$valores['VIS_NOMBRE']." ".$valores ['VIS_APELLIDOPATERNO'].'</option>';
                                                }
                                                ?>
                                                </select>
                                                <br>
                                                <select  name="lista2" class="form-control" >
                                             <option value="0"> Seleccione Arrendatario </option>
                                                <?php
                                                include("./conex_bd.php");
                                                $sql = "SELECT ARR_NOMBRE, ARR_APELLIDOPATERNO, ARR_ID from EA_DUENO_ARRENDATARIO";
                                                $resultado = mysqli_query($conex,$sql);
                                                while($valores = mysqli_fetch_array($resultado))
                                                {
                                                    echo '<option value="'.$valores['ARR_ID'].'">'.$valores['ARR_NOMBRE']." ".$valores ['ARR_APELLIDOPATERNO'].'</option>';
                                                }
                                                ?>
                                                </select>
                                                <br>
                                                <input type="submit" value="Registrar Visita"></input>
                                        </form>
                                        
                                        </td>
                                        </tr>
                                </div>
                           </div>
                        </div>                  
                    </div>                             
                </div>                                    
    </div>                                        
    </section>     
    </body>
    </html> 
