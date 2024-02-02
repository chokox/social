@extends('micrositio.appmicrositio')
@section('content')
    <!-- START SERVICES -->
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h3>¡Bienvenido al <span class="text-primary">Buzón Digital</span> de <span
                                class="text-primary">Contraloria Social</span>!</h3>
                        <p class="text-muted mt-2">Estamos encantados de darte la bienvenida a nuestro espacio dedicado a
                            escuchar tus comentarios, sugerencias, quejas, denuncias y felicitaciones. Tu opinión es
                            invaluable para nosotros y nos ayuda a mejorar continuamente.
                            <br>Aquí en nuestro Buzón Digital, queremos brindarte una plataforma segura y confidencial para
                            que compartas tus experiencias con nosotros.
                        </p>
                    </div>
                </div>
            </div>
 <form method="POST" action="{{ route('buzones_ciudadanos.store') }}" enctype="multipart/form-data">
    @csrf
            <div class="row">
                    <input type="text" class="form-control" name="nBuzon" value="{{$nbuzon}}" hidden readonly/>
                <br> 
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nombre" required />
                    <label for="floatingInput">Nombre</label>
                </div>
                <br>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nombre_SP" required  />
                    <label for="floatingInput">Nombre del servidor publico que lo atendio</label>
                </div>
                <br>
                <div class="form-floating">
                    <input type="text" class="form-control" name="tramite_realizado" required  />
                    <label for="floatingPassword">Tramite realizado</label>
                </div>
<br><br><br><br>
                <div class="form-floating">
                    <select class="form-select" name="tipo_comentario" aria-label="Floating label select example">
                        <option value="Queja y/o denuncia">Queja y/o denuncia</option>
                        <option value="Inconformidad">Inconformidad</option>
                        <option value="Felicitacion">Felicitacion</option>
                        <option value="Sugerencia">Sugerencia</option>
                        <option value="Peticion">Peticion</option>
                    </select>
                    <label for="floatingPassword">Tipo de comentario</label>
                </div>
<br><br><br><br>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" required name="comentario" ></textarea>
                    <label for="floatingTextarea">Comentarios</label>
                </div>

                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="file" class="form-control" name="multimedia">
                            <label for="floatingInputGrid">Multimedia</label>
                        </div>
                    </div>
        
                </div>
            </div>
            <br><br>
            <div class="d-grid">
            <button type="submit" class="btn btn-primary"><strong>Enviar</strong></button>
                                </form>
                                <br><br><br>
        </div>
        </div>
    <!-- END SERVICES -->
@endsection
