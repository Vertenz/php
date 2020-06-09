<?php
    function addToOrder (int $number, int $productId, int $quantity, int $user_id) {
        $sql = (string) "INSERT INTO `orders` (number, id_product, quantity, user_id)
                VALUES ('$number','$productId', '$quantity', '$user_id')";
        if (!$user_id) {
            session_destroy();
        }
        return execute($sql);
    };

function getOrderNumber () {
    $numeric = queryOne("SELECT `number` FROM `orders` ORDER BY number DESC ")['number'];
        return $number = $numeric + 5;
};

function pushUsersOrder ($number, $user) {
    $order = queryArray("SELECT * FROM application_db.cart WHERE user = {$user}");
    foreach ($order as $element) {
        $id = (int) $element['id_product'];
        $qty = (int) $element['quantity'];
        $user = (int) $element['user'];
        addToOrder($number, $id, $qty, $user);
        deleteCart($id, $user);
    }
};

function deleteOrder(int $deleteId) {
    return mysqli_query(getConnection(), "DELETE FROM application_db.orders WHERE number = {$deleteId}");
};

function updateStatus(int $number, string $status) {
    return execute("UPDATE application_db.orders SET status = '$status' WHERE id = {$number}");
};


function getAllOrder() {
    return queryAll("SELECT * FROM orders");
}