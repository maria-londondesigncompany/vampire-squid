<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="input-group search-bar d-flex justify-content-center align-items-center">
            <input type="text" value="<?php echo get_search_query(); ?>" name="s" class="form-control br-4 fs-3" placeholder="Search">
            <button type="submit" value="Search" class="primary-bg br-4 px-3 py-2 search-btn">
                <i class="fa-solid fa-magnifying-glass fs-3"></i>
            </button>
            <input type="hidden" name="post_type" value="post">
        </div>
    </form>
