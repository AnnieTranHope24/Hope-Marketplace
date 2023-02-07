const bar1 = document.querySelector(".bar1");
const bar2 = document.querySelector(".bar2");
const bar3 = document.querySelector(".bar3");
const burger = document.querySelector(".menu");
const sidebar = document.querySelector(".sidebar");

burger.addEventListener("click", () => {
    bar1.classList.toggle("change1");
    bar2.classList.toggle("change2");
    bar3.classList.toggle("change3");
    sidebar.classList.toggle("reveal");
    burger.classList.toggle(".changemenu");
});
