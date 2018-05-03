<html>
<head>
    <title>Cart list from ClotheShop</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach ($products as $product) : ?>
        <tr>
            <td><?php echo $product->title ?></td>
            <td> <?php echo $product->price . ' $' ?> </td>

        </tr>
	<?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
