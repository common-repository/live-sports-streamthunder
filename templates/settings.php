<form action="<?php echo $url; ?>" method="post" id="sthunder_settings">


<table class="form-table">
<tbody>

<tr>
    <th scope="row">
        <label>
            Put your Ad links and make money!
        </label>
    </th>
    <td>
        Link 1: <input value="<?php if ($options && isset($options['l'])) {
            echo htmlspecialchars($options['l']);
        } ?>" name="l" id="l" placeholder="http://... or https://....">
        <br><br>
        Link 2: <input value="<?php if ($options && isset($options['l2'])) {
            echo htmlspecialchars($options['l2']);
        } ?>" name="l2" id="l2" placeholder="http://... or https://....">
    </td>
</tr>

<tr>
    <th scope="row">
        <label>
        Append to your links match title parameter dinamically:
        <br>
        <br>
        <small>If you have a landing page and you want to display the title of the clicked match on it, you can use this feature. To get the title of the match from your destination page, capture the "t" parameter from the URL.</small><br><br>
        <small>Example: http://www.yourdomain.com/landingpage?title=match_title</small>
        </label>
    </th>
    <td>
    <label>Link 1 param</label>
        <select name="lt" id="lt">
            <option value="">No</option>
            <option value="1">Yes</option>
        </select> <br> <br>
        <label>Link 2 param</label>
        <select name="l2t" id="l2t">
            <option value="">No</option>
            <option value="1">Yes</option>
        </select>
    </td>
    
</tr>


<tr>
    <th scope="row">
        <label>
            Widget Content:
        </label>
    </th>
    <td>
        <select name="lk" id="lk">
            <option value="0">Show only my links</option>
            <option value="1">Show all links (May be Copyright issues etc ...)</option>
        </select>
    </td>
</tr>



<tr>
    <th scope="row">
        <label>
            Iframe scrollbars:
        </label>
    </th>
    <td>
        <select name="widget_scrollbars" id="widget_scrollbars">
            <option value="1">Show</option>
            <option value="0">Hide</option>
        </select>
    </td>
</tr>


<tr>
    <th scope="row">
        <label>
            Link to Streamthunder:
        </label>
    </th>
    <td>
        <select name="sthunder_link" id="sthunder_link">
            <option value="1">Show</option>
            <option value="0">Hide</option>
        </select>
    </td>
</tr>

<tr>
    <th scope="row">
        <label>
             Fake Player:
        </label>
    </th>
    <td>
        <select name="fk" id="fk">
            <option value="1">Show</option>
            <option value="0">Hide</option>
        </select>
    </td>
</tr>


<th scope="row">
        <label>
           Sports Menu Style:
        </label>
    </th>
    <td>
        <select name="sm" id="sm">
            <option value="1">Carousel</option>
            <option value="2">Dropdown</option>
        </select>
    </td>
</tr>


<tr>
    <th scope="row">
        <label>
            Custom styles:
        </label>
    </th>
    <td>
        <select name="cs" id="cs">
            <option value="0">Default</option>
            <option value="3">Custom 1(Original)</option>
            <option value="4">Custom 2</option>
            <option value="5">Custom 3</option>
            <option value="6">Custom 4</option>
        </select>
        <p class="description">Leave default to customize your own styles</p>
    </td>
</tr>



<tr class="fi2">
    <th scope="row">
        <label>
            Font type:
        </label>
    </th>
    <td>
        <select name="ft" id="ft">
            <option value="0">Default</option>
            <option value="1">Arial</option>
            <option value="2">Tahoma</option>
            <option value="3">Times New Roman</option>
            <option value="4">Verdana</option>
            <option value="5">Segoe UI</option>
            <option value="6">Roboto</option>
            <option value="7">Sky</option>
            <option value="8">Exo 2</option>
            <option value="9">Play</option>
            <option value="10">Titillium</option>
            <option value="11">Maven Pro</option>
            <option value="12">Gothic</option>


        </select>
    </td>
</tr>

