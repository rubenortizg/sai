
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Crear comprobante
    </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
      <li class="active">Crear comprobante</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">

      <!--=====================================
      FORMULARIO COMPROBANTE
      ======================================-->

      <div class="col-lg-3 col-xs-12">

        <div class="box box-success">

          <div class="box-header with-border">
            <h4>Comprobante</h4>
          </div>

          <form role="form" method="post">

            <div class="box-body">

              <div class="box">

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="nuevoUsuario" name="nuevoUsuario" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">
                  </div>
                </div>

                <!--=====================================
                NUMERO DE COMPROBANTE
                ======================================-->

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-qrcode"></i></span>

                    <?php

                      $configuracion = ControladorAdmin::ctrAdmin();


                      $item = null;
                      $valor = null;

                      $comprobantes = ControladorComprobantes::ctrMostrarComprobantes($item, $valor);

                      if (!$comprobantes) {
                        echo '<input type="text" class="form-control" id="nuevoComprobante" name="nuevoComprobante" value="C-'.$configuracion["comprobanteInicio"].'" readonly>';
                      } else {
                        foreach ($comprobantes as $key => $value) {
                          // code...
                        }

                        $codigo = $value["codigo"] + 1;

                        echo '<input type="text" class="form-control" id="nuevoComprobante" name="nuevoComprobante" value="C-'.$codigo.'" readonly>
                              <input type="hidden" name="nuevoCodigo" value="'.$codigo.'">';
                      }
                    ?>

                  </div>
                </div>

                <!--=====================================
                CIUDAD Y FECHA
                ======================================-->

                <div class="form-group row">

                  <div class="col-xs-6" style="padding-right:0px">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                      <input type="text" class="form-control" id="nuevaCiudad" name="nuevaCiudad" value="<?php echo $configuracion["ciudad"]; ?>" readonly>
                    </div>

                  </div>


                  <div class="col-xs-6">

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker">
                    </div>

                  </div>


                </div>

                <!--=====================================
                CLIENTE SELECCIONAR / AGREGAR
                ======================================-->

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>
                      <option value="">Seleccionar cliente</option>

                      <?php

                        $item = null;
                        $valor = null;

                        $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

                        foreach ($clientes as $key => $value) {

                          echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                        }


                      ?>


                    </select>

                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button></span>
                  </div>
                </div>

                <!--=====================================
                INMUEBLE SELECCIONAR / AGREGAR
                ======================================-->

                <label>Inmueble:</label>

                <div class="nuevoInmueble">

                  <!-- nuevoInmueble -->

                </div>

                <!--=====================================
                BOTON PARA AGREGAR INMUEBLE - MOVILES
                ======================================-->

                <button type="button" class="btn btn-default hidden-lg">Agregar Inmueble</button>

                <hr>

                <!--=====================================
                CONCEPTO SELECCIONAR / AGREGAR
                ======================================-->

                <label>Conceptos del comprobante:</label>

                <div class="nuevoConcepto">

                  <!-- nuevoConcepto -->

                </div>

                <!--=====================================
                BOTON PARA AGREGAR INMUEBLE - MOVILES
                ======================================-->

                <button type="button" class="btn btn-default hidden-lg">Agregar Concepto</button>

                <hr>


                <!--=====================================
                TOTAL COMPROBANTE
                ======================================-->

                <div class="row">

                  <div class="col-xs-6 pull-right">

                    <table class="table">

                      <thead>
                        <tr>
                          <th>Total Comprobante</th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          <td>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                              <input type="number" min="1" class="form-control" id="nuevoTotalComprobante" name="nuevoTotalComprobante" placeholder="0" readonly required>
                            </div>
                          </td>
                        </tr>
                      </tbody>

                    </table>

                  </div>

                </div>

              </div>

            </div>

          <div class="box-footer">

            <button type="submit" class="btn btn-primary pull-right">Generar comprobante</button>

          </div>

          </form>

        </div>

      </div>

      <!--=====================================
      TABLA DE INMUEBLES
      ======================================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

        <div class="box box-primary">

          <div class="box-header with-border">

            <h4>Inmuebles</h4>
          </div>

          <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablaComprobantes" width="100%">

              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Imagen</th>
                  <th>Codigo</th>
                  <th>Categoría</th>
                  <th>Propietario</th>
                  <th>Dirección</th>
                  <th>Ciudad</th>
                  <th>Estado</th>
                  <th>Canon Arrendamiento</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <!--=====================================
              CARGUE DINAMICO CON DATATABLES
              ======================================-->
            </table>

          </div>


        </div>

      </div>

      <!--=====================================
      TABLA DE CONCEPTOS
      ======================================-->

      <div class="col-lg-2 hidden-md hidden-sm hidden-xs">

        <div class="box box-warning">

          <div class="box-header with-border">

            <h4>Conceptos</h4>
          </div>

          <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablaConceptos" width="100%">

              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Concepto</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>

                <?php

                  $item = null;
                  $valor = null;

                  $conceptos = ControladorConceptos::ctrMostrarConceptos($item, $valor);

                  foreach ($conceptos as $key => $value) {

                  echo '<tr>
                          <td>'.($key+1).'</td>
                          <td class="text-uppercase">'.$value["concepto"].'</td>
                            <td>
                              <div class="btn-group">
                                <button class="btn btn-primary btn-sm agregarConcepto" idConcepto="'.$value["id"].'">Agregar</button>
                              </div>
                            </td>
                          </tr>';

                  }

                ?>

              </tbody>

            </table>

          </div>


        </div>

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
