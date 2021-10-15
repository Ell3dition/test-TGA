import { crearChart, crearDATATABLEById } from "./helpers/funciones.js";
import { getData } from "./helpers/getData.js";

//LA funcion getData recibe como parametro el tipo de consulta
// y la accion que debe recibir el BackEnd para poder enrutar y obtener la data

window.addEventListener("DOMContentLoaded", async () => {
    //paso los parametros a la funcion getData y retorna la data correspondiente
    //luego creo el gráfico con la funcion crearChart que recibe como parametro
    //el elemento canvas y la data para renderizar el gráfico


    //GRAFICO UNO
  const listOfNames = await getData("NameOfTheRespondents", "charts");
  const chartOfNames = document.getElementById("chartOfNames");
  crearChart(chartOfNames, listOfNames);

   //GRAFICO DOS
  const listOfMenAndWomen = await getData("MenAndWomen", "charts");
  const chartMenAndWomen = document.getElementById("chartMenAndWomen");
  crearChart(chartMenAndWomen, listOfMenAndWomen);

   //GRAFICO TRES
  const listOfPeopleByHobby = await getData("PeopleByHobby", "charts");
  const chartPeopleByHobby = document.getElementById("chartPeopleByHobby");
  crearChart(chartPeopleByHobby, listOfPeopleByHobby);

   //GRAFICO CUATRO
  const listOfPeopleByNumberOfHours = await getData(
    "PeopleByNumberOfHours",
    "charts"
  );
  const chartPeopleByNumberOfHours = document.getElementById(
    "chartPeopleByNumberOfHours"
  );
  crearChart(chartPeopleByNumberOfHours, listOfPeopleByNumberOfHours);

  //TABLA
  const listOfResults = await getData("resultsTable", "charts");
  crearTabla(listOfResults);
});

function crearTabla(data) {
  $("#resultsTable tbody").empty();
  const contenedorTbody = document.querySelector("#resultsContainer");

  data.forEach((encuestado) => {
    const row = document.createElement("tr");
    row.innerHTML = `  
          <td class="text-center" >${encuestado.NOMBRE}</td>
          <td class="text-center" >${encuestado.GENERO}</td>
          <td class="text-center">${encuestado.HOBBY}</td>
          <td class="text-center" >${
            encuestado.TIEMPO == null ? "" : encuestado.TIEMPO
          }</td>
          `;

    contenedorTbody.appendChild(row);
  });

  crearDATATABLEById("resultsTable");
}

const btnVolver = document.querySelector('#btnBack');
btnVolver.addEventListener('click', ()=>{

    location.href ="paginaUno";

})
