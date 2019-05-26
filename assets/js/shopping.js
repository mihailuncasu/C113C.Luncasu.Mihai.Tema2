function submitCart(productId) {
    var getUrl = window.location;
    var rootUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var quantity = $('#quantity-' + productId).val();
    var price = $('#product-price-' + productId).text();
    // M: TODO: Break the url;
    $.ajax({
        type: 'post',
        url: rootUrl + "/home/ajaxshoppingadd",
        data: {
            'id': productId,
            'quantity': quantity
        },
        dataType: 'json',
        success: function (data) {
            if (quantity == 0) {
                $('#product-' + productId).remove();
            } else {
                $('#subtotal-' + productId).html(quantity * price);
            }
            $('td[name=total-sum]').html('<strong>Total ' + data.total + ' lei</strong>');
        },
        error: function (data) {
            alert('Eroare interna! Incercati din nou!');
        }
    })
}

function checkout() {
    var getUrl = window.location;
    var rootUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    $.ajax({
        type: 'post',
        url: rootUrl + "/home/ajaxcheckout",
        success: function (data) {
            $('#message').removeClass('hidden-content');
            $('#cart').addClass('hidden-content');
        },
        error: function (data) {
            alert('Eroare interna! Incercati din nou!');
        }
    })
}