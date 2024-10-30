<style>.sthunder-input {
        padding: 5px;
    }</style>
<form action="<?php echo $url; ?>" method="post">

    <p>Select sports to display on the widget:</p>

    <?php 
    
   foreach ($sports as $sid => $sname): ?>
 
       
        <div class="sthunder-input">
            <input type="checkbox" name="sports[]" value="<?= strval($sid) ?>" <?= ($sid == 0 || ($wdata && in_array($sid, $wdata['sports_un']))) ? 'checked' : '' ?> <?= ($sid == 0) ? 'id="check_all_sports"' : '' ?>>
            - <?= $sname ?>
        </div>
 

    <?php endforeach; 
  


    submit_button('Save');

    ?>

    <?php if($wid):
        $shortcode = sthunder_get_shortcode($wid, $wdata);

        ?>
        <p style="font-size: 16px;"><b>Shortcode: </b> <?php echo $shortcode;?></p>
    <?php endif;?>
</form>

<script>
    jQuery('#check_all_sports').change(function () {
        var checkboxes = jQuery(this).closest('form').find(':checkbox:not(#check_all_sports)');
        if (jQuery(this).is(':checked')) {
            checkboxes.prop('disabled', true);
        } else {
            checkboxes.prop('disabled', false);
        }
    });


    jQuery('#check_all_sports').change();


</script>