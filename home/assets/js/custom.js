$(document).ready(function(){

    $('.increment-btn').click(function(e){
    
        e.preventDefault();
        var qty= $(this).closest('.product-data').find('.input-qty').val();
        var value= parseInt(qty,10);
        value= isNaN(value) ? 0: value;
        if(value<10)
        {
            value++;
            $(this).closest('.product-data').find('.input-qty').val(value);
        }
    });
    
    $('.decrement-btn').click(function(event){
        event.preventDefault();
        var qty= $(this).closest('.product-data').find('.input-qty').val();
        var value= parseInt(qty,10);
        value= isNaN(value) ? 0: value;
        if(value>1)
        {
            value--;
            $(this).closest('.product-data').find('.input-qty').val(value);
        }
    
    });
    
    $('.addToCartBtn').click(function(e){
    var prod_id= $(this).val();
    
    $.ajax({
        method: "POST",
        url: "handle_cart.php",
        data: {
            "prod_id" : prod_id,
            "scope" : "add"
        },
        
        success: function(response){
    
            if(response == 201)
            {
                location.reload();
                alertify.set('notifier','position', 'top-right');
                alertify.success('Product added to cart');
            }
    
           else if(response == 401)
            {
                alertify.set('notifier','position', 'top-right');
                alertify.success('Login to continue');
            }
    
            else if(response == "existing")
           {
                alertify.set('notifier','position', 'top-right');
                alertify.success('Product already in cart');
           }
    
           else if(response == 500)
           {
            alertify.set('notifier','position', 'top-right');
            alertify.success('Something went wrong');
           }
    
    
        }
    });
    
    });

    $('.remove').click(function(e){
        var prod_id= $(this).val();
        
        $.ajax({
            method: "POST",
            url: "handle_cart.php",
            data: {
                "prod_id" : prod_id,
                "scope" : "remove"
            },
            success: function(response){
                
                if(response == 201)
                {
                    location.reload();
                    alertify.set('notifier','position', 'top-right');
                    alertify.success('Product removed from cart');
                }
        
                else if(response == 401)
                {
                    alertify.set('notifier','position', 'top-right');
                    alertify.success('Login to continue');
                }
        
                else if(response == 500)
                {
                    alertify.set('notifier','position', 'top-right');
                    alertify.success('Something went wrong');
                }
            }
        });
            
    });

    let $qtyIncr = $('.qtyIncr');
    let $qtyDecr = $('.qtyDecr');
    let $subTotal = $('.subTotal');
    let $totalPrice = $('.totalPrice');
    $qtyIncr.click(function(e){

        let $input = $(`.qtyInput[data-id='${$(this).data("id")}']`);
        let $productPrice = $(`#productPrice[data-id='${$(this).data("id")}']`);
        $.ajax({
            url: "handle_cart.php",
            type: "POST",
            data: {
                scope: "increment",
                product_id:$(this).data('id')
            },
            success: function(result){
                let object = JSON.parse(result);

                let product_price = object[0]['price'];
                if($input.val()>=1 && $input.val()<=10){
                    $input.val(function(i, oldval){
                            return ++oldval;
                    });
                    $productPrice.text('₹'+parseInt(product_price * $input.val()).toLocaleString());
                    let subTotalAmount = parseInt($subTotal.text()) + parseInt(product_price);
                    $subTotal.text(subTotalAmount);
                    $totalPrice.text(subTotalAmount);
                }
            }
        });

    });

    $qtyDecr.click(function(e){

        let $input = $(`.qtyInput[data-id='${$(this).data("id")}']`);
        let $productPrice = $(`#productPrice[data-id='${$(this).data("id")}']`);
        if($input.val() > 1) {
            $.ajax({
                url: "handle_cart.php",
                type: "POST",
                data: {
                    scope: "decrement",
                    product_id:$(this).data('id')
                },
                success: function(result){
                    let object = JSON.parse(result);
                    let product_price = object[0]['price'];
                    if($input.val() > 1 && $input.val()<=11){
                        $input.val(function(i, qtynos){
                            return --qtynos;
                        });
                        $productPrice.text('₹'+parseInt(product_price * $input.val()).toLocaleString());
                        let subTotalAmount = parseInt($subTotal.text()) - parseInt(product_price);
                        $subTotal.text(subTotalAmount);
                        $totalPrice.text(subTotalAmount);
                    }
                }
            });
        } else {
            alert("Can't decrement product quantity below 1")
        }

    });
    
});