function myDropdownFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

$(window).on('load', function (){
    addToCart(-1);
});

function addToCart(productId) {
    
    rootUrl = window.location.href.match(/^.*\//);
    // M: TODO: Break the url;
    $.ajax({
        type: 'post',
        url: rootUrl + "home/AjaxAddCart",
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
    // M: Send ajax request to server to remove the product from session and destroy the parent div;
    $('#removeItem').click(function(event) {
        $(this).parent('div').parent('div').remove();
    })
    $.ajax({
        type: 'post',
        url: "home/AjaxRemoveCart",
        data: {
            'id': id,
        },
        dataType: 'json',
        success: function (data) {
            // M: TODO: Implement "Item removed with success";
        }
    })
}