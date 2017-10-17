<div class="modal fade" id="modalNewBill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Cuenta nueva?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">   
  
        <form role="form" action="" method="post">
          <div class="row setup-content" id="step-1">
            <div class="col-lg-12 col-md-offset-3">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="formGroupExampleInput">Nombre</label>
                  <input type="text" required="required" class="form-control" name="name" placeholder="Te servira para identificar tu cuenta">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Descripción</label>
                  <textarea class="form-control" id="description">Ingresa detalles de tu compra</textarea>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Fecha</label>
                  <input type="date" required="required" class="form-control" name="name" placeholder="DD/MM/AAAA">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Monto Total</label>
                  <input type="number" required="required" class="form-control" name="name" placeholder="Ingresa el total de tu compra">
                </div>
                <button class="btn btn-primary nextBtn pull-right">Siguiente</button>
              </div>
            </div>
          </div>
          <div class="row setup-content" id="step-2">
            <div class="col-lg-12 col-md-offset-3">
              <div class="col-md-12">
                <div class="form-inline">
                  <div class="form-group multiStep">
                    <input type="text" class="form-control" placeholder="Your Task" name="task">
                    <button type="button" class="btn btn btn-primary">Add</button>
                  </div>
                </div>
                <hr>
                <div class="form-inline">
                  <div class="form-group" id="todo">
                  </div>
                </div>
                <button type="button" class="btn btn-secondary prevBtn pull-left">Atrás</button>
                <button class="btn btn-primary nextBtn pull-right">Siguiente</button>
              </div>
            </div>
          </div>
          <div class="row setup-content" id="step-3">
            <div class="col-xs-6 col-md-offset-3">
              <div class="col-md-12">
                <h3> Step 3</h3>
                <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
              </div>
            </div>
          </div>
        </form>

      </div>
      <div class="modal-footer multiStep">
        <div class="stepwizard col-md-offset-3">
          <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
              <a href="#step-1" type="button" class="btn btn-primary btn-circle"><i class="fa fa-fw fa-paperclip"></i></a>
            </div>
            <div class="stepwizard-step">
              <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-fw fa-users"></i></a>
            </div>
            <div class="stepwizard-step">
              <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-fw fa-check-circle-o"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>