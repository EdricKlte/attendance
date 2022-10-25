const bars = document.querySelector("#bars");
const sidebar = document.querySelector(".sidebar");
const close = document.querySelector("#close");

bars.addEventListener("click", () => {
  if (sidebar.className.includes("close")) {
    sidebar.classList.remove("close");
    sidebar.classList.add("open");
  }
});

close.addEventListener("click", () => {
  if (sidebar.className.includes("open")) {
    sidebar.classList.remove("open");
    sidebar.classList.add("close");
  }
});
