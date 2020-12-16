$(document).ready(function() {


    var numberOfItems = $('#content .content-item').length; // Get total number of the items that should be paginated
    var limitPerPage = 6; // Limit of items per each page
    $('#content .content-item:gt(' + (limitPerPage - 1) + ')').hide(); // Hide all items over page limits (e.g., 5th item, 6th item, etc.)
    var totalPages = Math.ceil(numberOfItems / limitPerPage); // Get number of pages



    $('.pagination').append("<li class='page-item current-page active'><a class='page-link' href='jacascript:void(0)'>" + 1 + "</a></li>");
    if (totalPages > 1) {
        for (var i = 2; i <= totalPages; i++) {
            $('.pagination').append("<li class='page-item current-page'><a class='page-link' href='jacascript:void(0)'>" + i + "</a></li>");
        }
    }

    $('.pagination').append(" <li id='next-page' class='page-item'><a class='page-link' href='jacascript:void(0)' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>");

// Function that displays new items based on page number that was clicked
    $(".pagination li.current-page").on("click", function () {
        // Check if page number that was clicked on is the current page that is being displayed
        if ($(this).hasClass('active')) {
            return false; // Return false (i.e., nothing to do, since user clicked on the page number that is already being displayed)
        } else {
            var currentPage = $(this).index(); // Get the current page number
            $(".pagination li").removeClass('active'); // Remove the 'active' class status from the page that is currently being displayed
            $(this).addClass('active'); // Add the 'active' class status to the page that was clicked on
            $("#content .content-item").hide(); // Hide all items in loop, this case, all the list groups
            var grandTotal = limitPerPage * currentPage; // Get the total number of items up to the page number that was clicked on

            // Loop through total items, selecting a new set of items based on page number
            for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
                $("#content .content-item:eq(" + i + ")").show(); // Show items from the new page that was selected
            }
        }

    });
    $("#next-page").on("click", function () {
        console.log('fdssd');
        var currentPage = $(".pagination li.active").index(); // Identify the current active page
        // Check to make sure that navigating to the next page will not exceed the total number of pages
        if (currentPage === totalPages) {
            return false; // Return false (i.e., cannot navigate any further, since it would exceed the maximum number of pages)
        } else {
            currentPage++; // Increment the page by one
            $(".pagination li").removeClass('active'); // Remove the 'active' class status from the current page
            $("#content .content-item").hide(); // Hide all items in the pagination loop
            var grandTotal = limitPerPage * currentPage; // Get the total number of items up to the page that was selected

            // Loop through total items, selecting a new set of items based on page number
            for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
                $("#content .content-item:eq(" + i + ")").show(); // Show items from the new page that was selected
            }

            $(".pagination li.current-page:eq(" + (currentPage - 1) + ")").addClass('active'); // Make new page number the 'active' page
        }
    });

// Function to navigate to the previous page when users click on the previous-page id (previous page button)
    $("#prev-page").on("click", function () {
        var currentPage = $(".pagination li.active").index(); // Identify the current active page
        console.log(currentPage);
        // Check to make sure that users is not on page 1 and attempting to navigating to a previous page
        if (currentPage === 1) {
            return false; // Return false (i.e., cannot navigate to a previous page because the current page is page 1)
        } else {
            currentPage--; // Decrement page by one
            $(".pagination li").removeClass('active'); // Remove the 'activate' status class from the previous active page number
            $("#content .content-item").hide(); // Hide all items in the pagination loop
            var grandTotal = limitPerPage * currentPage; // Get the total number of items up to the page that was selected

            // Loop through total items, selecting a new set of items based on page number
            for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
                $("#content .content-item:eq(" + i + ")").show(); // Show items from the new page that was selected
            }

            $(".pagination li.current-page:eq(" + (currentPage - 1) + ")").addClass('active'); // Make new page number the 'active' page
        }
    });

});
