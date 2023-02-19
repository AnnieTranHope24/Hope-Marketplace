const bar1 = document.querySelector(".bar1");
const bar2 = document.querySelector(".bar2");
const bar3 = document.querySelector(".bar3");
const aca = document.querySelector(".aca");
const burger = document.querySelector(".menu");
const sidebar = document.querySelector(".sidebar");

burger.addEventListener("hover", () => {
    sidebar.classList.toggle("reveal");
    burger.classList.toggle(".changemenu");
});

aca.addEventListener("hover", () => {

});