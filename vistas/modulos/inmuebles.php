<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar inmuebles

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar inmuebles</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarInmueble">

          Agregar inmueble

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablaInmuebles" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Imagen</th>
           <th>Categoría</th>
           <th>No. de matricula</th>
           <th>Propietario</th>
           <th>Dirección</th>
           <th>Ciudad</th>
           <th>Estado</th>
           <th>Valor Comercial</th>
           <th>Canon Arrendamiento</th>
           <th>Agregado</th>
           <th>Acciones</th>

         </tr>

        </thead>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR INMUEBLE
======================================-->

<div id="modalAgregarInmueble" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar inmueble</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA SELECCIONAR CATEGORIA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>

                  <option value="">Selecionar categoría</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                   ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA CODIGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-qrcode"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Codigo del Inmueble" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA MATRICULA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaMatricula" placeholder="Ingresar No. de matricula">

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR PROPIETARIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="nuevoCliente" required>

                  <option value="">Selecione el propietario</option>

                  <option value="1">Sonia Constanza Laverde</option>

                  <option value="2">Carlos Andres Diaz</option>

                  <option value="3">Jose Maria Cordoba</option>

                </select>

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

            <!-- ENTRADA PARA VALOR COMERCIAL -->

            <div class="form-group row" style="margin-bottom: 0">

              <div class="form-group col-md-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoValorComercial" name="nuevoValorComercial" placeholder="Valor comercial" valorComercial>
                </div>
              </div>

              <!-- ENTRADA PARA CANON DE ARRENDAMIENTO -->
              <div class="form-group col-md-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-money"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoValorArrendamiento" name="nuevoValorArrendamiento" placeholder="Canon Arrendamiento" valorArrendamiento>
                </div>
              </div>

            </div>

            <div class="form-group row">

              <!-- ENTRADA PARA ESTADO INMUEBLE -->
              <div class="form-group col-md-6">
                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-get-pocket"></i></span>
                  <select class="form-control input-lg" name="nuevoEstado" required>

                    <option value="">Selecione el Estado</option>
                    <option value="1">En venta</option>
                    <option value="2">Para arrendar</option>
                    <option value="3">Arrendado</option>
                    <option value="4">Vendido</option>

                  </select>

                </div>
              </div>

              <div class="form-group col-md-6">

                <!-- CHECKBOX PARA PORCENTAJE -->
                <div class="col-xs-6" style="padding-top: 10px">

                  <div class="form-group">
                    <label>
                      <input type="checkbox" class="minimal" checked>
                      Comisión
                    </label>
                  </div>
                </div>

                <!-- ENTRADA PARA PORCENTAJE -->

                <div class="col-xs-6" style="padding: 0">
                  <div class="input-group">
                    <input type="number" class="form-control input-lg" name="nuevoPorcentaje" min="0" value="10" required>
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                  </div>
                </div>

              </div>


            </div>



            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" id="nuevaImagen" name="nuevaImagen">

              <p class="help-block">Peso máximo de la foto 5MB</p>

              <img src="vistas/img/inmuebles/default/anonymous.png" class="img-thumbnail" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar inmueble</button>

        </div>

      </form>

      <?php

        $crearInmueble = new ControladorInmuebles();
        $crearInmueble -> ctrCrearInmueble();

       ?>

    </div>

  </div>

</div>
