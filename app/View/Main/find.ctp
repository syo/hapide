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
</div>
<?php endforeach; ?>
