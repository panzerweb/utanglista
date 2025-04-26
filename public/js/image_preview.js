console.log("Working");

const fileUpload = document.getElementById("prod_image");
if (fileUpload) {
    fileUpload.addEventListener('change', () =>{
        const file = fileUpload.files;
        if(file){
            const fileReader = new FileReader();
            const imagePreview = document.getElementById("file-preview");
    
            fileReader.onload = (event) => {
                imagePreview.setAttribute("src", event.target.result);
            }
            fileReader.readAsDataURL(file[0]);
        }
    })
}