
document.getElementById("types").onclick = function() {
    var types = document.getElementById("types");
    elementForm = document.getElementById("dvd");
    console.log(elementForm);
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

            break;
        case '2':
                //selecionar todos os forms dentro um array
                if(!document.getElementById("dvd").hasAttribute("disabled")){
                    document.getElementById("dvd").setAttribute("disabled", "");
                }
                if(document.getElementById("book").hasAttribute("disabled")){
                    document.getElementById("book").removeAttribute("disabled");
                }
            break;
        case '3':
       
            break;
    }
 
};