<div class="row justify-content-center text-center">
    <div class="col-md-10 my-3">
        <h3 class="fw-bolder">Resultados</h3>
    </div>
    <div class="col-md-10 my-3">
    <button type="button" id="btnBack" class="btn btn-primary btn-lg">Volver a realizar la encuesta</button>

    </div>

    <div class="col-md-10">
        <div class="row justify-content-center">
            <div class="col-md-4 my-5">
                <p class="fw-bolder">Nombres que han participado en la encuesta</p>
                <canvas id="chartOfNames" width="400" height="400"></canvas>
            </div>
            <div class="col-md-4 my-5">
                <p class="fw-bolder">Cantidad de Mujeres y Hombres</p>
                <canvas id="chartMenAndWomen" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-10">
        <div class="row justify-content-center">
            <div class="col-md-4 my-5">
                <p class="fw-bolder">Cantidad de personas por Hobby</p>
                <canvas id="chartPeopleByHobby" width="400" height="400"></canvas>
            </div>
            <div class="col-md-4 my-5">
                <p class="fw-bolder">Horas dedicadas por Hobby</p>
                <canvas id="chartPeopleByNumberOfHours" width="400" height="400"></canvas>
            </div>

        </div>

    </div>

    <div class="col-md-10 my-3">
        <h3 class="fw-bolder">Tabla Resumen</h3>


        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover TB" id="resultsTable" border="1px">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Género</th>
                        <th scope="col">Hobby</th>
                        <th scope="col">Tiempo dedicado en Días</th>
                    
                    </tr>
                </thead>
                <tbody id="resultsContainer">
                    <!-- LLENADO JS -->
                </tbody>

            </table>



        </div>
    </div>


</div>