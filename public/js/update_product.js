// Bridges the update of products through Fetch API
// POST Method is used instead of PUT; PUT Method might be used in the future.

function updateProduct(id){
    let product_id = document.getElementById(`product_id_${id}`).value;
    let product_name = document.getElementById(`prod_name_${id}`).value;
    let product_price = document.getElementById(`prod_price_${id}`).value;
    let product_category = document.getElementById(`category-select_${id}`);
        let cValue = product_category.value;
        let cText = product_category.options[product_category.selectedIndex].text;
    let product_image = document.getElementById(`prod_image_${id}`).files[0];

    console.log(product_id);
    console.log(product_name);
    console.log(product_price);
    console.log(cValue);
    console.log(product_image);

    const formData = new FormData();
    formData.append('id', product_id);
    formData.append('prod_name', product_name);
    formData.append('prod_price', product_price);
    formData.append('category_id', cValue);
    formData.append('prod_image', product_image);

    fetch(`../api/edit_product.php`, {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === 'success') {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Product Updated!",
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(() => {
                window.location.href = '../views/products.php';
            }, 1000);
        }
        else{
            Swal.fire({
                title: "Product Update Failed",
                text: `${data}`,
                icon: "error",
                showConfirmButton: false,
                timer: 1000,
            });
            console.log(data);
        }
    })
    .catch(error => {
        console.log(error);
    })

}