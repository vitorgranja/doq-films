(function($) {

	$(document).ready(function(){

		$(".author_fields button#author_img").on("click", function( e ) {
			
			e.preventDefault();

			var authorImageUpload = wp.media({
				'title' : "Upload Author Image",
				'button' : {
					'text' : "Set Your Image",
				},
				'multiple' : false,
			});

			authorImageUpload.open();

			var button = $(this); 

			authorImageUpload.on("select", function(){

				var image = authorImageUpload.state().get("selection").first().toJSON();

				var image_url = image.url;

				button.next("input.img_link").val( image_url );

				button.parent(".author_fields").find('img').attr('src', image_url );

			});
		});
		
		$("button#author_sign").on("click", function( e ){
			
			e.preventDefault();


			var author_sign = wp.media({
				'title' : "Upload Author Signetures",
				'button' : {
					'text' : "Set Your Signetures",
				},
				'multiple' : false,
			});

			author_sign.open();

			var button = $(this);

			author_sign.on("select", function(){

				var sign = author_sign.state().get("selection").first().toJSON();

				var url = sign.url;

				button.next("input.sign_link").val( url );

				button.parent(".sign").find('img').attr('src', url );

			});
		});


	});

}(jQuery))