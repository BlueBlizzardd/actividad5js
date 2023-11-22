const read = document.querySelector(".btn-read");
const results = document.querySelector(".results");

read.addEventListener('click', () => {
    const xhttp = new XMLHttpRequest();

    xhttp.open("GET", 'assets/php/select.php');
    xhttp.responseType = "json";
    xhttp.send();

    xhttp.onload = function () {
        results.innerHTML = `<table id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                </tr>
            </thead>`;
        for(obj of this.response) {
            document.getElementById("table").innerHTML += `<tr id="${obj.id}">
                <td>${obj.id}</td>
                <td>${obj.brandName}</td>
                <td>${obj.model}</td>
                <td>${obj.year}</td>
                <td>${obj.type}</td>
                <td>${obj.description}</td>
                <td><img src="${obj.imgroute}" alt="${obj.type}.png" width="200px"></td>
            </tr>`;
        }
        results.innerHTML += `</table>`;
    };
});