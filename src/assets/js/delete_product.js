import { showNotification } from "./utils.js";

document.getElementById("delete_product_form").addEventListener("submit", function(e) {
  e.preventDefault();

    const formData = new FormData(this);
    const select = document.getElementById("deletedComponent");
    const selectedOption = select.options[select.selectedIndex];
    const selectedId = selectedOption.value;


  fetch("../router/products/delete_product_router.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
        showNotification(data.message, "success");
        select.removeChild(selectedOption);
    } else {
        showNotification(data.message, "error");
    }
  })
  .catch(err => {
    console.error("Erro:", err);
    alert("Erro ao deletar produto");
  });
});