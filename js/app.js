document.getElementById("productType").onclick = function() {
    const types = {
        "DVD": "#size-div" ,
        "Book": "#weight-div" ,
        "Furniture": "#dimension-div" ,
        "Choose": "#save-product button"
    };
    //I get the selected item from the front-end
    let selectedType = document.getElementById("productType");
    selectedType = selectedType.options[selectedType.selectedIndex].value;
    //I define the types and their respective ids in the front-end
    createAndRemoveForm(selectedType,types[selectedType]); 

    function createAndRemoveForm(type, selector) {   
        document.querySelector('#save-product button').removeAttribute("disabled"); // Remove the disabled attribute
        document.querySelector(selector).classList.remove("d-none");
        if(type == 'DVD') enableElements([types['DVD']])
        else if(type == 'Book')enableElements([types['Book']]);
        else if(type == 'Furniture')enableElements([types['Furniture']]);
        else if(type == 'Choose'){
            document.querySelector('#save-product button').setAttribute("disabled", "");
            disabledAllElements();
        }
    }
    function disabledAllElements(){
        const  className = "d-none";
        document.querySelector(types['DVD']).classList.add(className);
        document.querySelector(types['Book']).classList.add(className);
        document.querySelector(types['Furniture']).classList.add(className);
    }
    function enableElements(arr){
        disabledAllElements();
        arr.forEach(element => {
            document.querySelector(element).classList.remove("d-none");
        });
    }
}