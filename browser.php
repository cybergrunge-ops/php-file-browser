<? session_start(); ?>

<style>
.item{color:#0dd;background:#000;cursor:default;width:100%}
.item:hover{color:#000;background:#0dd;cursor:default;width:100%}
summary:hover{color:#000;background:#0dd;cursor:default;width:100%}
</style>
<span id='debug'>debug</span>
<div style='cursor:default;position:absolute;left:200px;top:50px;border:#0ff outset;width:300px;background:#000;color:#0ff;font-size:13px;font-family:mono;'>
<div style='width:100%;background:#0cc;color:#000;font-weight:bold;'>File Browser</div>


<? $i=0;
// get all dirs
$numdirs = glob("*/");

foreach($numdirs as $thisdir){ $i++; 
	?>
	<details><summary id='$i' >/<? echo $thisdir; ?></summary>
	<?

$filesindir = glob("$thisdir*");
foreach($filesindir as $file){ 
	?> 
	<div id='<?echo $file ?>' onclick='selected("<?echo $file ?>")' class='item'><?echo $file ?></div> 
	<?
	}
	
	echo '</details>';
	}
echo "<br><span id='selected'></span>";

?>


</div>

<script>
	var selected_item = "none";
	
function testSelection(){ // test if anything is currently selected
for(i=0;i<9999;i++){return document.getElementsByClassName('item')[i].style.background == "#000";}}


function selected(name){
	selected_item = name;
	document.getElementById('debug').innerHTML = selected_item;
	// if nothing is selected, select the clicked item.
	if(testSelection()==true){ document.getElementById('selected').innerHTML = "selected " + name;
	document.getElementById(name).style = "color:#000;background:#0dd;cursor:default;width:100%";
	}else{
	// make sure only one thing is selected at a time
	for(i=0;i<9999;i++){ 
	document.getElementsByClassName('item')[i].style = "color:#0dd;background:#000;cursor:default;width:100%";
	document.getElementById('selected').innerHTML = "selected " + name;
	document.getElementById(name).style = "color:#000;background:#0dd;cursor:default;width:100%";
	}
	}
}

</script>






















