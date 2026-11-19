const campoBusca = document.getElementById("campoBusca");

const exemplos = [
    "Quero um chopp e musica ao vivo...",
    "Quero um restaurante com area kids...",
    "Quero uma balada eletrônica...",
    "Quero tomar um café vendo o por do sol...",
    "Quero tomar um sorvete..."
];

let indice = 0;

setInterval(() => {

    if (campoBusca.value === "" && document.activeElement !== campoBusca) {

        indice = (indice + 1) % exemplos.length;

        campoBusca.placeholder = exemplos[indice];

    }

}, 2000);