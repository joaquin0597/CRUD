<?php
    /**Llamamos al archivo que recibe las variables enviadas en el formulario */
    require 'usuarios.php';
?>
<!-----------Código HTML de la tabla que muestra la información de los usuarios---------------->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <!----Llamada a Bootstrap para un diseño responsivo y una mejor interfaz ----->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>
   <h1 class="text-center">CRUD de Usuarios</h1>
   <div class="container">
        <div class="row">
        <form action="" method="post" enctype="multipart/form-data">
            
            

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Usuarios</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Nombre:</label><input type="text" class="form-control" name="nombre" required value="<?php echo $nombre; ?>" placeholder="Nombre(s)" id="nombre" require="">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Apellido paterno:</label><input type="text" class="form-control" name="apaterno" required value="<?php echo $apaterno; ?>" placeholder="Apellido paterno" id="apaterno" require="">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Apellido materno:</label><input type="text" class="form-control" name="amaterno" required value="<?php echo $amaterno; ?>" placeholder="Apellido materno" id="amaterno" require="">
                                    <br>
                                </div>
                                <label for="">CURP:</label><input type="text" class="form-control" name="curp" id="curp" maxlength="18" required value="<?php echo $curp; ?>" placeholder="CURP" id="curp" require=""><div id="feedbackCURP"></div>
                                <br>
                                <label for="">RFC:</label><input type="text" class="form-control" name="rfc"id="rfc" maxlength="13" required value="<?php echo $rfc; ?>" placeholder="RFC" id="rfc" require=""><div id="feedbackRFC"></div>
                                <br>
                                <label for="">Fecha de nacimiento:</label><input type="date" class="form-control" name="fe_nacimiento" required value="<?php echo $fe_nacimiento; ?>" placeholder="Fecha de nacimiento" id="fe_nacimiento" require="">
                                <br>
                                <label for="">E-mail:</label><input type="email" class="form-control" name="email" required value="<?php echo $email; ?>"  placeholder="Email" id="email" require="">
                                <br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" <?php echo $accionAgregar;?> value="btnAgregar" type="submit" name="accion">Agregar</button>
                            <button class="btn btn-warning" <?php echo $accionEditar;?> value="btnEditar" type="submit" name="accion">Editar</button>
                            <button class="btn btn-danger" <?php echo $accionEliminar;?> value="btnEliminar" onclick="return Confirmar('¿Estas segura de eliminar?')" type="submit" name="accion">Eliminar</button>
                            <button class="btn btn-primary" <?php echo $accionCancelar;?> value="btnCancelar" type="submit" name="accion">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar Usuario +
            </button>
            <button type="button" class="btn btn-primary" onclick="location.href='prueba_api.html'">
            Probar Api
            </button>
            <br>
            <br>


        </form>
        <!-----Tabla de Información de los datos de la BD----->
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>CURP</th>
                        <th>RFC</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Correo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <?php while($listado = mysqli_fetch_array($usuarios)){?>
                    <tr>
                        <td><?php echo $listado['Nombre'];?> <?php echo $listado['Paterno'];?> <?php echo $listado['Materno'];?></td>
                        <td><?php echo $listado['CURP'];?></td>
                        <td><?php echo $listado['RFC'];?></td>
                        <td><?php echo $listado['Fe_nacimiento'];?></td>
                        <td><?php echo $listado['Email'];?></td>
                        <td>
                        <form action="" method="post">
                            <input type="hidden" name="ID" value="<?php echo $listado['ID'];?>">
                            <input type="hidden" name="nombre" value="<?php echo $listado['Nombre'];?>">
                            <input type="hidden" name="apaterno" value="<?php echo $listado['Paterno'];?>">
                            <input type="hidden" name="amaterno" value="<?php echo $listado['Materno'];?>">
                            <input type="hidden" name="curp" id="curp" maxlength="18" value="<?php echo $listado['CURP'];?>">
                            <input type="hidden" name="rfc" id="rf" maxlength="13" value="<?php echo $listado['RFC'];?>">
                            <input type="hidden" name="fe_nacimiento" value="<?php echo $listado['Fe_nacimiento'];?>">
                            <input type="hidden" name="email" value="<?php echo $listado['Email'];?>">
                            <input type="submit" value="Info" class="btn btn-info" name="accion">
                            <button value="btnEliminar" onclick="return Confirmar('¿Estas segura de eliminar?')" type="submit" class="btn btn-danger" name="accion">Eliminar</button>
                        </form>    

                        </td>
                    </tr>
                <?}?>
            </table>
        </div>
        <!--- Funciones y validaciones en el script --->
        <?php if($mostrarModal){?>
            <script>
                $(document).ready(function(){
                    $('#exampleModal').modal('show');
                });


                
            </script>
        <?php }?>

        <script>
            function Confirmar(Mensaje){
                return (confirm(Mensaje))?true:false;
            }

            function validarCURP(curp) {
                const patron = /^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[0-9]{2}$/;
                if (!patron.test(curp)) {
                    return false; // No coincide con el patrón
                }
                const anio = parseInt(curp.substr(4, 2), 10);
                const mes = parseInt(curp.substr(6, 2), 10);
                const dia = parseInt(curp.substr(8, 2), 10);
                const fechaValida = new Date(anio + 1900, mes - 1, dia).getDate() === dia;
                if (!fechaValida) {
                    return false; // Fecha no válida
                }
                const estados = ['AS', 'BC', 'BS', 'CC', 'CM', 'DF', 'DG', 'GR', 'GT', 'HG',
                                'MC', 'MS', 'MX', 'NL', 'PL', 'QR', 'QT', 'SL', 'SP', 'SR',
                                'TC', 'TS', 'YN', 'ZS'];
                const estado = curp.substr(12, 2);
                console.log(estado);
                if (!estados.includes(estado)) {
                    return false; // Estado no válido
                }
                return true; // CURP válido
            }

            function validarRFC(rfc){
                // Expresión regular para validar la estructura del RFC
                const patron = /^[A-Z]{4}[0-9]{6}(?:[A-Z0-9]{3})?$/;
                // Verifica si el RFC coincide con el patrón
                if (!patron.test(rfc)) {
                    return false; // No coincide con el patrón
                }
                // Extraer las partes del RFC
                const nombre = rfc.substring(0, 4);  // Primera parte (4 letras)
                const fecha = rfc.substring(4, 10);  // Fecha (6 dígitos)
                const homoclave = rfc.substring(10);  // Homoclave (3 caracteres)
                // Validar fecha (YYMM)
                const anio = parseInt(fecha.substring(0, 2), 10);
                const mes = parseInt(fecha.substring(4, 6), 10);
                const dia = 1; // Usar un día ficticio para la validación
                // Convertir el año para la validación
                const anioCompleto = anio >= 20 ? 1900 + anio : 2000 + anio;
                // Comprobar si la fecha es válida
                /*if (!isValidDate(mes, dia, anioCompleto)) {
                    return false; // Fecha no válida
                }*/

                return true; // RFC válido
            }
            //validar CURP

            document.getElementById('curp').addEventListener('input', function() {
                this.value = this.value.toUpperCase();
                const curp = this.value.toUpperCase(); // Convertir a mayúsculas
                const feedback = document.getElementById('feedbackCURP');
                if (validarCURP(curp)) {
                    feedback.textContent = 'CURP válido.';
                    feedback.style.color = 'green';
                    feedback.className = 'valid';
                } else {
                    feedback.textContent = 'CURP inválido.';
                    feedback.style.color = 'red';
                    feedback.className = 'invalid';
                }
            });

            //Validar RFC
            document.getElementById('rfc').addEventListener('input', function(){
                this.value = this.value.toUpperCase();
                const rfc = this.value.toUpperCase();
                const feedback =document.getElementById('feedbackRFC');
                if(validarRFC(rfc)){
                    feedback.textContent = 'RFC válido.';
                    feedback.style.color = 'green';
                    feedback.className = 'valid';

                }else{
                    feedback.textContent = 'RFC inválido.';
                    feedback.style.color = 'red';
                    feedback.className = 'invalid';
                }

            });
        </script>
    </div>
   </div>
</body>
</html>