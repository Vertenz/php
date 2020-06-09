<section class="product center" xmlns="">
    <div class="single-block">
        <img src="../<?= $product['hrefPreview'] ?>" alt="<?= $product['name'] ?>">
        <div class="info">
            <h2 class="info__name"><?= $product['name'] ?></h2>
            <h3 class="info__type"><?= $product['type'] ?></h3>
            <p class="info__descriptions"><?= $product['descriptions'] ?></p>
        </div>
    </div>

    <div class="buy">
        <p class="buy_price"><?= $product['price'] ?>$</p>
        <div class="buy__button"><span> <?= $product['name'] ?></span></div>
<!--        <form action="/cart/add?id=--><?//= $product['id'] ?><!--" method="post">-->
<!--            <input type="number" id="quantity" name="quantity">-->
<!--            <input id="add_to_card" data-id="--><?//=$product['id']?><!--" type="submit" value="В корзину">-->
<!--            <input type="submit" value="Купить">-->
<!--        </form>-->
        <div>
            <input id="qty_input" type="text" name="qty">
            <input id="add_to_card" data-id="<?=$product['id']?>" type="submit" value="Добавить в корзину">
        </div>
    </div>

    <form action="/product/comment?id=<?= $product['id'] ?>" enctype="multipart/form-data" method="post" class="comment-form">
        <label for="namePerson">Ваше имя</label>
        <input type="text" id="namePerson" name="namePerson">
        <label for="comment"><h3>Оставьте комментарий</h3></label>
        <input type="text" id="comment" name="comment">
        <input type="submit">
        <h2 id="status"></h2>
    </form>
</section>

<script>
    $(function () {
        $("#add_to_card").on('click', function () {
            let id = $(this).data('id');
            let qty = $("#qty_input").val();
            $.ajax({
                url : "/cart/add",
                type: "POST",
                data: {
                    product_id: id,
                    qty: qty
                },
                success : function (response) {
                    response = JSON.parse(response);
                    if(response.success == 'ok'){
                        alert(response.message)
                    }
                }
            })
        })
    })
</script>