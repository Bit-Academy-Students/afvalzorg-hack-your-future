
const btnNl = document.getElementById("btnNl");
const btnEn = document.getElementById("btnEn");
const btnDe = document.getElementById("btnDe");

const popUpNl = document.getElementById("popUpNl");
const popUpEn = document.getElementById("popUpEn");
const popUpDe = document.getElementById("popUpDe")

const body = document.getElementById("body");

const elementen = body.querySelectorAll("h1, p, footer");
const origineleTeksten = [];

elementen.forEach(function(element) {
    origineleTeksten.push(element.textContent);
});

async function vertaalPagina(taal) {
    try {
        if (taal === "nl") {
            elementen.forEach(function(element, index) {
                element.textContent = origineleTeksten[index];
            });
            return; 
        }

        const translator = await Translator.create({
            sourceLanguage: "nl",
            targetLanguage: taal
        });

        for (let i = 0; i < elementen.length; i++) {
            const vertaling = await translator.translate(
                origineleTeksten[i]
            );

            elementen[i].textContent = vertaling;
        }

    } catch (error) {
        console.error("Vertaling mislukt:", error);
    }
}

btnNl.addEventListener("click", function() {
    vertaalPagina("nl");
});

btnEn.addEventListener("click", function() {
    vertaalPagina("en");
    console.log("Translator" in self);
});

btnDe.addEventListener("click", function() {
    vertaalPagina("de");
});

popUpNl.addEventListener("click", function() {
    vertaalPagina("nl");
});

popUpEn.addEventListener("click", function() {
    vertaalPagina("en");
});

popUpDe.addEventListener("click", function() {
    vertaalPagina("de");
});



window.addEventListener('DOMContentLoaded', (event) => {
  document.getElementById('mijnPopup').style.display = 'flex';
});

function sluitPopup() {
  document.getElementById('mijnPopup').style.display = 'none';
}
