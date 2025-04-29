let insertProductBtn = document.getElementById("insertProductBtn").addEventListener('click', insertProduct);

function insertProduct(){
    let productName = document.getElementById("prod_name").value;
    let productPrice = document.getElementById("prod_price").value;
    let categorySelect = document.getElementById("category-select");
        let cValue = categorySelect.value;
        let cText = categorySelect.options[categorySelect.selectedIndex].text;
    let productImage = document.getElementById("prod_image").files[0];
    // console.log(productName);
    // console.log(productPrice);
    // console.log(cValue);
    // console.log(cText);
    // console.log(productImage);
    const formData = new FormData();
    formData.append('prod_name', productName);
    formData.append('prod_price', productPrice);
    formData.append('category', cValue);
    formData.append('prod_image', productImage);

    console.log(formData);

    fetch('../api/add_product.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === 'success') {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Product added successfully!",
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(() => {
                window.location.href = "../views/products.php";
            }, 1000);
            console.log(data);

        } else {
            Swal.fire({
                title: "Error",
                text: `${data}`,
                icon: "question",
                showConfirmButton: false,
                timer: 1000,
            });
            console.log("Data: " + data);
        }
    })
    .catch(error => {
        console.log(error);
    })
}