<tr class="fi2">
    <th scope="row">
        <label>
            Font Size:
        </label>
    </th>
    <td>
        <select name="fs" id="fs">
            <option value="12px">Default</option>
            <option value="10px">10px</option>
            <option value="11px">11px</option>
            <option value="12px">12px</option>
            <option value="13px">13px</option>
            <option value="14px">14px</option>
            <option value="15px">15px</option>
            <option value="16px">16px</option>
            <option value="17px">17px</option>
            <option value="18px">18px</option>
            <option value="19px">19px</option>
            <option value="20px">20px</option>
            <option value="21px">21px</option>
            <option value="22px">22px</option>
            <option value="23px">23px</option>
            <option value="24px">24px</option>
        </select>
    </td>
</tr>

<tr class="fi2">
    <th scope="row">
        <label>
            Font Weight:
        </label>
    </th>
    <td>
        <select name="fw" id="fw">
            <option value="">Default</option>
            <option value="300">Light</option>
            <option value="400">Normal</option>
            <option value="500">Medium</option>
            <option value="600">Bold</option>
            <option value="700">Extra bold</option>
        </select>
    </td>
</tr>

<tr class="fi2">
    <th scope="row">
        <label>
            Text Transform:
        </label>
    </th>
    <td>
        <select name="tt" id="tt">
            <option value="none">Default</option>
            <option value="none">None</option>
            <option value="uppercase">Uppercase</option>
            <option value="capitalize">Capitalize</option>
            <option value="lowercase">Lowercase</option>
        </select>
    </td>
</tr>

<tr class="fi2">
    <th scope="row">
        <label>
            Border:
        </label>
    </th>
    <td>
        <select name="br" id="br" class="form-control  inputbox">
            <option value="0">Default</option>
            <option value="0px">0px</option>
            <option value="1px">1px</option>
            <option value="2px">2px</option>
            <option value="3px">3px</option>
            <option value="4px">4px</option>
            <option value="5px">5px</option>
        </select>
    </td>
</tr>

