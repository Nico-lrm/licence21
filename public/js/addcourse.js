/* Vérification des champs d'inscriptions côté client */
document.getElementById("title").addEventListener("focusout", function() {
    title = document.getElementById("title").value;
    if (title.match(RegExp(regex))) {
        document.getElementById("errTitle").textContent = "";
        document.getElementById("title").style.borderColor = "green";
    } else if (!title.match(RegExp(regex)) && document.getElementById("title").value == "") {
        document.getElementById("title").style.borderColor = "white";
        document.getElementById("errTitle").textContent = "";
    } else {
        document.getElementById("title").style.borderColor = "red";
        document.getElementById("errTitle").textContent = "Caractères spéciaux saisis.";
    }
});
document.getElementById("professor").addEventListener("focusout", function () {
    professor = document.getElementById("professor").value;
    if (professor.match(RegExp(regex))) {
        document.getElementById("errProf").textContent = "";
        document.getElementById("professor").style.borderColor = "green";
    } else if (!professor.match(RegExp(regex)) && document.getElementById("professor").value == "") {
        document.getElementById("professor").style.borderColor = "white";
        document.getElementById("errProf").textContent = "";
    } else {
        document.getElementById("professor").style.borderColor = "red";
        document.getElementById("errProf").textContent = "Caractères spéciaux saisis.";
    }
});
document.getElementById("content").addEventListener("focusout", function() {
    content = document.getElementById("content").value;
    if (document.getElementById("content").value != '') {
        document.getElementById("errContent").textContent = "";
        document.getElementById("content").style.borderColor = "#ccc";
    } else {
        console.log(document.getElementById("content").value)
        document.getElementById("content").style.borderColor = "red";
        document.getElementById("errContent").textContent = "Veuillez choisir l'une des catégories.";
    }
});
document.getElementById("semester").addEventListener("focusout", function() {
    semester = document.getElementById("semester").value;
    if (document.getElementById("semester").value != '') {
        document.getElementById("errSemester").textContent = "";
        document.getElementById("semester").style.borderColor = "#ccc";
    } else {
        document.getElementById("semester").style.borderColor = "red";
        document.getElementById("errSemester").textContent = "Veuillez choisir l'une des catégories.";
    }
});
document.getElementById("subject").addEventListener("focusout", function() {
    subject = document.getElementById("subject").value;
    if (document.getElementById("subject").value != '') {
        document.getElementById("errSubject").textContent = "";
        document.getElementById("subject").style.borderColor = "#ccc";
    } else {
        document.getElementById("subject").style.borderColor = "red";
        document.getElementById("errSubject").textContent = "Veuillez choisir l'une des catégories.";
    }
});
/* UPLOAD */

function uploadFile() {
    var xhttp = new XMLHttpRequest();
    var semester = document.getElementById("semester").value;
    var file =  document.getElementById("file").files[0];
    var content = document.getElementById("content").value;
    var subject = document.getElementById("subject").value;
    var professor = document.getElementById("professor").value;
    var title = document.getElementById("title").value;
    if(title != "" && professor != "" && content != "" && subject != "" && subject != "" && file != undefined) {
        document.getElementById('btnSubmit').value = "Upload en cours...";
        document.getElementById('btnSubmit').style = "pointer-events: none; color: #bbb; background-color: #645980cc";
        var formdata = new FormData();
        formdata.append("file", file);
        formdata.append("semester", semester);
        formdata.append("content", content);
        formdata.append("subject", subject);
        formdata.append("professor", professor);
        formdata.append("title", title);
        xhttp.upload.addEventListener("progress", progressHandler, false);
        xhttp.addEventListener("load", completeHandler, false);
        xhttp.addEventListener("error", errorHandler, false);
        xhttp.open("POST", "ajax/upload-file.php"); 
        xhttp.send(formdata);
    }
    function progressHandler(event) {
        var percent = (event.loaded / event.total) * 100;
        document.getElementById("progressBar").value = Math.round(percent);
        document.getElementById("status").color = "white";
        document.getElementById("status").innerHTML = Math.round(percent)+"%... veuillez patienter";
    }
    
    function completeHandler(event) {
        //document.location.href = "?page=courses";
        if (xhttp.status == 406) {
            document.getElementById('btnSubmit').value = "Ajouter un cours";
            document.getElementById('btnSubmit').style = "pointer-events: auto; color: white; background-color: var(--btn-clr)";
            document.getElementById("status").innerHTML = event.target.responseText;
        } else {    
            document.location.href = "?page=courses";
        }
    }
    
    function errorHandler(event){
        document.getElementById("progressBar").value = 0;
        document.getElementById("status").textContent = event.target.responseText;
        document.getElementById("status").color = "#f7a1a1";
    }
}

