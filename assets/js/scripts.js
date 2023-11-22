function getImgRoute(carType) {

    let url = "";

    switch(carType) {
        case 'camioneta':
            url = 'assets/img/camioneta.png';
            break;
        case 'camion':
            url = 'assets/img/camion.png';
            break;
        case 'van':
            url = 'assets/img/van.png';
            break;
        case 'minivan':
            url = 'assets/img/minivan.png';
            break;
        default:
            url = 'assets/img/carro.png';
    }

    return url;
}