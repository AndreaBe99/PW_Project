window.onload = function () {
	/*****  FILTRO PRODOTTI *****/
    const searchBar = document.getElementById("cercaProdotto");
    searchBar.addEventListener('keyup', function (elem) {

        const term = elem.target.value.toLowerCase(); // lo metto in minuscolo per il confronto
        const nomePiante = document.getElementsByClassName('nomeProdotto');
        Array.from(nomePiante).forEach(function (pianta) {
            const nome = pianta.textContent;
            if (nome.toLowerCase().indexOf(term) != -1) { // Se non trova la sottostringa ritorna -1
                pianta.parentNode.parentNode.parentNode.style.display = 'flex';
            } else {
                pianta.parentNode.parentNode.parentNode.style.display = 'none';
            }
        });
    });


/********* FILTRO CATEGORIA ***********/
    const categorie = document.getElementsByClassName("cat");
    Array.from(categorie).forEach(function (categoria) {
        categoria.addEventListener('click', function (e) {
            var fratelli = categoria.parentNode.childNodes;

            // "Azzero" la classe per togliere il controno evidenziato
            for (let i = 0; i < fratelli.length; i++) {
                fratelli[i].className = "cat";
            }

            categoria.className = "cat active";     // Imposto active quindi lo evidenzio
            var cat = "Categoria: " + categoria.textContent;        //Aggiungo "Categoria per fare il confronto"
            //console.log(cat);

            const categoriaPianta = document.getElementsByClassName('categoriaProdotto');
            Array.from(categoriaPianta).forEach(function (pianta) {
                const categoria = pianta.textContent;
                console.log(categoria);
                if (cat == "Categoria: Tutti") {
                    pianta.parentNode.parentNode.parentNode.style.display = 'flex';
                } else if (categoria.toLowerCase() == cat.toLowerCase()) {
                    pianta.parentNode.parentNode.parentNode.style.display = 'flex';
                } else {
                    pianta.parentNode.parentNode.parentNode.style.display = 'none';
                }
            });

        });
    });
}