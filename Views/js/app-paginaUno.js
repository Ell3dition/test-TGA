import { animacionBtn, removerAnimacionBtn } from "./helpers/funciones.js";
import { getData } from "./helpers/getData.js";

window.addEventListener("DOMContentLoaded", () => {
  const selectHobby = document.querySelector("#hobby");
  cargarSelectHobby(selectHobby);
  selectHobby.addEventListener("change", () => {
    const colTiempo = document.getElementById("col-tiempo");
    if (
      Number.parseInt(selectHobby.value) != 0 &&
      Number.parseInt(selectHobby.value) != 100
    ) {
      colTiempo.style.display = "block";
    } else {
      colTiempo.style.display = "none";
    }
  });
});

async function cargarSelectHobby(selectHobby) {
  const hobbyList = await getData("", "getHobby");
  const opcion = document.createElement("option");
  opcion.text = "Selecciona un Hobby";
  opcion.value = "100";
  selectHobby.appendChild(opcion);

  hobbyList.forEach(({ ID, NOMBRE }) => {
    const opcion = document.createElement("option");
    opcion.text = NOMBRE;
    opcion.value = ID;
    selectHobby.appendChild(opcion);
  });
}

//GUARDAR ENCUESTA

const formEncuesta = document.querySelector("#formEncuesta");
formEncuesta.addEventListener("submit", async (event) => {
  event.preventDefault();
  const data = new FormData(formEncuesta);
  data.append("accion", "guardar");

  const btnGuardar = document.querySelector("#btnGuardar");
  animacionBtn(btnGuardar, "Guardando...");

  const jsonAnswer = await fetch("Controllers/appC.php", {
    method: "POST",
    body: data,
  });

  const answer = await jsonAnswer.json();

  setTimeout(() => {
    if (answer.Estado) {
      removerAnimacionBtn(btnGuardar, "Guardar");
      btnGuardar.setAttribute("disabled", true);
      formEncuesta.reset();
      const colTiempo = document.getElementById("col-tiempo");
      colTiempo.style.display = "none";

      const btnSiguiente = document.querySelector("#btnSiguiente");
      btnSiguiente.removeAttribute("disabled");
      Swal.fire({
        title: "Felicidades",
        text: answer.Motivo,
        icon: "success",
      });
    } else {
      console.log(answer);
      removerAnimacionBtn(btnGuardar, "Guardar");
      Swal.fire({
        title: "Error!",
        text: answer.Motivo,
        icon: "error",
      });
    }
  }, 1500);
});

//CARGAR PAGINA "2" RESULTADOS
const btnSiguiente = document.querySelector("#btnSiguiente");
btnSiguiente.addEventListener("click", () => {
  location.href = "paginaDos";
});
