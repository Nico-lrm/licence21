document.getElementById("accordion").addEventListener("click", function () {
    this.classList.toggle("active2");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
        panel.style.borderTop = "1px solid transparent";
        panel.style.padding = "0rem 1.5rem";
        document.getElementById("accordion").style.borderBottomLeftRadius = "10px";
        document.getElementById("accordion").style.borderBottomRightRadius = "10px";
    } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
        panel.style.borderTop = "1px solid";
        panel.style.padding = "1rem 1.5rem";
        document.getElementById("accordion").style.borderBottomLeftRadius = "0";
        document.getElementById("accordion").style.borderBottomRightRadius = "0";
    }
})
document.getElementById("previous").addEventListener("click", function () {
    if (document.getElementById("accordion").classList.contains("active2")) {
        panel.style.maxHeight = null;
        panel.style.borderTop = "1px solid transparent";
        panel.style.padding = "0rem 1.5rem";
        document.getElementById("accordion").style.borderBottomLeftRadius = "10px";
        document.getElementById("accordion").style.borderBottomRightRadius = "10px";
    } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
        panel.style.borderTop = "1px solid";
        panel.style.padding = "1rem 1.5rem";
        document.getElementById("accordion").style.borderBottomLeftRadius = "0";
        document.getElementById("accordion").style.borderBottomRightRadius = "0";
    }
    document.location.href = "?page=courses";
})