// Lista de imágenes (puedes agregar más URLs de imágenes)
const images = [
    "imagenes/acelote",
    "",
    "https://via.placeholder.com/150/3",
    "https://via.placeholder.com/150/4",
    "https://via.placeholder.com/150/5",
    "https://via.placeholder.com/150/6",
    "https://via.placeholder.com/150/7",
    "https://via.placeholder.com/150/8"
];

// Selecciona el contenedor del mosaico
const mosaicContainer = document.getElementById('mosaicContainer');

// Función para crear el mosaico de imágenes
function createMosaic() {
    images.forEach((imgUrl) => {
        const imgElement = document.createElement('img');
        imgElement.src = imgUrl;
        mosaicContainer.appendChild(imgElement);
    });
}

// Llama a la función para cargar las imágenes
createMosaic();
