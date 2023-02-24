<main class="container">

    <form method="post" id="product_form">
        <!-- BUTTON -->
       
        <section class="btn-group-form-page">
            <h1>Product Add</h1>
            <div class="btn-group-form-page">
            <div class="mt-2"><button type="submit" class="btn btn-success mb-3">SAVE</button></div>
            <div class="mt-2"><a href="index.php"><button type="button" class="btn btn-danger">CANCEL</button></a></div>
           </div>
            
            
            
        </section>
        <hr>
   
        <!-- SKU -->
        <div class="form-group">
            <label>SKU</label>
            <input id="sku" type="text" class="form-control" name="sku_product" />
        </div>
        <!-- NAME -->
        <div class="form-group">
            <label>Name</label>
            <input id="name" type="text" class="form-control" name="name_product" />
        </div>
        <!-- PRICE -->
        <div class="form-group">
            <label>Price</label>
            <input id="price" type="number" class="form-control" name="price_product" />
        </div>
        <!-- TYPE PRODUCT -->
        <div class="form-group">
            <label>Type Switcher</label>
            <select id="productType" class="form-select" name="select_specific_product">
                <?php
                use \App\Entity\SpecificProduct;
                $Test = new SpecificProduct();
                $specificProducts = $Test->getCategories();
                foreach ($specificProducts as $specificProduct) {
                    echo '<option>'.$specificProduct->getName().'</option>';
                }
                ?>
            </select>
        </div>
        <hr>
        <div class="row mt-5 ">
            <h2>Product Specific Attributes</h2>
            <!-- SIZE -->
            <div class="form-group col">
                <label>SIZE (MB)</label>
                <input id="size" type="text" class="form-control" name="tamanho_product_dvd" disabled />
            </div>
            <!-- DIMENSION -->
            <div class="form-group col">
                <label>Height</label>
                <input id="height" type="text" class="form-control" name="tamanho_product_furniture_height" disabled />
                <label>Width</label>
                <input id="width" type="text" class="form-control" name="tamanho_product_furniture_width" disabled />
                <label>Lenght</label>
                <input id="lenght" type="text" class="form-control" name="tamanho_product_furniture_lenght" disabled />
            </div>
            <!-- WEIGHT -->
            <div class="form-group col">
                <label>Weight (KG)</label>
                <input id="weight" type="text" class="form-control" name="tamanho_product_book" disabled />
            </div>
        </div>
   
    </form>
</main>