let filterInput = document.getElementById("search");

filterInput.addEventListener("keyup", filterSearch);

function filterSearch() {
  let searchValue = document.getElementById("search");
  let table = document.getElementById("myTable");
  let tr = document.getElementsByTagName("tr");
  let filter = searchValue.value.toUpperCase();

  for (i = 0; i < tr.length; i++) {
    let td = tr[i].getElementsByTagName("td")[0];

    if (td) {
      let txtValue = td.textContent || td.innerText;

      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
