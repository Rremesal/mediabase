import "./croppie";

let opts = {
    viewport: { width: 100, height: 100 },
    boundary: { width: 220, height: 220 },
    showZoomer: false,
    enableOrientation: true,
    enableResize: true,
};

const c = new Croppie(document.getElementById('myimage'), opts);
const button = document.getElementById("submit");
const filename = document.getElementById("filename")
console.log(filename)


button.addEventListener("click", (ev) => {
    ev.preventDefault()
    c.result("blob").then(blob => {
        let xhr = new XMLHttpRequest();
        let formData = new FormData();
        formData.append("file", blob);
        formData.append("filename", filename.value);

        xhr.open("POST", "/api/images/store", true);

        xhr.send(formData);
    })
})
