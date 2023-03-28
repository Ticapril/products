<main class="container">
    <form method="post" id="product_form" action="add-product.php">
        <!-- BUTTON -->
        <section class="btn-group-form-page">
            <h1>Product Add</h1>
            <div class="btn-group-form-page">
            <div id="save-product" class="mt-2"><button type="submit" class="btn btn-success mb-3" disabled>Save</button></div>
            <div class="mt-2"><a href="index.php"><button type="button" class="btn btn-danger">Cancel</button></a></div>
           </div>
        </section>
        <hr>
        <!-- SKU -->
        <div class="form-group">
            <label>SKU</label>
            <input id="sku" type="text" class="form-control" name="sku_product" required />
        </div>
        <!-- NAME -->
        <div class="form-group">
            <label>Name</label>
            <input id="name" type="text" class="form-control" name="name_product" />
        </div>
        <!-- PRICE -->
        <div class="form-group">
            <label>Price</label>
            <input id="price" type="number" class="form-control" name="price_product" required />
        </div>
        <!-- TYPE PRODUCT -->
        <div class="form-group">
            <label>Type Switcher</label>
            <select id="productType" class="form-select" name="select_specific_product">
                <option name="select_option">Choose</option>
                <?php
                use \App\Entity\SpecificProduct;
                $specificProduct = new SpecificProduct();
                $specificProducts = $specificProduct->getCategories();
                foreach ($specificProducts as $specificProduct) {
                    echo '<option name="'.$specificProduct->getName().'">'.$specificProduct->getName().'</option>';
                }
                ?>
            </select>
        </div>
        <hr>
            <div class="row mt-5 ">
                <h2>Product Specific Attributes</h2>
                <!-- SIZE -->
                <div id="size-div" class="form-group col d-none">
                    <label>SIZE (MB)</label>
                    <input id="size" type="number" class="form-control" name="size_product_dvd"  />
                    <p class="mt-2">Please, provide disc space in MB</p>
                </div>
                <!-- DIMENSION -->
                <div id="dimension-div" class="form-group col d-none">
                    <label>Height</label>
                    <input id="height" type="number" class="form-control" name="product_furniture_height"   />
                    <label>Width</label>
                    <input id="width" type="number" class="form-control" name="product_furniture_width"   />
                    <label>Length</label>
                    <input id="length" type="number" class="form-control" name="product_furniture_length"   />
                    <p class="mt-2">Please, provide dimensions in HxWxL format</p>
                </div>
                <!-- WEIGHT -->
                <div id="weight-div" class="form-group col d-none">
                    <label>Weight (KG)</label>
                    <input id="weight" type="number" class="form-control" name="weight_product_book"   />
                    <p class="mt-2">Please, provide weight in Kg</p>
                </div>
            </div>
    </form>
</main>