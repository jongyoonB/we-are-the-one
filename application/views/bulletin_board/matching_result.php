


<div>
    <?php foreach ($g as $link) {?>
        <a href="<?php echo URL ?>/bulletin_board/match/<?php echo $link->pe_category_link ?>"><?php echo $link->pe_category_name ?></a><br>
    <?php }?>
</div>


<?php foreach($board_list as $row) { ?>
    <li>
        b_con_idx : <?php echo $row->b_con_idx ?> / u_num : <?php echo $row->u_num ?> / b_category_num : <?php echo $row->b_category_num ?> / college_num : <?php echo $row->college_num ?>
        / b_subject : <?php echo $row->b_subject ?> / b_content : <?php echo $row->b_content ?> / b_date : <?php echo $row->b_date ?> / attach : <?php echo $row->attach ?> / ls_html : <?php echo $row->ls_html ?>
        / like_count : <?php echo $row->like_count ?>
    </li>
<?php } //end foreach ?>
