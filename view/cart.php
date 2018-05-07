<?php include "header.php" ?>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Album example</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the
                    creator,
                    etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                <p>
                    <button type="button" class="btn btn-primary my-2" data-toggle="modal"
                            data-target="#send-email">
                        Send email
                    </button>
                    <a href="<?php echo url('/cart/delete/all') ?>" class="btn btn-danger my-2">Delete All</a>
                </p>
            </div>
        </section>

        <div class="modal fade" id="send-email" tabindex="-1"
             aria-labelledby="send-email-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="send-email-label">Send email form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?php echo url('/cart/send/email') ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="email" value="<?php if (isset($_SESSION['user'])) :
									echo strip_tags($_SESSION['user']->email);
								endif ?>" class="form-control" name="email">
                            </div>

                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th colspan="2" scope="col">Product Name</th>
                                    <th colspan="2" scope="col">Price</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td colspan="2"><?php echo $product->title ?></td>
                                        <td colspan="2"> <?php echo $product->price . ' $' ?> </td>

                                    </tr>
								<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                            </button>
                            <button type="submit" value="Send email" name="send-email" class="btn btn-primary">
                                Send Email
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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