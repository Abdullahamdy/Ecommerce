$(".signup").click(function () {
	$(".log").modal("hide");
});
$(function () {
	function maskImgs() {
		//$('.img-wrapper img').imagesLoaded({}, function() {
		$.each($('.img-wrapper img'), function (index, img) {
			var src = $(img).attr('src');
			var parent = $(img).parent();
			parent
				.css('background', 'url(' + src + ') no-repeat center center')
				.css('background-size', 'cover');
			$(img).remove();
		});
		//});
	}

	var preview = {
		init: function () {
			preview.setPreviewImg();
			preview.listenInput();
		},
		setPreviewImg: function (fileInput) {
			var path = $(fileInput).val();
			var uploadText = $(fileInput).siblings('.file-upload-text');

			if (!path) {
				$(uploadText).val('');
			} else {
				path = path.replace(/^C:\\fakepath\\/, "");
				$(uploadText).val(path);

				preview.showPreview(fileInput, path, uploadText);
			}
		},
		showPreview: function (fileInput, path, uploadText) {
			var file = $(fileInput)[0].files;

			if (file && file[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					var previewImg = $(fileInput).parents('.file-upload-wrapper').siblings('.preview');
					var img = $(previewImg).find('img');

					if (img.length === 0) {
						$(previewImg).html('<img src="' + e.target.result + '" alt=""/>');
					} else {
						img.attr('src', e.target.result);
					}

					uploadText.val(path);
					maskImgs();
				};

				reader.onloadstart = function () {
					$(uploadText).val('uploading..');
				};

				reader.readAsDataURL(file[0]);
			}
		},
		listenInput: function () {
			$('.file-upload-native').on('change', function () {
				preview.setPreviewImg(this);
			});
		}
	};
	preview.init();
});

function preview_image(ele) {
	console.log($(ele).parent().next().children(".image_preview"));

	var total_file = document.getElementById("upload_file").files.length;
	for (var i = 0; i < total_file; i++) {
		let imageSrc = URL.createObjectURL(event.target.files[i]);
		$($(ele).parent().next().children(".image_preview")).append(
			`<div class="image-parent col-lg-6 col-md-6 col-sm-12">
                                        <div class="card">
                                            <img class="w-100 mb-3" src="` +
			imageSrc +
			`">
                                            <div class='card-body d-flex justify-content-between'>
                                                <button class="btn text-danger bg-transparent" onclick="deleteImage(this)"><i class="fas fa-trash-alt fa-lg"></i></button>
                                                 <div class="check-photo"><input type="radio" name="image_preview_product" class="text-dark checkbox"><h6>اختيار واحدة صورة لتكون الاساسية</h6></div>
                                            </div>
                                        </div>
                                    </div>`
		);
	}
}

function deleteImage(ele) {
	console.log($(ele).parents(".image-parent"));
	console.log(
		$(ele)
		.parents(".all-model")
		.prev()
		.children(".imgdiv")
		.children(".mainImg")
		.attr("src")
	);

	if (
		$(ele).parent().prev().attr("src") ===
		$(ele)
		.parents(".all-model")
		.prev()
		.children(".imgdiv")
		.children(".mainImg")
		.attr("src")
	) {
		$(ele)
			.parents(".all-model")
			.prev()
			.children(".imgdiv")
			.children(".mainImg")
			.attr("src", "img/placeholder.webp");
		$(ele).parents(".image-parent").remove();
	} else {
		$(ele).parents(".image-parent").remove();
	}

	$($(ele).parents(".image-parent")).remove();
}
$('.slider-for').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: false,
	fade: true,
	asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
	slidesToShow: 4,
	slidesToScroll: 1,
	vertical: true,
	asNavFor: '.slider-for',
	dots: false,
	focusOnSelect: true,
	verticalSwiping: true,
	responsive: [{
			breakpoint: 992,
			settings: {
				vertical: false,
			}
		},
		{
			breakpoint: 768,
			settings: {
				vertical: false,
			}
		},
		{
			breakpoint: 580,
			settings: {
				vertical: false,
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 380,
			settings: {
				vertical: false,
				slidesToShow: 2,
			}
		}
	]
});
$(".btnsearch").on("click", function () {
	$(".input").toggleClass("inclicked");
	$(".btnsearch").toggleClass("close");
});



