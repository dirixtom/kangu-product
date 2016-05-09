// Loading all of the adverts

$(document).ready(function() {
	var filter = "";

	$(".advert-overview-container").load("../php-assets/class.adverts.pagination.php");

	$(".advert-overview-container").on("change", ".advert-overview-filter", function(e) {
		e.preventDefault();
		filter = $(this).val();

		$.ajax({
			type: 'post',
			dataType: 'html',
			url: '../php-assets/class.adverts.pagination.php',
			data: {chosenFilter:filter},
			cache: false,
			success: function(response) {
				$(".advert-overview-container").html(response);
				$(".advert-overview-filter").val(filter);
			}
		});
	});

	$(".advert-overview-container").on("click", ".pagination a", function (e) {
		e.preventDefault();
		var page = $(this).attr("data-page");

		if (!filter) {
			$(".advert-overview-container").load("../php-assets/class.adverts.pagination.php", {page:page});
		}
		else if (filter) {
			$(".advert-overview-container").load("../php-assets/class.adverts.pagination.php", {page:page, chosenFilter:filter});
		}
	});
});