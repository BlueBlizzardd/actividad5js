const update = document.querySelector(".btn-update");

update.addEventListener('click', () => {

    const data = {
        id: document.getElementById('id').value,
        idbrand: document.getElementById('brandName').value,
        model: document.getElementById('model').value,
        year: new Date(document.getElementById('year').value).getFullYear(),
        type: document.getElementById('type').value,
        description: document.getElementById('description').value,
        imgroute: getImgRoute(document.getElementById('type').value)
    };

    const xhttp = new XMLHttpRequest();

    xhttp.open("PUT", 'assets/php/update.php');
    xhttp.setRequestHeader("Content-type", "application/json");

    xhttp.onload = function () {
        console.log(xhttp.responseText);
    };

    xhttp.send(JSON.stringify(data));
});