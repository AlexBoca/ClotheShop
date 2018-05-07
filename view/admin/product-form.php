<?php include "/../header.php" ?>
<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
			<?php
			if (!isset($product)) :
				$product = new \App\Product();
				$action = url('admin/product/store');
			else:
				$action = url('admin/product/update', ['product' => $product->id]);
			endif;
			?>
            <section class="jumbotron text-left">
                <div class="col-sm-5">
                    <h1>Create and edit form. </h1>
                </div>
                <div class="col-sm-5">
                    <form action="<?php echo $action ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input class="form-control" value="<?php echo strip_tags($product->title) ?>" type="text"
                                   name="title">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Description</label>
                            <textarea name="description" class="form-control"
                                      rows="3"><?php echo strip_tags($product->description) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input class="form-control" value="<?php echo strip_tags($product->price) ?>" type="text" name="price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image url</label>
                            <input name="image" type="text" class="form-control"
                                   value="<?php echo strip_tags($product->image) ?>">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="float-right btn btn-outline-secondary" href="<?php echo url('/admin/products') ?>"
                           class="btn btn-primary my-2">Back</a>
                    </form>
                </div>
            </section>
        </div>
    </div>

</main>

<?php include "/../footer.php" ?>












