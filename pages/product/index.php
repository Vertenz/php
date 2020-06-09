<?php
    $products = getAllProducts();
    echo renderPage('productTeg', ['products' => $products]);
