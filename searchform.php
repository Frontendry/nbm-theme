<form  role="search" id="searchform" class="searchform" action="<?php echo home_url( '/' )?>" method="get">
    <label class="screen-reader-text" for="search">Search in <?php echo home_url( '/' ); ?></label>
    <input type="search" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search and hit enter..." class="search-field" />

    <div class="search-close bg-primary text-white">
        <button data-feather="x" class="search-close-btn" ></button>
    </div>

    <button type="submit" class="search-btn bg-primary text-white">
        <i data-feather="search" class="search-submit" ></i>
    </button>
   
</form>

