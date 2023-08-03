jQuery(document).ready(function ($) {
  $('.selectedElement').on('click', function(){
    if($(this).prop('checked')){
      $(this).parent().siblings('div').hide();

      let taxonomy = $(this).attr('data-tax');
      let slug = $(this).attr('name');

      $.ajax({
        type: 'POST',
        url: dx.ajaxurl,
        dataType: 'html',
        data:{
          action: 'filter_events',
          taxonomy: taxonomy,
          slug: slug,
        },
        beforeSend: function(){

        },
        success: function(res){
          console.log(res);
          $('.contentWrapper').html(res);
        },
        complete: function(){

        }
      })
    }
    else{
      $(this).parent().siblings('div').show();

      $.ajax({
        type: 'POST',
        url: dx.ajaxurl,
        dataType: 'html',
        data:{
          action: 'all_events',
        },
        beforeSend: function(){

        },
        success: function(res){
          console.log(res);
          $('.contentWrapper').html(res);
        },
        complete: function(){

        }
      })
    }



  });
  $('#changedSelect').on('change', function(){
    let slug = $(this).val();
    let taxonomy = $(this).attr('data-tax');

    $.ajax({
      type: 'POST',
      url: dx.ajaxurl,
      dataType: 'html',
      data:{
        action: 'filter_events',
        taxonomy: taxonomy,
        slug: slug,
      },
      beforeSend: function(){

      },
      success: function(res){
        console.log(res);
        $('.contentWrapper').html(res);
      },
      complete: function(){

      }
    })
  })
});


