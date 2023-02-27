document.getElementById("productType").onclick = function() {
    //recebo do front-end o item selecionado
    let selectedType = document.getElementById("productType");
    selectedType = selectedType.options[selectedType.selectedIndex].value;
    //defino os tipos e os seus respectivos ids no front-end
    const types =
    {
        "DVD": "#size-div" ,
        "Book": "#weight-div" ,
        "Furniture": "#dimension-div" ,
        "select_option": "#save-product button"
    };
    createAndRemoveForm(selectedType,types[selectedType]);  
    function createAndRemoveForm(type, selector) {
        const className = "d-none";
        document.querySelector('#save-product button').removeAttribute("disabled"); // removo o atributo disabled
        document.querySelector(selector).classList.remove("d-none");
        if(type == 'DVD')addClass(types['Book'],types['Furniture'], className);
        else if(type == 'Book')addClass(types['DVD'],types['Furniture'], className);
        else if(type == 'Furniture')addClass(types['DVD'],types['Book'], className);
        else if(type == 'select_option'){
            document.querySelector('#save-product button').setAttribute("disabled", "");
            addClass(types['DVD'], types['Book'], types['Furniture'], className);
        }
    }
    function addClass(selectorOne,selectorTwo,className){
        document.querySelector(selectorOne).classList.add(className);
        document.querySelector(selectorTwo).classList.add(className);
    }
    function addClass(selectorOne,selectorTwo,selectorThree,className){
        console.log(selectorOne, selectorTwo, selectorThree, className);
        document.querySelector(selectorOne).classList.add(className);
        document.querySelector(selectorTwo).classList.add(className);
        document.querySelector(selectorThree).classList.add(className);
    }
}