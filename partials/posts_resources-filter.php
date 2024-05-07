<div class="info-support-filter row mt-2">
        <ul class="justify-content-center align-items-center flex-wrap d-none d-md-flex">

                <?php
                // Example array of categories (replace this with your actual data)
                $terms = get_terms([
                        'taxonomy' => 'resources_cat', // Swap in your custom taxonomy name
                ]);
                echo '<li class="me-2 px-3 py-2 m-0 br-4 bp-1 mt-3 all-posts-filter-li"><a class="fs-1 primary-color text-center fw-400" id="all-posts-filter" >' . 'All' . '</a></li>';
                // Loop through the categories and generate li elements dynamically
                foreach ($terms as $category) {
                        echo '<li class="me-2 px-3 py-2 m-0 br-4 bp-1 mt-3 category-filter-li"><a class="fs-1 primary-color text-center fw-400 category-filter" data-category="' . $category->slug . '">' . $category->name . '</a></li>';

                }
                ?>
        </ul>

         <!-- Dropdown for mobile -->
    <select class="form-select d-md-none mt-2 mb-4" id="mobile-filter-dropdown">
        <option value="">All</option>
        <?php
        foreach ($terms as $category) {
            echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
        }
        ?>
    </select>

</div>

 

<script>

$(document).ready(function () {
    function filterPosts(category) {
        // Show loader
        showLoader();

        // Update the URL based on the selected category
        var newUrl = updateQueryStringParameter(window.location.href, 'category', category);
        history.pushState(null, null, newUrl);

        // Perform AJAX request to fetch filtered posts
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'filter_posts',
                category: category,
            },
            success: function (response) {
                // Update the content of the container with the fetched posts
                $('#filtered-posts-container').html(response);
            },
            error: function (error) {
                console.error('Error fetching posts:', error);
            },
            complete: function () {
                // Hide loader in both success and error cases
                hideLoader();
            }
        });
    }

    // Function to update query string parameters
    function updateQueryStringParameter(uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            return uri + separator + key + "=" + value;
        }
    }

    // Function to show the loader
    function showLoader() {
        $('#loader-overlay').show();
    }

    // Function to hide the loader
    function hideLoader() {
        $('#loader-overlay').hide();
    }

    // Click event for category filters
    $('.category-filter').on('click', function (e) {
        e.preventDefault();
        var category = $(this).data('category');
        filterPosts(category);
        // Remove active class from all tabs
        $('.category-filter').removeClass('active');
        // Add active class to the clicked tab
        $(this).addClass('active');
    });

    $('#all-posts-filter').on('click', function (e) {
        e.preventDefault();
        var category = ''; // Set to empty string or any value that represents all posts
        filterPosts(category);
        // Remove active class from all tabs
        $('.category-filter').removeClass('active');
        // Add active class to the "All" tab
        $(this).addClass('active');
    });

    // Change event for mobile filter dropdown
    $('#mobile-filter-dropdown').on('change', function () {
        var category = $(this).val();
        filterPosts(category);
    });

});

$(document).ready(function () {
    // Click event for category filters
    $('.category-filter').on('click', function (e) {
        e.preventDefault();
        
        // Remove active class from all tabs
        $('.category-filter').removeClass('active').parent('li').removeClass('active');
        
        // Add active class to the clicked tab
        $(this).addClass('active').parent('li').addClass('active');
    });

    $('#all-posts-filter').on('click', function (e) {
        e.preventDefault();
        
        // Remove active class from all tabs
        $('.category-filter').removeClass('active').parent('li').removeClass('active');
        
        // Add active class to the "All" tab
        $(this).addClass('active').parent('li').addClass('active');
    });
});

$(document).ready(function () {
    // Add active class to "All Posts" filter link and its parent li on page load
    $('#all-posts-filter').addClass('active').parent('li').addClass('active');

    // Click event for category filters
    $('.category-filter').on('click', function (e) {
        e.preventDefault();

        // Remove active class from all category filter links and their parent lis
        $('.category-filter-li').removeClass('active');
        $('.category-filter').removeClass('active');

        // Add active class to the clicked filter link and its parent li
        $(this).addClass('active').parent('li').addClass('active');

        // Remove active class from "All Posts" filter link and its parent li
        $('#all-posts-filter').removeClass('active').parent('li').removeClass('active');
    });
});



</script>