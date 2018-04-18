<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Clientes

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Clientes</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">

          Agregar cliente

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas"  width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Tipo de Documento</th>
           <th>No. Documento</th>
           <th>Nombre</th>
           <th>Dirección</th>
           <th>Ciudad</th>
           <th>Tel. Fijo</th>
           <th>Celular</th>
           <th>Correo Electrónico</th>
           <th>Banco</th>
           <th>Tipo de Cuenta</th>
           <th>No. de Cuenta</th>
           <th>Acciones</th>
         </tr>
        </thead>

        <tbody>

          <?php

            $item = null;
            $valor = null;

            $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

            foreach ($clientes as $key => $value) {

              echo '<tr>
                      <td>'.($key+1).'</td>
                      <td>'.$value["tipoid"].'</td>
                      <td>'.$value["identificacion"].'</td>
                      <td>'.$value["nombre"].'</td>
                      <td>'.$value["direccion"].'</td>
                      <td>'.$value["ciudad"].'</td>
                      <td>'.$value["telfijo"].'</td>
                      <td>'.$value["celular"].'</td>
                      <td>'.$value["correo"].'</td>
                      <td>'.$value["banco"].'</td>
                      <td>'.$value["tcuenta"].'</td>
                      <td>'.$value["ncuenta"].'</td>
                      <td>

                        <div class="btn-group">

                          <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                          <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>

                        </div>

                      </td>

                    </tr>';

            }
          ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA TIPO DE DOCUMENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>

                <select class="form-control input-lg" name="nuevoTipoDocumento" required>

                  <option value="">Tipo de documento</option>

                  <option value="Cedula de Ciudadania">Cedula de Ciudadania</option>

                  <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>

                  <option value="NIT">NIT</option>

                  <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>

                  <option value="Registro Civil">Registro Civil</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA NUMERO DE IDENTIFICACIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumento" placeholder="Ingresar No. Documento" required>

              </div>

            </div>

            <!-- ENTRADA PARA NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>

            <!-- ENTRADA PARA CIUDAD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-globe"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaCiudad" placeholder="Ingresar ciudad" required>

              </div>

            </div>

            <!-- ENTRADA PARA TELEFONO FIJO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Telefono Fijo (Indicativo)" data-inputmask="'mask':'(9) 999-9999'" data-mask>

              </div>

            </div>

            <!-- ENTRADA PARA TELEFONO CELULAR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCelular" placeholder="Ingresar Celular" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar Correo" required>

              </div>

            </div>


            <!-- ENTRADA PARA BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-bank"></i></span>

                <select class="form-control input-lg" name="nuevoBanco">

                  <option value="">Seleccionar Banco</option>

                  <option value="Bancolombia">Bancolombia</option>

                  <option value="Davivienda">Davivienda</option>

                  <option value="Av Villas">Av Villas</option>

                  <option value="Banco Popular">Banco Popular</option>

                  <option value="Banco de Bogotá">Banco de Bogotá</option>

                  <option value="BBVA">BBVA</option>

                  <option value="Banco de Occidente">Banco de Occidente</option>

                  <option value="Banco Agrario">Banco Agrario</option>

                  <option value="Helm Bank">Helm Bank</option>

                  <option value="Banco Caja Social">Banco Caja Social</option>

                  <option value="Banco Sudameris">Banco Sudameris</option>

                  <option value="Banco Falabella">Banco Falabella</option>

                  <option value="Banco Corpbanca">Banco Corpbanca</option>

                  <option value="Colpatria">Colpatria</option>

                  <option value="Citibank">Citibank</option>

                  <option value="Banco Pichincha">Banco Pichincha</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA TIPO DE CUENTA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-tag"></i></span>

                <select class="form-control input-lg" name="nuevoTipoCuenta">

                  <option value="">Tipo de Cuenta</option>

                  <option value="Cuenta de Ahorros">Cuenta de Ahorros</option>

                  <option value="Cuenta Corriente">Cuenta Corriente</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA NUMERO DE CUENTA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-info"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaCuenta" placeholder="Ingresar No. de Cuenta" required>

              </div>

            </div>


          </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();


      ?>

    </div>

  </div>

</div>



<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA TIPO DE DOCUMENTO -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>

                <select class="form-control input-lg" name="editarTipoDocumento" required>

                  <option value="" id="editarTipoDocumento"></option>
                  <option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
                  <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                  <option value="NIT">NIT</option>
                  <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                  <option value="Registro Civil">Registro Civil</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA NUMERO DE IDENTIFICACIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="number" min="0" class="form-control input-lg" name="editarDocumento" id="editarDocumento" required>
                <input type="hidden" name="idCliente" id="idCliente">

              </div>

            </div>

            <!-- ENTRADA PARA NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>

              </div>

            </div>

            <!-- ENTRADA PARA CIUDAD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-globe"></i></span>

                <input type="text" class="form-control input-lg" name="editarCiudad" id="editarCiudad" required>

              </div>

            </div>

            <!-- ENTRADA PARA TELEFONO FIJO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(9) 999-9999'" data-mask>

              </div>

            </div>

            <!-- ENTRADA PARA TELEFONO CELULAR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>

                <input type="text" class="form-control input-lg" name="editarCelular" id="editarCelular" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>

              </div>

            </div>


            <!-- ENTRADA PARA BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-bank"></i></span>

                <select class="form-control input-lg" name="editarBanco">

                  <option value="" id="editarBanco"></option>
                  <option value="Bancolombia">Bancolombia</option>
                  <option value="Davivienda">Davivienda</option>
                  <option value="Av Villas">Av Villas</option>
                  <option value="Banco Popular">Banco Popular</option>
                  <option value="Banco de Bogotá">Banco de Bogotá</option>
                  <option value="BBVA">BBVA</option>
                  <option value="Banco de Occidente">Banco de Occidente</option>
                  <option value="Banco Agrario">Banco Agrario</option>
                  <option value="Helm Bank">Helm Bank</option>
                  <option value="Banco Caja Social">Banco Caja Social</option>
                  <option value="Banco Sudameris">Banco Sudameris</option>
                  <option value="Banco Falabella">Banco Falabella</option>
                  <option value="Banco Corpbanca">Banco Corpbanca</option>
                  <option value="Colpatria">Colpatria</option>
                  <option value="Citibank">Citibank</option>
                  <option value="Banco Pichincha">Banco Pichincha</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA TIPO DE CUENTA -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                <select class="form-control input-lg" name="editarTipoCuenta">

                  <option value="" id="editarTipoCuenta"></option>
                  <option value="Cuenta de Ahorros">Cuenta de Ahorros</option>
                  <option value="Cuenta Corriente">Cuenta Corriente</option>

                </select>
              </div>
            </div>


            <!-- ENTRADA PARA NUMERO DE CUENTA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-info"></i></span>

                <input type="text" class="form-control input-lg" name="editarCuenta" id="editarCuenta" required>

              </div>

            </div>


          </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar cliente</button>

        </div>

      </form>

      <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>

    </div>

  </div>

</div>

<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>
