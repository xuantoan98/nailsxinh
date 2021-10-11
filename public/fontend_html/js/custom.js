$(document).on('ready', function() {

    $(".hero-items").owlCarousel({

        navigation: false, // Show next and prev buttons
        slideSpeed: 200,
        paginationSpeed: 400,
        singleItem: true,
        pagination: true,
        autoPlay: true,
        navigationText: ["<i class='fa fa-arrow-circle-left'></i>", "<i class='fa fa-arrow-circle-right'></i>"],
        addClassActive: true

    });
});





