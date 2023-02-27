<form name="del-car" method="post" action="delete_mass.php">
<?php
    $result = '';
    foreach ($products as $product) {
        $result .= '
                       <div class="card text-bg-light mb-3 col">
                            <div class="card-header"><li class="list-group-item">
                                    <input name="id[' . $product->getId() . ']" class="form-check-input delete-checkbox" type="checkbox" value="">
                            </li>
                            </div>
                                <div class="card-body text-center">
                                    <p class="card-text">' . strtoupper($product->getSku()) . '</p>
                                    <p class="card-text">' . $product->getName() . '</p>
                                    <p class="card-text">' . number_format($product->getPrice(), 2) . ' $</p>
                                    <p class="card-text">' . $product->getMeasure() . '</p>
                                </div>
                            </div>
                        </div>
                ';
    }
?>
    <main>
        <section class="btn-group-form-page mt-3">
                <h1>Product List</h1>
                <div class="btn-group-form-page">
                <div><a href="process-product.php"><button type="button" class="btn btn-success mb-3">ADD</button></a></div>
                <div><a href="delete_mass.php"><button name="del-product" class="btn btn-danger mb-3" id="delete-product-btn">MASS DELETE</button></a></div>
            </div>
        </section>
    <hr>
</form>
<section id="section-cards" class="wrapper">
    <?= $result ?>
</section>
</main>