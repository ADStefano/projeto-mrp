document.getElementById("create_product_form").addEventListener("submit", function(e) {
  e.preventDefault();

  const formData = new FormData(this);
  console.log(formData)

  fetch("../controllers/create_product.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.text())
  .then(html => {
    document.getElementById("mrp-table").innerHTML = html;
  })
  .catch(err => {
    console.error("Erro:", err);
  });
});