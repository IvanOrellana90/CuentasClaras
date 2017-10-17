<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="wizard-container">
                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form action="{{ route('group.store') }}" method="POST">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <div class="wizard-header text-center">
                                <h3 class="wizard-title">Crea un nuevo grupo</h3>
                                <p class="category">Con este grupo podrás dividir tus cuentas.</p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="wizard-navigation">
                                <div class="progress-with-circle">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1"
                                         aria-valuemax="3"
                                         style="width: 21%;"></div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#about" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-list"></i>
                                            </div>
                                            Grupo
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#account" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-user"></i>
                                            </div>
                                            Participantes
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#address" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-check"></i>
                                            </div>
                                            Confirmación
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="about">
                                    <h5 class="info-text"> Datos basicos </h5>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Nombre
                                                    <small>(*)</small>
                                                </label>
                                                <input name="name" type="text" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Descripción
                                                </label>
                                                <textarea name="description" class="form-control">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="account">
                                    <h5 class="info-text"> Participantes de tu grupo </h5>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Participantes
                                                    <small>(*)</small>
                                                </label>
                                                <select required name="users[]" class="form-control select2" multiple="multiple" data-placeholder="Correo.." style="width: 100%;">
                                                    @foreach($users as $userList)
                                                        @if($userList != $user)
                                                            <option value="{{ $userList->id }}">{{ $userList->email }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="address">
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Siguiente'/>
                                    <input type='submit' class='btn btn-finish btn-fill btn-succes btn-wd' name='finish' value='Ingresar'/>
                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Anterior'/>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->





