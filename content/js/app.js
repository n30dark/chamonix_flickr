$(function() {

   $.getJSON("generate_html.php?action=getFlickrImages",  function( data ) {

       $.each( data, function( i, item ) {
           console.log(JSON.stringify(item));
           $("<a id='" + i + "' href='" + item.link[0] + "'><span>" + item.title[0]  + " by " + item.author[0] + "</span><div class='icon fa fa-camera-retro'></div><img class='flickrpic' src='" + item.image[0] + "'>").appendTo( ".gallery" );
           if((i+1)%5==0) {
               $("<br/>").appendTo(".gallery");
           }
       });
   });

});