<div class="info-support-filter col-md-8  mt-2">
    <ul class="justify-content-start align-items-center flex-wrap d-none d-md-flex p-0">

        <?php
        // Example array of categories (replace this with your actual data)
        $terms = get_terms([
            'taxonomy' => 'category', // Swap in your custom taxonomy name
        ]);
        echo '<li class="me-1 px-2 py-2 m-0 br-4 bp-1 mt-3 all-posts-filter-li"><a class="black-btn primary-btn text-center fw-bold" id="all-posts-filter" >' . 'All' . '</a></li>';
        // Loop through the categories and generate li elements dynamically
        foreach ($terms as $category) {
            echo '<li class="me-1 px-2 py-2 m-0 br-4 bp-1 mt-3 category-filter-li"><a class="black-btn primary-btn text-center fw-bold category-filter" data-category="' . $category->slug . '">' . $category->name . '</a></li>';

        }
        ?>
    </ul>
 
    <!-- Dropdown for mobile -->
    <select class="form-select d-md-none mt-2 mb-4 br-4 text-white" id="mobile-filter-dropdown"
        style="background-image: url(<?php echo get_site_url(); ?>/wp-content/uploads/2024/04/filter-dropdown-bg.svg); background-position: center; background-size: cover; background-repeat: no-repeat;">
        <option value="">All</option>
        <?php
        foreach ($terms as $category) {
            echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
        }
        ?>
    </select>
</div>

<div class="col-md-4">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="input-group search-bar">
            <input type="text" value="<?php echo get_search_query(); ?>" name="s" class="form-control br-4 fs-3" placeholder="Search">
            <button type="submit" value="Search" class="primary-bg br-4 px-3 py-2 search-btn">
                <i class="fa-solid fa-magnifying-glass fs-3"></i>
            </button>
            <input type="hidden" name="post_type" value="post">
        </div>
    </form>
</div>




<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

    jQuery(document).ready(function () {
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
                    jQuery('#filtered-posts-container').html(response);
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
            jQuery('#loader-overlay').show();
        }

        // Function to hide the loader
        function hideLoader() {
            jQuery('#loader-overlay').hide();
        }

        // Click event for category filters
        jQuery('.category-filter').on('click', function (e) {
            e.preventDefault();
            var category = $(this).data('category');
            filterPosts(category);
            // Remove active class from all tabs
            jQuery('.category-filter').removeClass('active');
            // Add active class to the clicked tab
            jQuery(this).addClass('active');
        });

        jQuery('#all-posts-filter').on('click', function (e) {
            e.preventDefault();
            var category = ''; // Set to empty string or any value that represents all posts
            filterPosts(category);
            // Remove active class from all tabs
            jQuery('.category-filter').removeClass('active');
            // Add active class to the "All" tab
            jQuery(this).addClass('active');
        });

        // Change event for mobile filter dropdown
        jQuery('#mobile-filter-dropdown').on('change', function () {
            var category = $(this).val();
            filterPosts(category);
        });

    });

    jQuery(document).ready(function () {
        // Click event for category filters
        jQuery('.category-filter').on('click', function (e) {
            e.preventDefault();

            // Remove active class from all tabs
            jQuery('.category-filter').removeClass('active').parent('li').removeClass('active');

            // Add active class to the clicked tab
            $(this).addClass('active').parent('li').addClass('active');
        });

        $('#all-posts-filter').on('click', function (e) {
            e.preventDefault();

            // Remove active class from all tabs
            jQuery('.category-filter').removeClass('active').parent('li').removeClass('active');

            // Add active class to the "All" tab
            $(this).addClass('active').parent('li').addClass('active');
        });
    });

    $(document).ready(function () {
        // Add active class to "All Posts" filter link and its parent li on page load
        jQuery('#all-posts-filter').addClass('active').parent('li').addClass('active');

        // Click event for category filters
        jQuery('.category-filter').on('click', function (e) {
            e.preventDefault();

            // Remove active class from all category filter links and their parent lis
            jQuery('.category-filter-li').removeClass('active');
            jQuery('.category-filter').removeClass('active');

            // Add active class to the clicked filter link and its parent li
            $(this).addClass('active').parent('li').addClass('active');

            // Remove active class from "All Posts" filter link and its parent li
            jQuery('#all-posts-filter').removeClass('active').parent('li').removeClass('active');
        });
    });

</script>