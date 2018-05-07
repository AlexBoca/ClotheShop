<?php


include "/../header.php" ?>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Go to create a product</h1>
            <a href="<?php echo url('/admin/product/create') ?>" class="btn btn-primary my-2">Create</a>
            </p>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
				<?php
				foreach ($products as $product) : ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                 alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                                 src="<?php echo $product->image; ?>"
                                 data-holder-rendered="true">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $product->title; ?></h5>
                                <p class="card-text" li><?php echo $product->description; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?php echo url('/admin/product/edit', ['product' => $product->id]) ?>"
                                           class="btn btn-sm btn-outline-info">Edit
                                        </a>
                                        <a href="<?php echo url('/admin/product/delete', ['product' => $product->id]) ?>"
                                           class="btn btn-sm btn-outline-danger">Delete
                                        </a>
                                    </div>
                                    <h6 class="text-muted"><?php echo $product->price . ' $'; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>

				<?php endforeach; ?>
            </div>
        </div>
    </div>

</main>

<?php include "/../footer.php" ?>












