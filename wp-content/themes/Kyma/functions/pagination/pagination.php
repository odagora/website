<?php

class Kyma_pagination
{
    function Kyma_page($latestpage, $post_type_data)
    {
        ?>
        <div id="pagination">
            <?php if ($latestpage != 1) {
                echo '<a href="' . get_pagenum_link(($latestpage - 1 > 0 ? $latestpage - 1 : 1)) . '"><i class="fa fa-angle-double-left"></i></a>';
            } ?>
            <?php for ($i = 1; $i <= $post_type_data->max_num_pages; $i++) {
                echo '<a class="' . ($i == $latestpage ? 'active ' : '') . '" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
            }
            if ($i - 1 != $latestpage) {
                echo '<a class="" href="' . get_pagenum_link(($latestpage + 1 <= $post_type_data->max_num_pages ? $latestpage + 1 : $post_type_data->max_num_pages)) . '"><i class="fa fa-angle-double-right"></i></a>';
            } ?>
        </div>
    <?php
    }
}

?>