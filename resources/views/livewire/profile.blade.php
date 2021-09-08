<div class="skills layout-spacing ">
    <div class="widget-content widget-content-area">
        <h3 class="">Ajustes</h3>
        <div class=" form">
            <div class="row">
                <form class="col-sm-12" wire:submit.prevent="updatePassword()">
                    <div class="form-group">
                        <label for="fullName">Contraseña Actual</label>
                        <input type="password" wire:model.defer="current_password" class="form-control"
                            id="current_password" placeholder="Ingrese contraseña actual">
                        @error('current_password')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fullName">Nueva Contraseña</label>
                        <input type="password" wire:model.defer="new_password" class="form-control"
                            id="new_password" placeholder="Ingrese nueva contraseña">
                        @error('new_password')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fullName">Repita Contraseña</label>
                        <input type="password" wire:model.defer="confirm_password" class="form-control" id="repeat_contraseña"
                            placeholder="Repita la contraseña">
                        @error('confirm_password')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <small id="emailHelp" class="form-text text-muted">*Campos
                        requeridos</small>
                    <div class="form-group text-right">
                        <button type="reset" wire:click="resetUI()" class="btn btn-outline-info mt-4">Cancelar</button>
                        <button type="submit" class="btn btn-outline-primary mt-4">Guardar Cambios</button>
                    </div>
                </form>
            </div>
    </div>
</div>
</div>
