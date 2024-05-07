<div id="loader-overlay">
    <div id="loader-container">
        <img src="<?php echo site_url() ?>/wp-content/uploads/2024/04/Loader-AJAX.svg" alt="Loading...">
    </div>
</div>


<section class="py-md-5 py-0 pt-4"
    style="overflow: hidden; background-image: url(<?php echo get_site_url(); ?>/wp-content/uploads/2024/04/knowledgebase-body-bg.svg); background-position: center; background-size: cover; background-repeat: no-repeat;">
    <div class="container post-filter-container">
        <div class="row d-flex align-items-center">
            [posts post_type="post" posts_per_page="9" orderby="date" order="desc" show_filter="1" allow_load_more="1"
            partial="partials/posts"]
        </div>
    </div>
</section>