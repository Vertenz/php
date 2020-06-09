<?php
function findInCartById (int $productId) {
   return queryArray("SELECT 'quantity' FROM application_db.cart WHERE user = '$_SESSION[user_id]' && id_product = '$productId'");
};

function addNewInCart(int $productId, int $productQty) {
    $sql = (string) "INSERT INTO application_db.cart (id_product, quantity, user)
                VALUES ('$productId', '$productQty', '$_SESSION[user_id]')";
   return execute($sql);
};

function plusQtyInCart(int $productId, int $productQty) {
   return execute("UPDATE application_db.cart SET quantity = quantity + $productQty WHERE id_product = '$productId' && user = '$_SESSION[user_id]'");
};

function findeInCartByUser() {
    $user = (int) $_SESSION['user_id'];
    $sql = (string) "SELECT `id_product`, `quantity` FROM `cart` WHERE user = $user";
    return queryArray($sql);
}

function deleteCart($deleteId, $user) {
    return mysqli_query(getConnection(), "DELETE FROM application_db.cart WHERE id_product = '$deleteId' && user = '$user'");
}