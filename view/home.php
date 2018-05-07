<?php include "header.php" ?>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Album example</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the
                    creator,
                    etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                <p>
                    <a href="<?php echo url('/test')  ?>" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
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
                                    <p class="card-text"><?php echo $product->description; ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
											<?php if ($_SESSION['cart']->has($product->id)): ?>
                                                <a href="<?php echo url('/cart/delete', ['product' => $product->id]) ?>"
                                                   class="btn btn-sm btn-outline-danger">Remove from Cart
                                                </a>
											<?php else: ?>
                                                <a href="<?php echo url('/cart/store', ['product' => $product->id]) ?>"
                                                   class="btn btn-sm btn-outline-info">Add to Cart
                                                </a>
											<?php endif; ?>
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

<?php include "footer.php" ?>