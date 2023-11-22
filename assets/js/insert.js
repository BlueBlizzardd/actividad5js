const create = document.querySelector(".btn-create");

create.addEventListener('click', () => {

    const data = {
        idbrand: document.getElementById('brandName').value,
        model: document.getElementById('model').value,
        year: new Date(document.getElementById('year').value).getFullYear(),
        type: document.getElementById('type').value,
        description: document.getElementById('description').value,
        imgroute: getImgRoute(document.getElementById('type').value)
    };

    const xhttp = new XMLHttpRequest();

    xhttp.open("POST", 'assets/php/insert.php');
    xhttp.setRequestHeader("Content-type", "application/json");

    xhttp.onload = function () {
        console.log(xhttp.responseText);
    };

    xhttp.send(JSON.stringify(data));
});