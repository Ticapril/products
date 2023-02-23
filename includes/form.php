<main class="container"> 
    <h2 class="mt-3">Create Product</h2>
    <form method="post">
    <!-- SKU -->
    <div class="form-group">
        <label>SKU</label>
        <input type="text" class="form-control" name="sku_product"/>
    </div>
    <!-- NAME -->
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name_product"/>
    </div>
    <!-- PRICE -->
    <div class="form-group">
        <label>Price</label>
        <input type="number" class="form-control" name="price_product"/>
    </div>

      <!-- TYPE PRODUCT -->
      <div class="form-group">
            <label>Type Switcher</label>
            <!-- <select class="form-control" name="specific_product"/> -->
            <select id="types" class="form-select" name="select_specific_products">
                <?php
                    include __DIR__.'/connection.php';
                    $result_specific_products = "SELECT * FROM product_specific";
                    $result = mysqli_query($connection,$result_specific_products);
                    while($row_specific_products = mysqli_fetch_assoc($result)) 
                    { 
                        ?>
                        <option value="<?php echo $row_specific_products['id']; ?>"> <?php echo $row_specific_products['name'];?></option> <?php
                    }
                ?>
            </select>
        </div>
        <hr>
        <div class="row mt-5 ">
            <!-- TAMANHO -->
            <div  class="form-group col">
                <label>SIZE (MB)</label>
                <input id="dvd" type="text" class="form-control" name="tamanho_product_dvd" disabled/>
            </div>
            <!-- TAMANHO -->
            <div class="form-group col">
                <label>Height</label>
                <input id="height"type="text" class="form-control" name="tamanho_product_furniture_height" disabled/>
                <label>Width</label>
                <input id="width" type="text" class="form-control" name="tamanho_product_dvd_furniture_width" disabled/>
                <label>Lenght</label>
                <input id="lenght" type="text" class="form-control" name="tamanho_product_dvd_furniture_lenght" disabled/>
            </div>
            <!-- TAMANHO -->
            <div class="form-group col">
                <label>Weight (KG)</label>
                <input id="book" type="text" class="form-control" name="tamanho_product_book" disabled=""/>
            </div>
        </div>
    </form>
    <section>
        <a href="index.php">
            <button class="btn btn-success">BACK</button>
        </a>
    </section>
</main>