<div class="single-block">
    <img src="<?=$hrefPreview?>" alt="<?=$productName?>">
    <div class="info">
        <h2 class="info__name"><?=$productName?></h2>
        <h3 class="info__type"><?=$type?></h3>
        <p class="info__descriptions"><?=$descriptions?></p>
    </div>
</div>

<div class="buy">
    <p class="buy_price"><?=$productPrice?>$</p>
    <div class="buy__button"><span>Купить <?=$productName?></span></div>
</div>

<form action="/product.php?id=<?=$id?>" enctype="multipart/form-data" method="post" class="comment-form">
    <label for="namePerson">Ваше имя</label>
    <input type="text" id="namePerson" name="namePerson">
    <label for="comment"><h3>Оставьте комментарий</h3></label>
    <input type="text" id="comment" name="comment">
    <input type="submit">
    <h2 id="status"></h2>
</form>