<div class="modal fade" id="modal-group" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="wizard-container">
                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form method="post" action="{{ route('group.store') }}">
                        <div class="modal-header">
                            <div class="wizard-header text-center">
                                <h1 class="wizard-title">Crea un nuevo grupo</h1>
                                <p class="category">Con este grupo podrás dividir tus cuentas.</p>
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
                                        <label>Participantes
                                            <small>(*)</small>
                                        </label>
                                        <select  name="users[]" class="form-control" required multiple data-placeholder="Correo..">
                                            @foreach($users as $userList)
                                                @if($userList != Auth::user())
                                                    <option value="{{ $userList->id }}">{{ $userList->email }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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