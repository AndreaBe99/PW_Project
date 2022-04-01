window.onload = function () {

    navSlide();

    try {
        on();
        showSlides();
    } catch (err) {
        console.log("ERRORE: " + err);
    }

    /******** BOTTONE SCROLL UP ********/
    const btnScroll = document.getElementById("myBtn");
    btnScroll.addEventListener("click", function (params) {
        window.scrollTo({
            top: 0,
            left: 0,
            behavior: "smooth"
        });
    });

    /** ACTIVE NAVBAR LINK **/
    const btnNavBar = document.getElementsByClassName("btnNavBar");
    var path = window.location.pathname;
    var page = path.split("/").pop();
    console.log(page);
    if (page == "index.php") {
        btnNavBar[0].className = "btnNavBar pageActive";
    }
    if (page == "listaProdotti.php") {
        btnNavBar[1].className = "btnNavBar pageActive";
    }
    if (page == "gestioneOrdini.php") {
        btnNavBar[2].className = "btnNavBar pageActive";
    }
    if (page == "infoContatti.php") {
        btnNavBar[3].className = "btnNavBar pageActive";
    }
}



/*****   MENU HAMBURGHER */
function navSlide() {
    const burger = document.getElementsByClassName("burger")[0];
    const nav = document.getElementsByClassName("nav-links")[0];
    const nav_links = document.getElementsByClassName("nav-links")[0];

    //Bottone mostra navbar
    burger.addEventListener("click", () => {

        if (nav.className == "nav-links") {
            nav.className = "nav-links nav-active"
            for (var x = 0; x < nav_links.children.length; x++) {
                if (nav_links.children[x].style.animation) {//azzero l'animazione
                    nav_links.children[x].style.animation = "";
                } else {
                	/* diviso 7 o qualsiasi numero in modo tale da "automarizzare" l'animazione, 
                    	infatti più si aggiungono elementi più aumenta x e quindi ritarda il loro tempo di apparizione
                    */
                    nav_links.children[x].style.animation = `navLinkFade 0.5s ease forwards ${x / 7 + 0.3}s`;
                }
            }
            //burger animation
            burger.className = "burger toggle"

        } else {
            nav.className = "nav-links"
            for (var x = 0; x < nav_links.children.length; x++) {
                if (nav_links.children[x].style.animation) {
                    nav_links.children[x].style.animation = "";
                } else {
                    console.log(x / 7);
                    nav_links.children[x].style.animation = `navLinkFade 0.5s ease forwards ${x / 7 + 0.3}s`;
                }
            }
            //burger animation
            burger.className = "burger"
        }
    });
}


/**** OVERLAY BANNER ***/
function on() {
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
}


