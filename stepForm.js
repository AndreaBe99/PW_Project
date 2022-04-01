var currentTab = 0;
showTab(currentTab);

/******** STEP FORM PAGAMENTO *******/
function showTab(n) {
    var tab = document.getElementsByClassName("tab");
    tab[n].style.display = "block";           // Mostro il Tab "n"

    // Aggiusto i botttoni
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "";
    }
    if (n == (tab.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Invia";
    } else {
        document.getElementById("nextBtn").innerHTML = "Avanti";
    }

    fixStepIndicator(n); // Correggo i pallini che fungono da indicatore
}

function nextPrev(n) {
    var tab = document.getElementsByClassName("tab");

    if (n == 1 && !validateForm()) return false;            // Se uno dei campi non è valido esci
    tab[currentTab].style.display = "none";           // Nascondi il Tab
    currentTab = currentTab + n;                // Incrementa il Tab
    if (currentTab >= tab.length) {           // Se hai raggiunto la fine fai il submit altrimenti mostra un altro tab
        document.getElementById("regForm").submit();
        return false;
    }
    showTab(currentTab);
}

function validateForm() { // Controlla se i campi sono compilati
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");

    for (i = 0; i < y.length; i++) {        // Ciclo per controllare i campi
        console.log("current: " + currentTab);
        if (y[i].value == "") {
            y[i].className += " invalid";
            valid = false;
        }
    }

    if (valid) {    // Se sono tutti compilati...
        document.getElementsByClassName("step")[currentTab].className += "";
    }
    return valid;
}

function fixStepIndicator(n) {  // Rimuove la classe active nei pallini 

    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    x[n].className += " active";
}
