<?php if(date('D', strtotime($from))=='Mon'){
  $from = date('Y-m-d', strtotime("This Monday", strtotime($from)));;
} else {
  $from = date('Y-m-d', strtotime("Last Monday", strtotime($from)));;
} ?>
        
<?php if(!empty($timesheets)){ ?>
  <?php foreach ($timesheets as $k => $_timesheet) { ?>
    <tr>
      <td><?php echo $_timesheet['requirement_id'] ?></td>
      <td><?php echo $_timesheet['contractor_name'] ?></td>
      <td><?php echo $_timesheet['prospect_title'] ?></td>
      <?php if(!empty($_timesheet['timesheet'])) { ?>
        <?php $newData = array(); ?>
        <?php foreach ($_timesheet['timesheet'] as $tk => $tv) {
          $dayNew = date('l',strtotime($tv['date']));
          $newData[$dayNew] = $tv;
        } ?>
        <td>
          <?php if (isset($newData['Monday']) && !empty($newData['Monday'])){ ?>
            <input type="text" class="timesheetaddedit" name="hour_monday" id="monday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Monday']['cts_id']; ?>" data-date="<?php echo $newData['Monday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Monday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Monday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } else { ?>
            <input type="text" class="timesheetaddedit" name="hour_monday" id="monday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime($from)); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+1 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } ?>
        </td>
        <td>
          <?php if (isset($newData['Tuesday']) && !empty($newData['Tuesday'])){ ?>
            <input type="text" class="timesheetaddedit" name="hour_tuesday" id="tuesday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Tuesday']['cts_id']; ?>" data-date="<?php echo $newData['Tuesday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Tuesday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Tuesday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } else { ?>
            <input type="text" class="timesheetaddedit" name="hour_tuesday" id="tuesday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+1 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+1 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } ?>
        </td>
        <td>
          <?php if (isset($newData['Wednesday']) && !empty($newData['Wednesday'])){ ?>
            <input type="text" class="timesheetaddedit" name="hour_wedday" id="wedday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Wednesday']['cts_id']; ?>" data-date="<?php echo $newData['Wednesday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Wednesday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Wednesday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } else { ?>
            <input type="text" class="timesheetaddedit" name="hour_wedday" id="wedday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+2 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+2 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } ?>
        </td>
        <td>
          <?php if (isset($newData['Thursday']) && !empty($newData['Thursday'])){ ?>
            <input type="text" class="timesheetaddedit" name="hour_thirsday" id="thirsday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Thursday']['cts_id']; ?>" data-date="<?php echo $newData['Thursday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Thursday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Thursday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } else { ?>
            <input type="text" class="timesheetaddedit" name="hour_thirsday" id="thirsday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+3 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+3 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } ?>
        </td>
        <td>
          <?php if (isset($newData['Friday']) && !empty($newData['Friday'])){ ?>
            <input type="text" class="timesheetaddedit" name="hour_friday" id="friday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Friday']['cts_id']; ?>" data-date="<?php echo $newData['Friday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Friday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Friday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } else { ?>
            <input type="text" class="timesheetaddedit" name="hour_friday" id="friday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+4 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+4 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } ?>
        </td>
        <td>
          <?php if (isset($newData['Saturday']) && !empty($newData['Saturday'])){ ?>
            <input type="text" class="timesheetaddedit" name="hour_satday" id="satday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Saturday']['cts_id']; ?>" data-date="<?php echo $newData['Saturday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Saturday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Saturday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } else { ?>
            <input type="text" class="timesheetaddedit" name="hour_satday" id="satday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+5 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+5 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } ?>
        </td>
        <td>
          <?php if (isset($newData['Sunday']) && !empty($newData['Sunday'])){ ?>
            <input type="text" class="timesheetaddedit" name="hour_sunday" id="sunday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Sunday']['cts_id']; ?>" data-date="<?php echo $newData['Sunday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Sunday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Sunday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } else { ?>
            <input type="text" class="timesheetaddedit" name="hour_sunday" id="sunday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+6 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+6 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
          <?php } ?>
        </td>
      <?php } else { ?>
        <td><input type="text" class="timesheetaddedit" name="hour_monday" id="monday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime($from)); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($from))){ echo 'disabled="disabled"'; } ?> /></td>
        <td><input type="text" class="timesheetaddedit" name="hour_tuesday" id="tuesday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+1 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+1 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /></td>
        <td><input type="text" class="timesheetaddedit" name="hour_wedday" id="wedday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+2 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+2 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /></td>
        <td><input type="text" class="timesheetaddedit" name="hour_thirsday" id="thirsday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+3 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+3 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /></td>
        <td><input type="text" class="timesheetaddedit" name="hour_friday" id="friday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+4 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+4 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /></td>
        <td><input type="text" class="timesheetaddedit" name="hour_satday" id="satday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+5 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+5 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /></td>
        <td><input type="text" class="timesheetaddedit" name="hour_sunday" id="sunday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+6 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+6 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /></td>
      <?php } ?>
    </tr>
  <?php } ?>
<?php } else { ?>
  <tr>
    <td valign="top" colspan="10" class="dataTables_empty">No data available in table</td>
  </tr>
<?php } ?>