    <!-- head -->
    <?php include('../partes/head.php') ?>
    <!-- fin head -->
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

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
                    <section>
                    <div class="container center-v">
                          <div class="row center-h">
                              <div class="col-lg-4 my-3">
                                <div class="card rounded-0">
                                    <div class="card-header bg-light " >
                                        <h6 class="form-register"> Registro Nuevo Visitante</h6>
                                    </div>
                                    <div class="card-body pt-2 allign-self-center">
                                        <form action="insertardatos.php" method="POST">
                                        <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre" minlength="4" maxlenght="22" required pattern="[A-Za-z0-9]+"/>
                                        <input class="controls" type="text" name="apellidoP" id="apellidoP" placeholder="Ingrese su Apellido Paterno" minlength="4" maxlenght="22" required pattern="[A-Za-z0-9]+"/>
                                        <input class="controls" type="text" name="apellidoM" id="apellidoM" placeholder="Ingrese su Apellido Materno" minlength="4" maxlenght="22"  pattern="[A-Za-z0-9]+"/>                                
                                        <input class="controls" type="text" name="rut" id="rut" placeholder="Ingrese RUT sin puntos o guión" minlength="10" maxlength="10" required oninput="checkRut(this)"/>
                                        <input class="controls" type="tel" name="telefono" id="telefono" placeholder="Ingrese su Teléfono (ej.123456789)" minlength="9" maxlength="9" pattern="[0-9]{9}" required/>
                                        <div class="d-flex border-bottom py-2">
                                            <script src="validarRUT.js"></script>
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
                <section>
                        <div class ="article center-h rounded-0"> 
                            <div class="input-group"> <span class="input-group-addon"></span>
                                <input type ="text" id="entradafilter" class="form-control" placeholder= "Busca un Dato" />
                            </div>
                            <?php include("./conex_bd.php")?>
                                <table class="table table-striped">
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
                                  
                                     foreach($conex->query('SELECT * FROM EA_VISITANTE ORDER BY VIS_APELLIDOPATERNO ASC') as $row){ ?>
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
                                </tbody>
                                </table>
                        </div>
                </section>
            </div>
        </div>
    </div>

</body>


</html>