<tr class="fi2">
    <th scope="row">
        <label>
            Border color:
        </label>
    </th>
    <td>
        <input class="form-control jscolor" value="<?php if ($options && isset($options['brc'])) {
            echo htmlspecialchars($options['brc']);
        } else { ?>#ccc<?php } ?>" name="brc" id="brc" autocomplete="off">
    </td>
</tr>

<tr class="fi2">
    <th scope="row">
        <label>
            Border radius:
        </label>
    </th>
    <td>
        <select name="brr" id="brr">
            <option value="2px">Default</option>
            <option value="0px">0px</option>
            <option value="1px">1px</option>
            <option value="2px">2px</option>
            <option value="3px">3px</option>
            <option value="4px">4px</option>
            <option value="5px">5px</option>
            <option value="6px">6px</option>
            <option value="7px">7px</option>
            <option value="8px">8px</option>
            <option value="9px">9px</option>
            <option value="10px">10px</option>
            <option value="11px">11px</option>
            <option value="12px">12px</option>
            <option value="13px">13px</option>
            <option value="14px">14px</option>
            <option value="15px">15px</option>
            <option value="16px">16px</option>
            <option value="17px">17px</option>
            <option value="18px">18px</option>
            <option value="19px">19px</option>
            <option value="20px">20px</option>

        </select>
    </td>
</tr>

<tr class="fi2">
    <th scope="row">
        <label>
            Padding:
        </label>
    </th>
    <td>
        <select name="pd" id="pd">
            <option value="18px">Default</option>
            <option value="10px">10px</option>
            <option value="11px">11px</option>
            <option value="12px">12px</option>
            <option value="13px">13px</option>
            <option value="14px">14px</option>
            <option value="15px">15px</option>
            <option value="16px">16px</option>
            <option value="17px">17px</option>
            <option value="18px">18px</option>
            <option value="19px">19px</option>
            <option value="20px">20px</option>
            <option value="21px">21px</option>
            <option value="22px">22px</option>
            <option value="23px">23px</option>
            <option value="24px">24px</option>
            <option value="25px">25px</option>
            <option value="26px">26px</option>
            <option value="27px">27px</option>
            <option value="28px">28px</option>
            <option value="29px">29px</option>
            <option value="30px">30px</option>
            <option value="31px">31px</option>
            <option value="32px">32px</option>
            <option value="33px">33px</option>
            <option value="34px">34px</option>
            <option value="35px">35px</option>

        </select>
    </td>
</tr>

<tr class="fi2">
    <th scope="row">
        <label>
            Margin:
        </label>
    </th>
    <td>
        <select name="mr" id="mr">
            <option value="1px">Default</option>
            <option value="0px">0px</option>
            <option value="1px">1px</option>
            <option value="2px">2px</option>
            <option value="3px">3px</option>
            <option value="4px">4px</option>
            <option value="5px">5px</option>
            <option value="6px">6px</option>
            <option value="7px">7px</option>
            <option value="8px">8px</option>
            <option value="9px">9px</option>
            <option value="10px">10px</option>
            <option value="11px">11px</option>
            <option value="12px">12px</option>
            <option value="13px">13px</option>
            <option value="14px">14px</option>
            <option value="15px">15px</option>
            <option value="16px">16px</option>
            <option value="17px">17px</option>
            <option value="18px">18px</option>
            <option value="19px">19px</option>
            <option value="20px">20px</option>

        </select>
    </td>
</tr>

<tr class="fi2">
    <th scope="row">
        <label>
            Blur:
        </label>
    </th>
    <td>
        <select name="bsh" id="bsh">
            <option value="0px">Default</option>
            <option value="0px">0px</option>
            <option value="1px">1px</option>
            <option value="2px">2px</option>
            <option value="3px">3px</option>
            <option value="4px">4px</option>
            <option value="5px">5px</option>
            <option value="6px">6px</option>
            <option value="7px">7px</option>
            <option value="8px">8px</option>
            <option value="9px">9px</option>
            <option value="10px">10px</option>

        </select>
    </td>
</tr>

<tr class="fi2">
    <th scope="row">
        <label>
            Tabs Background:
        </label>
    </th>
    <td>
        <input class="form-control jscolor" value="<?php if ($options && isset($options['tbb'])) {
            echo htmlspecialchars($options['tbb']);
        } ?>" name="tbb" id="tbb" autocomplete="off">
    </td>
</tr>

<tr class="fi2">
    <th scope="row">
        <label>
            Tabs Color:
        </label>
    </th>
    <td>
        <input class="form-control jscolor" value="<?php if ($options && isset($options['tbc'])) {
            echo htmlspecialchars($options['tbc']);
        } ?>" name="tbc" id="tbc" autocomplete="off">
    </td>
</tr>

<tr class="fi2">
    <th scope="row">
        <label>
            Tabs Font Size:
        </label>
    </th>
    <td>
        <select name="tbf" id="tbf">
            <option value="12px">Default</option>
            <option value="10px">10px</option>
            <option value="11px">11px</option>
            <option value="12px">12px</option>
            <option value="13px">13px</option>
            <option value="14px">14px</option>
        </select>
    </td>
</tr>


<tr class="fi2">
    <th scope="row">
        <label>
            Widget background:
        </label>
    </th>
    <td>
        <input class="form-control jscolor" value="<?php if ($options && isset($options['wb'])) {
            echo htmlspecialchars($options['wb']);
        } else { ?>#EBEBEB<?php } ?>" name="wb" id="wb" autocomplete="off">
    </td>
</tr>


<tr class="fi2">
    <th scope="row">
        <label>
            Font Color:
        </label>
    </th>
    <td>
        <input class="form-control jscolor" value="<?php if ($options && isset($options['fc'])) {
            echo htmlspecialchars($options['fc']);
        } else { ?>#333<?php } ?>" name="fc" id="fc" autocomplete="off">
    </td>
</tr>


<tr class="fi2">
    <th scope="row">
        <label>
            Title Color:
        </label>
    </th>
    <td>
        <input class="form-control jscolor" value="<?php if ($options && isset($options['tc'])) {
            echo htmlspecialchars($options['tc']);
        } else { ?>#333<?php } ?>" name="tc" id="tc" autocomplete="off">
    </td>
</tr>


<tr class="fi2">
    <th scope="row">
        <label>
            Title Hover Color:
        </label>
    </th>
    <td>
        <input class="form-control jscolor" value="<?php if ($options && isset($options['thc'])) {
            echo htmlspecialchars($options['thc']);
        } else { ?>#333<?php } ?>" name="thc" id="thc" autocomplete="off">
    </td>
</tr>


<tr class="fi2">
    <th scope="row">
        <label>
            Background Color:
        </label>
    </th>
    <td>
        <input class="form-control jscolor" value="<?php if ($options && isset($options['bc'])) {
            echo htmlspecialchars($options['bc']);
        } ?>" name="bc" id="bc" autocomplete="off">
    </td>
