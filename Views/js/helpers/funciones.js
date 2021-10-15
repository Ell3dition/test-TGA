export {
  crearDATATABLEById,
  LimpiarDataTable,
  animacionBtn,
  removerAnimacionBtn,
  crearChart,
};
//CREAR CHARTS

function crearChart(ctx, datos) {

  let labels = [];
  let data = [];
  datos.forEach((res) => {
    labels.push(res.LABEL);
    data.push(res.CANTIDAD);
  });


  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [
        { 
          label:[],
          data:data,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
          borderWidth: 1,
        },
      ],
    },
    options:{

      scales:{
        y:{
          beginAtZero:true
        }
      }

    }
  
 
  });

  


}

function LimpiarDataTable(idTabla) {
  let tabla = $("#" + idTabla).DataTable();
  console.log(tabla);
  if (tabla != null) {
    tabla.clear();
    tabla.destroy();
  }
}

//CREAR DATATABLE
function crearDATATABLEById(idTabla, title, filename) {
  $("#" + idTabla).DataTable({
    pageLength: 5,
    language: {
      decimal: "",
      emptyTable: "No hay información",
      info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      infoEmpty: "Mostrando 0 de 0 Entradas",
      infoFiltered: "(Filtrado de _MAX_ total entradas)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Mostrar _MENU_ Entradas",
      loadingRecords: "Cargando...",
      processing: "Procesando...",
      search: "Buscar:",
      zeroRecords: "Sin resultados encontrados",
      paginate: {
        first: "Primero",
        last: "Ultimo",
        next: "Siguiente",
        previous: "Anterior",
      },
    },

    dom: "Bfrtip",

    buttons: {
      dom: {
        button: {
          className: "btn",
        },
      },

      buttons: [
        {
          extend: "excelHtml5",
          title: null,
          filename: filename,
          //definimos estilos del boton de excel
          extend: "excel",
          text: "Exportar a Excel",
          className: "btn btn-warning",

          excelStyles: [
            {
              template: ["blue_medium", "header_green", "title_medium"],
            },

            {
              cells: "sh",
              style: {
                font: {
                  size: 14,
                  b: false,
                },
                fill: {
                  pattern: {
                    color: "1C3144",
                  },
                },
              },
            },
          ],
        },
      ],
    },
  });
}

//ANIMACION BOTON

function animacionBtn(btn, texto) {
  let spanSpinner = document.createElement("SPAN");
  spanSpinner.classList.add("spinner-grow", "spinner-grow-sm");
  spanSpinner.setAttribute("role", "status");
  spanSpinner.setAttribute("aria-hidden", "true");

  let spanText = document.createElement("SPAN");
  spanText.textContent = ` ${texto}`;

  btn.textContent = "";
  btn.appendChild(spanSpinner);
  btn.appendChild(spanText);
  btn.setAttribute("disabled", true);
}

function removerAnimacionBtn(btn, texto) {
  btn.removeAttribute("disabled");
  btn.textContent = texto;
}
