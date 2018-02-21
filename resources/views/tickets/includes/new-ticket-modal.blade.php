<div class="modal fade" id="modal-ticket" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="wizard-container">
                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form method="post" action="{{ route('ticket.store') }}" enctype="multipart/form-data">
                        <div class="modal-header">
                            <div class="wizard-header text-center">
                                <h1 class="wizard-title">Crea un nuevo ticket</h1>
                                <p class="category">Ingresa el detalle de tu pago.</p>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Nombre
                                            <small>(*)</small>
                                        </label>
                                        <input name="name" type="text" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Descripción
                                        </label>
                                        <textarea style="height: 100px" name="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Monto
                                            <small>(*)</small>
                                        </label>
                                        <input type="number" min="1" max="2000000000" id="amounTicket" name="amounTicket" value="0" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Adjunto
                                        </label>
                                        <input type="file" id="attached" name="attached" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Fecha
                                            <small>(*)</small>
                                        </label>
                                        <input type="date" name="date"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Grupo
                                            <small>(*)</small>
                                        </label>
                                        <select  name="group" class="form-control select2 group" data-placeholder="Grupo.."  style="width: 100%">
                                            <option selected value="0">Seleccione...</option>
                                            @foreach($user->groupsBelong as $groups)
                                                <option value="{{ $groups->id }}">{{ $groups->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>