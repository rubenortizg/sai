<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Conceptos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Conceptos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarConcepto">

          Agregar concepto

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas">

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
                          <button class="btn btn-warning btn-sm btnEditarConcepto" idConcepto="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarConcepto"><i class="fa fa-pencil"></i></button>

                          <button class="btn btn-danger btn-sm btnEliminarConcepto"  idConcepto="'.$value["id"].'"><i class="fa fa-times"></i></button>
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
MODAL AGREGAR CONCEPTO
======================================-->

<div id="modalAgregarConcepto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar concepto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CONCEPTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoConcepto" placeholder="Ingresar concepto" id="nuevoConcepto" required>

              </div>

            </div>

          </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar concepto</button>

        </div>

        <?php

          $crearConcepto = new ControladorConceptos();
          $crearConcepto -> ctrCrearConcepto();
         ?>

      </form>

    </div>

  </div>

</div>



<!--=====================================
MODAL EDITAR CONCEPTO
======================================-->

<div id="modalEditarConcepto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar concepto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CONCEPTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarConcepto" id="editarConcepto" required>
                <input type="hidden" name="idConcepto" id="idConcepto" required>

              </div>

            </div>

          </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar concepto</button>

        </div>

        <?php

          $editarConcepto = new ControladorConceptos();
          $editarConcepto -> ctrEditarConcepto();
         ?>

      </form>

    </div>

  </div>

</div>

<?php

  $borrarConcepto = new ControladorConceptos();
  $borrarConcepto -> ctrBorrarConcepto();

 ?>
