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

                <select class="form-control input-lg" name="nuevaCategoria">

                  <option value="">Selecionar categoría</option>

                  <option value="Administrador">Apartamento</option>

                  <option value="Especial">Casa</option>

                  <option value="Vendedor">Local</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA MATRICULA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaMatricula" placeholder="Ingresar No. de matricula">

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

            <!-- ENTRADA PARA SELECCIONAR PROPIETARIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="nuevoCliente">

                  <option value="">Selecione el propietario</option>

                  <option value="Administrador">Sonia Constanza Laverde</option>

                  <option value="Especial">Carlos Andres Diaz</option>

                  <option value="Vendedor">Jose Maria Cordoba</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA VALOR COMERCIAL -->

            <div class="form-group row">

              <div class="col-xs-6">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-dollar"></i></span>

                  <input type="number" class="form-control input-lg" name="nuevoValorComercial" min="0" placeholder="Valor comercial" required>

                </div>

              </div>


              <!-- ENTRADA PARA CANON DE ARRENDAMIENTO -->
              <div class="col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-money"></i></span>
                  <input type="number" class="form-control input-lg" name="nuevoValorComercial" min="0" placeholder="Canon Arrendamiento" required>
                </div>

                <br>

                <!-- CHECKBOX PARA PORCENTAJE -->

                <div class="col-xs-6">

                  <div class="form-group">
                    <label>
                      <input type="checkbox" class="minimal porcentaje" checked>
                      Comisión
                    </label>
                  </div>
                </div>

                <!-- ENTRADA PARA PORCENTAJE -->

                <div class="col-xs-6" style="padding: 0">
                  <div class="input-group">
                    <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="10" required>
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

    </div>

  </div>

</div>
