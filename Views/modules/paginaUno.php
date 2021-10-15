<div class="row justify-content-center">

    <div class="col-9 mt-5 text-center">

        <h3 class="fw-bolder">Bienvenido</h3>

        <p class="fw-normal">Recuerda que debes responder todas las preguntas</p>

    </div>

    <div class="col-4 mt-5">

        <form id="formEncuesta">

            <div class="mb-3">
                <label for="nombre" class="form-label fw-bolder">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ej. Mario">
            </div>

            <div class="mb-3">
                <label for="" class="form-label fw-bolder">Género</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" id="checkMujer" value="0" checked>
                    <label class="form-check-label" for="checkMujer">
                        Mujer
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="1" id="checkHombre">
                    <label class="form-check-label" for="checkHombre">
                        Hombre
                    </label>
                </div>
            </div>


            <div class="mb-3">
                <label for="hobby" class="form-label fw-bolder">¿Tienes algún hobby?</label>
                <select id="hobby" name="hobby" class="form-select">
                
                <!-- LLENADO DESDE APP.JS -->
        
                </select>
            </div>



            <div class="mb-3" style="display: none;" id="col-tiempo">
                <label for="tiempo" class="form-label fw-bolder">¿Cuánto tiempo le dedicas al mes?</label>
                <label for="tiempo" class="form-label">Se considera por dia Ej. 1 = 1 dia al mes, 10 = 10 Dias al mes</label>
                <input type="number" name="tiempo" id="tiempo" class="form-control" placeholder="Ej. 5">
            </div>
            <button type="submit" id="btnGuardar" class="btn btn-success">Guardar</button>
            <button type="button" disabled id="btnSiguiente" class="btn btn-primary">Siguiente</button>

        </form>

    </div>


</div>