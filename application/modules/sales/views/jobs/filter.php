<?php if(!empty($aaData)){ ?>
 <?php foreach ($aaData as $key => $value) { ?>
<tr role="row" <?php if(($key/2)==0){echo 'class="even"';} else {echo 'class="odd"';} ?>>
<td class=" text-center"><?php $value[0] ?></td>
<td class=" text-center"><?php $value[1] ?></td>
<td class=" text-center"><?php $value[2] ?></td>
<td class=" text-center"><?php $value[3] ?></td>
<td class=" text-center"><?php $value[4] ?></td>
<td class=" text-center"><?php $value[5] ?></td>
<td class=" text-center"><?php $value[6] ?></td>
<td class=" text-center"><?php $value[7] ?></td>
<td class=" text-center"><?php $value[8] ?></td>
<td class=" text-center"><?php $value[9] ?></td>
</tr>
 <?php } ?>
<?php } ?>