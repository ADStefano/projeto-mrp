import { showNotification } from "./utils.js";

document.getElementById("update_product_form").addEventListener("submit", function(e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch("../router/products/update_product.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
        showNotification(data.message, 'success');
    } else {
        showNotification(data.message, 'error');
    }
  })
  .catch(err => {
    console.error("Erro:", err);
    alert("Erro ao atualizar produto");
  });
});