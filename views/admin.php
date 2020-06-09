<section class="center grid">
    <?php foreach ($orders as $order): ?>
        <div class="order">
            <h3>Number <?=$order['number']?></h3>
            <h3>id_product <?=$order['id_product']?></h3>
            <h3>quantity <?=$order['quantity']?></h3>
            <h3>user <?=$order['user_id']?></h3>
            <select name="status" data-id="<?=$order['id']?>" id="status<?=$order['id']?>">
                <option value="<?=$order['status']?>"><?=$order['status']?></option>
                <option value="operation">Operation</option>
                <option value="done">Done</option>
            </select>
            <input type="button" value="del" data-id="<?=$order['number']?>" id="del<?=$order['id']?>" name="delete">
        </div>
        <script>
            $("#del<?=$order['id']?>").on('click', function () {
                let id = $(this).data('id');
                $.ajax({
                    url : "/admin/del",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    success : function (response) {
                        response = JSON.parse(response);
                        if(response.success == 'ok'){
                            alert(response.message)
                        }else {
                            alert('error!');
                        }
                    }
                })
            })

            $(document).on('change', "#status<?=$order['id']?>", function() {
                let selected = $(this).val();
                let id = $(this).data('id');
                $.ajax({
                    url : "/admin/update",
                    type: "POST",
                    data: {
                        number: id,
                        status: selected
                    },
                    success : function (response) {
                        response = JSON.parse(response);
                        if(response.success == 'ok'){
                            alert(response.message)
                        }else {
                            alert('error');
                        }
                    }
                })
            })
        </script>
    <?php endforeach; ?>
</section>
