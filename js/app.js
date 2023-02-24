document.getElementById("types").onclick = function() {
    var types = document.getElementById("types");
    idType = types.options[types.selectedIndex].value;
    switch (idType) {
        case '1':
            //selecionar todos os forms dentro um array
            if(document.getElementById("dvd").hasAttribute("disabled")){
                document.getElementById("dvd").removeAttribute("disabled");
            }
            if(!document.getElementById("book").hasAttribute("disabled")){
                document.getElementById("book").setAttribute("disabled", "");
            }
            if(!document.getElementById("height").hasAttribute("disabled")){
                document.getElementById("height").setAttribute("disabled", "");
                document.getElementById("width").setAttribute("disabled", "");
                document.getElementById("lenght").setAttribute("disabled", "");
            }
            break;
        case '2':
                //selecionar todos os forms dentro um array
                if(!document.getElementById("dvd").hasAttribute("disabled")){
                    document.getElementById("dvd").setAttribute("disabled", "");
                }
                if(document.getElementById("book").hasAttribute("disabled")){
                    document.getElementById("book").removeAttribute("disabled");
                }
                if(!document.getElementById("height").hasAttribute("disabled")){
                    document.getElementById("height").setAttribute("disabled", "");
                    document.getElementById("width").setAttribute("disabled", "");
                    document.getElementById("lenght").setAttribute("disabled", "");
                }
            break;
        case '3':
                if(document.getElementById("height").hasAttribute("disabled")){
                    document.getElementById("height").removeAttribute("disabled");
                    document.getElementById("width").removeAttribute("disabled");
                    document.getElementById("lenght").removeAttribute("disabled");
                }
                if(!document.getElementById("dvd").hasAttribute("disabled")){
                    document.getElementById("dvd").setAttribute("disabled", "");
                }
                if(!document.getElementById("book").hasAttribute("disabled")){
                    document.getElementById("book").setAttribute("disabled", "");
                }
            break;
    }
}