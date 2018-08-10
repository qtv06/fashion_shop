$(document).ready(function() {
  var items = $('.category-item');
  $('.category-item').on('click', function(event) {
    event.preventDefault();
    var categroy_id = $(this).attr('data-type');
    for(var i = 0;i<items.length; i++){
      $(items[i]).removeClass('active');
    }
    $(this).addClass('active');
    $.ajax({
      url: 'load_product_by_category.php',
      type: 'GET',
      data: {categroy_id_load: categroy_id},
      success: function(result){
        // console.log(result);s
        $('.product-table tbody').html(result);
      },
      error: function(result) {
        console.log(result);
      }
    })
  });
});
