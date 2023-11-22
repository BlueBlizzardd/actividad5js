const erase = document.querySelector(".btn-delete");

erase.addEventListener('click', () => {

    const data = {
        idbrand: document.getElementById('brandName').value,
        model: document.getElementById('model').value,
        year: new Date(document.getElementById('year').value).getFullYear(),
    };

    const xhttp = new XMLHttpRequest();

    xhttp.open("DELETE", `assets/php/delete.php?${new URLSearchParams(data).toString()}`);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhttp.onload = function () {
        console.log(xhttp.responseText);
    };

    xhttp.send();
});