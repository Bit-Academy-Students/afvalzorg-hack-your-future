const test = document.getElementById("test");
const loc1 = document.getElementById("locatieButton1");
const loc2 = document.getElementById("locatieButton2");
const loc3 = document.getElementById("locatieButton3");
const loc4 = document.getElementById("locatieButton4");
const loc5 = document.getElementById("locatieButton5");
const loc6 = document.getElementById("locatieButton6");
const loc7 = document.getElementById("locatieButton7");
const loc8 = document.getElementById("locatieButton8");
const loc9 = document.getElementById("locatieButton9");

test.addEventListener("click", function() {
    console.log("test");
});

loc1.addEventListener('click', (event) => {
  document.getElementById('instructiepopup').style.display = 'flex';
});

loc2.addEventListener('click', (event) => {
  document.getElementById('instructiepopup').style.display = 'flex';
});

loc3.addEventListener('click', (event) => {
  document.getElementById('instructiepopup').style.display = 'flex';
});

loc4.addEventListener('click', (event) => {
  document.getElementById('instructiepopup').style.display = 'flex';
});

loc5.addEventListener('click', (event) => {
  document.getElementById('instructiepopup').style.display = 'flex';
});

loc6.addEventListener('click', (event) => {
  document.getElementById('instructiepopup').style.display = 'flex';
});

loc7.addEventListener('click', (event) => {
  document.getElementById('instructiepopup').style.display = 'flex';
});

loc8.addEventListener('click', (event) => {
  document.getElementById('instructiepopup').style.display = 'flex';
});

loc9.addEventListener('click', (event) => {
  document.getElementById('instructiepopup').style.display = 'flex';
});

function sluitPopup() {
  document.getElementById('instructiepopup').style.display = 'none';
}