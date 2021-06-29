@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    {{ __('Ya has iniciado sesion! Ahora a diagramar') }}
                    <!-- El modal comeinza aca -->

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="background-color: #F06449; color: #FFFFFF">
                        Crear sala
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #36382E">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: #5BC3EB">Generar codigo</h5>
                                    <button type="button" style="color: #5BC3EB" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>
                                <div class="modal-body">
                                    <form action="{{route('invitation.store')}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div>
                                            <h5 class="small font-weight-bold text-center text-danger">
                                                <li>Para generar un codigo sin limite de invitados seleccion cero </li>
                                            </h5>
                                        </div>
                                        <div>
                                            <label for="max">Cantidad de invitados</label>
                                            <input type="number" placeholder="cant de invitados" min="0" max="35" name="max">
                                        </div>
                                        <div>
                                            <label for="fecha">Fecha de expiracion</label>
                                            <input type="date" name="fecha">
                                        </div>
                                        <button type="submit" class="btn" style="background-color: #F06449; color: #FFFFFF">Generar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </form>
                                    <div class="modal-footer">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- el model termina aca -->
                    <hr>
                    {{__('O unete a una sesion ya existente')}}
                    <form action="{{route('board')}}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="text" placeholder="coloca el codigo aqui" name="invite_code">
                        <button class="btn" type="submit" style="background-color: #F06449; color: #FFFFFF" >
                            Unete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('#exampleModal').on('shown.bs.modal', function () {
        document.getElementById('myInput').trigger('focus')
    })
</script>
@endsection
