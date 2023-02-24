document.getElementById("productType").onclick = function() {
    var types = document.getElementById("productType");
    console.log('clicou!');
    idType = types.options[types.selectedIndex].value;
    console.log(idType)
    switch (idType) {
        case 'DVD':
            //selecionar todos os forms dentro um array
            console.log(document.getElementById("size").hasAttribute("disabled"))
            if(document.getElementById("size").hasAttribute("disabled")){
                console.log(document.getElementById("size").hasAttribute("disabled"))
                document.getElementById("size").removeAttribute("disabled");
            }
            if(!document.getElementById("weight").hasAttribute("disabled")){
                document.getElementById("weight").setAttribute("disabled", "");
            }
            if(!document.getElementById("height").hasAttribute("disabled")){
                document.getElementById("height").setAttribute("disabled", "");
                document.getElementById("width").setAttribute("disabled", "");
                document.getElementById("lenght").setAttribute("disabled", "");
            }
            break;
        case 'Book':
                //selecionar todos os forms dentro um array
                if(!document.getElementById("size").hasAttribute("disabled")){
                    document.getElementById("size").setAttribute("disabled", "");
                }
                if(document.getElementById("weight").hasAttribute("disabled")){
                    document.getElementById("weight").removeAttribute("disabled");
                }
                if(!document.getElementById("height").hasAttribute("disabled")){
                    document.getElementById("height").setAttribute("disabled", "");
                    document.getElementById("width").setAttribute("disabled", "");
                    document.getElementById("lenght").setAttribute("disabled", "");
                }
            break;
        case 'Furniture':
                if(document.getElementById("height").hasAttribute("disabled")){
                    document.getElementById("height").removeAttribute("disabled");
                    document.getElementById("width").removeAttribute("disabled");
                    document.getElementById("lenght").removeAttribute("disabled");
                }
                if(!document.getElementById("size").hasAttribute("disabled")){
                    document.getElementById("size").setAttribute("disabled", "");
                }
                if(!document.getElementById("weight").hasAttribute("disabled")){
                    document.getElementById("weight").setAttribute("disabled", "");
                }
            break;
    }
}