<?php
/**
 * Post 
 */
?>
<?php
$posts_content_area = get_field('posts_content_area', false, false);
?>
<div class="col-md-4 my-3">
    <div class="knowledgebase-card dark-grey-bg br-4">
        <div class="knowledge-img">
            <?php if (has_post_thumbnail()): ?>
                <img class="img-fluid featured-image w-100" src="<?php the_post_thumbnail_url(); ?>">
            <?php endif; ?>
        </div>
        <div class="knowledge-content p-4">
            <a href="<?php echo get_the_permalink() ?>">
                <h4 class="fw-extra-bold text-white m-0"> <?php the_title(); ?></h4>
            </a>
            <?php
            // Set the maximum number of words
            $max_words = 15;

            // Get the content of $posts_content_area
            $posts_content_area;

            // Split the content into an array of words
            $words = explode(" ", $posts_content_area);

            // If the number of words is greater than the maximum allowed
            if (count($words) > $max_words) {
                // Slice the array to get only the first $max_words elements
                $words = array_slice($words, 0, $max_words);
                // Join the words back together into a string
                $posts_content_area = implode(" ", $words) . " ...";
            }
            ?>
            <p class="fs-3 fw-300 text-white my-3"><?php echo $posts_content_area ?></p>
            <?php
            $categories = get_the_category();
            if ($categories) {
                foreach ($categories as $category) {
                    echo '<a class="fs-4 fw-bold primary-color" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> ';
                }
            } else {
                echo "No categories found.";
            }
            ?>
        </div>
    </div>
</div>