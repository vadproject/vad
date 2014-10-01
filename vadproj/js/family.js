var panels = new Array("","panel1","panel2","panel3","panel4","panel5");

function panel(tab) {
    for (i=1; i<panels.length; i++) {
        if (i == tab) {
            document.getElementById("panel"+i).style.display = "block";
        } else {
            document.getElementById("panel"+i).style.display = "none";
        }
    }
}
