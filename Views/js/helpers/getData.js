export async function getData(tipo = '', accion) {
  const data = new FormData();
  data.append("tipo", tipo);
  data.append("accion", accion);
  const answer = await fetch("Controllers/appC.php", {
    method: "POST",
    body: data,
  });
  const list = await answer.json();
  return list;
}
