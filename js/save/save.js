let form_register = document.getElementById("form-register");
form_register.addEventListener("submit", function (event) {
  event.preventDefault();

  let formData = new FormData(form_register);
  let data = {};
  formData.forEach((value, key) => {
    data[key] = value;
  });

  fetch("http://localhost/tienda_master/save", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      console.log("Datos guardados:", data);
    })
    .catch((error) => {
      console.error("Error al guardar datos:", error);
    });
});