</tr>


<tr class="fi2">
    <th scope="row">
        <label>
            Background hover:
        </label>
    </th>
    <td>
        <input class="form-control jscolor" value="<?php if ($options && isset($options['bhc'])) {
            echo htmlspecialchars($options['bhc']);
        } else { ?>#f3f3f3<?php } ?>" name="bhc" id="bhc" autocomplete="off">
    </td>
</tr>


<tr class="fi2">
    <th scope="row">
        <label>
            Background content:
        </label>
    </th>
    <td>
        <input class="form-control jscolor" value="<?php if ($options && isset($options['bcc'])) {
            echo htmlspecialchars($options['bcc']);
        } else { ?>#fff<?php } ?>" name="bcc" id="bcc" autocomplete="off">
    </td>
</tr>


<tr class="fi2">
    <th scope="row">
        <label>
            Time Color:
        </label>
    </th>
    <td>
        <input class="form-control jscolor" value="<?php if ($options && isset($options['tm'])) {
            echo htmlspecialchars($options['tm']);
        } else { ?>#333<?php } ?>" name="tm" id="tm" autocomplete="off">
    </td>
</tr>


<tr class="fi2">
    <th scope="row">
        <label>
            Date row background:
        </label>
    </th>
    <td>
        <input class="form-control jscolor" value="<?php if ($options && isset($options['rdb'])) {
            echo htmlspecialchars($options['rdb']);
        } else { ?>#EBEBEB<?php } ?>" name="rdb" id="rdb" autocomplete="off">
    </td>
</tr>


<tr class="fi2">
    <th scope="row">
        <label>
            Date row text color:
        </label>
    </th>
    <td>
        <input class="form-control jscolor" value="<?php if ($options && isset($options['rdc'])) {
            echo htmlspecialchars($options['rdc']);
        } else { ?>#333<?php } ?>" name="rdc" id="rdc" autocomplete="off">
    </td>
</tr>


<tr class="fi2">
    <th scope="row">
        <label>
            Widget Height px:
        </label>
    </th>
    <td>
        <input class="form-control" value="<?php if ($options && isset($options['whs'])) {
            echo htmlspecialchars($options['whs']);
        } ?>" name="whs" id="whs">
    </td>
</tr>


</tbody>


</table>


<?php submit_button('Save'); ?>

</form>



<script>
    <?php

 // selecting options in select lists
 if($options)
 {

 $select_options = array('tbf', 'bsh', 'mr', 'brr', 'pd', 'br', 'tt', 'fw', 'fs', 'ft', 'cs', 'st', 'sm', 'lt', 'l2t', 'lk=1','fk', 'widget_scrollbars', 'sthunder_link'); // list of options with select lists



 foreach($select_options as $select_option)
 {

 if(isset($options[$select_option]))
 {
?>
    jQuery('#sthunder_settings select[name="<?php echo $select_option;?>"]').val("<?php echo addslashes($options[$select_option]);?>");
    <?php
 }


 }

 }
     ?>


</script>


<script>
    jQuery('#cs').change(function () {
        var form_fields = jQuery(this).closest('form').find('.fi2');

        if (jQuery(this).val()!='0') {
            form_fields.hide();

        } else {

            form_fields.show();
        }
    });


    jQuery('#cs').change();


</script>


