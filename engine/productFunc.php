<?php
function getAllProducts()
{
    return queryAll("SELECT * FROM product");
}

function getProductById(int $id)
{
    return queryOne("SELECT * FROM application_db.product WHERE id = {$id}");
}

function getProductByIds(array $ids)
{
    $in = implode(", ", $ids);
    return queryAll("SELECT * FROM application_db.product WHERE id IN ({$in})");
}

function getNameById (int $id) {
   return queryOne("SELECT `name` FROM `product` WHERE id = $id")['name'];
}