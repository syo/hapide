<?php foreach($Spots as $spot): ?>
<div class="resultCont">
	<div class="spotName">
		<?php echo $spot['Spot']['spotname']; ?>
	</div>
	<div class="spotZip">
		〒<?php echo $spot['Spot']['zip']; ?>
	</div>
	<div class="spotAddress">
		<?php echo $spot['Spot']['address']; ?>
	</div>
	<input type="hidden" class="latitude" value="<?php echo $spot['Spot']['lat']; ?>">
	<input type="hidden" class="longitude" value="<?php echo $spot['Spot']['lon']; ?>">
</div>
<?php endforeach; ?>
