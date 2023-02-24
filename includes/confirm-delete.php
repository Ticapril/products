<main class="container">
    <h2 class="mt-3">Delete Product</h2>
    <form method="post">
        <div class="form-group">
            <p>You really want to delete the product selected?</p>
    </form>
    <div class="form-group">
        <style>
            .btn-display {
                display: grid;
                grid-auto-flow: column;
                grid-template-columns: 80px;
            }
        </style>
        <section class="form-group btn-display">
            <div>
                <a href="index.php"><button type="button" class="btn btn-success">Cancel</button></a>
            </div>
            <div>
                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
            </div>
        </section>
        </form>
</main>