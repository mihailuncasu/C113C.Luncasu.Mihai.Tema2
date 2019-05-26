function myDropdownFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
$(document).ready($(window).on('load', function () {
    addToCart(-1);
}));


function addToCart(productId) {
    var getUrl = window.location;
    var rootUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    // M: TODO: Break the url;
    $.ajax({
        type: 'post',
        url: rootUrl + "/home/AjaxAddCart",
        data: {
            'id': productId,
        },
        dataType: 'json',
        success: function (data) {
            $('#cart').html(data.content);
        },
        error: function (data) {
            // M: TODO Further implementations;
        }
    })
}

function removeProduct(id) {
    var getUrl = window.location;
    var rootUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    // M: Send ajax request to server to remove the product from session and destroy the parent div;
    $.ajax({
        type: 'post',
        url: rootUrl + "/home/AjaxRemoveCart",
        data: {
            'id': id,
        },
        dataType: 'json',
        success: function (data) {
            // M: TODO: Implement "Item removed with success";
            $('#removeItem-' + id).on("click", function(){
                $(this).parent('div').parent('div').remove();
            })
        }
    })
}

function redirect(newUrl) {
    window.location.replace(newUrl);
}