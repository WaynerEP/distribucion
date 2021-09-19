<div class="col-sm-9 btn-group btn-group-lg show">
    <input type="text" wire:model="searchEmployee"
        class="form-control form-control-sm"
        placeholder="Search Here...">
    @if ($searchEmployee)
        <div class="dropdown-menu show bg-light-success"
            style="width:100%; height-max:200px; overflow:auto; will-change: transform; position: absolute; transform: translate3d(0px, 46px, 0px); top: 0px; left: 0px;"
            x-placement="bottom-start">
            @if (count($employees) > 0)
                @foreach ($employees as $employee)
                    <a class="dropdown-item"
                        wire:click="selectedEmployee({{ $employee->idEmpleado }})"
                        href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-user">
                            <path
                                d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                            </path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        {{ $employee->nombre }}
                        {{ $employee->aPaterno }} -
                        {{ $employee->dni }}</a>
                @endforeach
            @else
                <a class="dropdown-item" href="javascript:void(0);">No
                    hay
                    resultados!🙁(</a>
            @endif
        </div>
    @endif
</div>