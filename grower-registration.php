<?php

require_once('include/Database.inc.php');
	
$r = $db->q("SELECT * FROM property_types;");
if(!$r->isValid())
	die("MySQL Error: " . $db->error());
$property_types = $r->buildArray();

$r = $db->q("SELECT * FROM property_relationships;");
if(!$r->isValid())
	die("MySQL Error: " . $db->error());
$property_relationships = $r->buildArray();

$r = $db->q("SELECT * FROM sources;");
if(!$r->isValid())
	die("MySQL Error: " . $db->error());
$sources = $r->buildArray();

$r = $db->q("SELECT * FROM tree_types;");
if(!$r->isValid())
	die("MySQL Error: " . $db->error());
$tree_types = $r->buildArray();

$r = $db->q("SELECT * FROM tree_heights;");
if(!$r->isValid())
	die("MySQL Error: " . $db->error());
$tree_heights = $r->buildArray();

$r = $db->q("SELECT * FROM months;");
if(!$r->isValid())
	die("MySQL Error: " . $db->error());
$months = $r->buildArray();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Grower Registration</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>
		var property_types = <?php echo json_encode($property_types); ?>;
		var property_relationships = <?php echo json_encode($property_relationships); ?>;
		var sources = <?php echo json_encode($sources); ?>;
		var tree_types = <?php echo json_encode($tree_types); ?>;
		var tree_heights = <?php echo json_encode($tree_heights); ?>;
		var months = <?php echo json_encode($months); ?>;
	</script>
</head>

<body>
<div id="main" role="main">
	<h2>Grower Registration</h2>
	<p>If you have fruit trees and/or other crops that produce more than you can use, donating part to The Harvest Club gleaners is a great way to make a difference and strengthen your community ties. This form provides us with the essential contact information and your harvest preferences.</p>
    <form id="grower" action="" method="post">
    	<h3>Grower Information</h3>
    	
    	<fieldset>
    		<legend>Name</legend>
    		<label for="firstname">First*</label>
    		<input id="firstname" name="firstname" type="text" placeholder="Peter" required="required" />
    	
    		<label for="lastname">Last*</label>
    		<input id="lastname" name="lastname" type="text" placeholder="Anteater" required="required" />
    		<!-- br/>
    		<label for="organization">Organization</label>
    		<input id="organization" name="organization" type="text" size="40" placeholder="Donald Bren School of ICS" />
    		-->
    	</fieldset>
    	
    	<fieldset>
    		<legend>Contact</legend>
    		<label for="email">Email*</label><input id="email" type="email" placeholder="peter@uci.edu" required="required" />
    		<label for="phone">Phone*</label><input id="phone" type="tel" name="phone" placeholder="9495551234" pattern="[0-9]{10}" required="required" />
    		<div>
				<label>Preferred Contact </label>
				&nbsp;
				<input id="contact-email" name="prefer" type="radio" /><label for="contact-email">Email</label>
				&nbsp;
				<input id="contact-phone" name="prefer" type="radio" /><label for="contact-phone">Phone</label>
				<!--input id="contact-address" name="prefer" type="radio" /><label for="contact-address">Mail</label-->
			</div>
    	</fieldset>
    	
    	<fieldset>
    		<legend>Address</legend>
			<div>
				<label for="street">Street*</label>
				<input id="street" type="text" name="street" id="street" placeholder="67 E Peltason Dr" required="required" />
				
				<label for="city">City*</label>
				<input type="text" name="city" id="city" placeholder="Irvine"  size="10" required="required" />
			</div>
			<div>
				<label for="state">State*</label>
				<select id="state" name="state" required="required"> 
					<option value="" disabled="disabled" selected="selected">Select...</option><!-- TODO: Force option -->
					<option value="AL">Alabama</option> 
					<option value="AK">Alaska</option> 
					<option value="AZ">Arizona</option> 
					<option value="AR">Arkansas</option> 
					<option value="CA">California</option> 
					<option value="CO">Colorado</option> 
					<option value="CT">Connecticut</option> 
					<option value="DE">Delaware</option> 
					<option value="DC">D.C.</option> 
					<option value="FL">Florida</option> 
					<option value="GA">Georgia</option> 
					<option value="HI">Hawaii</option> 
					<option value="ID">Idaho</option> 
					<option value="IL">Illinois</option> 
					<option value="IN">Indiana</option> 
					<option value="IA">Iowa</option> 
					<option value="KS">Kansas</option> 
					<option value="KY">Kentucky</option> 
					<option value="LA">Louisiana</option> 
					<option value="ME">Maine</option> 
					<option value="MD">Maryland</option> 
					<option value="MA">Massachusetts</option> 
					<option value="MI">Michigan</option> 
					<option value="MN">Minnesota</option> 
					<option value="MS">Mississippi</option> 
					<option value="MO">Missouri</option> 
					<option value="MT">Montana</option> 
					<option value="NE">Nebraska</option> 
					<option value="NV">Nevada</option> 
					<option value="NH">New Hampshire</option> 
					<option value="NJ">New Jersey</option> 
					<option value="NM">New Mexico</option> 
					<option value="NY">New York</option> 
					<option value="NC">North Carolina</option> 
					<option value="ND">North Dakota</option> 
					<option value="OH">Ohio</option> 
					<option value="OK">Oklahoma</option> 
					<option value="OR">Oregon</option> 
					<option value="PA">Pennsylvania</option> 
					<option value="RI">Rhode Island</option> 
					<option value="SC">South Carolina</option> 
					<option value="SD">South Dakota</option> 
					<option value="TN">Tennessee</option> 
					<option value="TX">Texas</option> 
					<option value="UT">Utah</option> 
					<option value="VT">Vermont</option> 
					<option value="VA">Virginia</option> 
					<option value="WA">Washington</option> 
					<option value="WV">West Virginia</option> 
					<option value="WI">Wisconsin</option> 
					<option value="WY">Wyoming</option>
				</select>
				<!-- input type="text" name="state" id="state" placeholder="CA"  size="2" pattern="[A-Z]{2}" required="required" /-->
				<label for="zip">Zip*</label><input type="text" name="zip" id="zip" placeholder="92617" size="4" pattern="[0-9]{5}" required="required" />
			</div>
			
			<div>
				<label for="property">Property type*</label>
				<select name="property" required="required">
					<option value="" disabled="disabled" selected="selected">Select...</option><!-- TODO: Force option -->
					<option value="residence">Residence</option>
					<option value="lot">Open space / Vacant lot</option>
					<option value="business">Business</option>
					<option value="public">Public Property</option>
					<option value="other">Other</option>
				</select>
			</div>
			
			<div>
				<label for="landlord">Relationship to property*</label>
				<select name="landlord" required="required">
					<option value="" disabled="disabled" selected="selected">Select...</option><!-- TODO: Force option -->
					<option value="owner">Owner & Occupant</option>
					<option value="renter">Renter</option>
					<option value="landlord">Rental property owner (landlord)</option>
					<option value="other">Other</option>
				</select>
			</div>
		
		</fieldset> <!-- end Address -->
		
		<h3>Misc Information</h3>
		<fieldset>
			<legend>Optional</legend>
			
			<div>
				<label>Tools available for volunteers on site</label>
				<input name="tools" type="text" />
			</div>
			
			<div>
				<label>How did you hear about us?</label>
				<select id="hear" name="hear">
					<option value="" disabled="disabled" selected="selected">Select...</option>
					<option value="1">Flyer</option>
					<option value="2">Facebook</option>
					<option value="3">Twitter</option>
					<option value="4">Family / Friend</option>
					<option value="5">Newspaper / Local Magazine</option>
					<option value="6">Village Harvest</option>
					<option value="7">Other</option>
				</select>
			</div>
			
			<div>
				<label>Anything else you would like us to know?</label><br/>
				<textarea name="notes" type="textarea" cols="50" rows="3" placeholder="Describe tree health, taste of fruit, accessibility of fruit, parking, etc"></textarea>
			</div>
		</fieldset>
		
		<h3>Tree Information</h3>
		
		<div>
			<label for="type-count">How many different types of trees would you like to register?</label>
			<select id="type-count" name="type-count" required="required" onchange="changeTreeCount(this);">
				<option value="" disabled="disabled" selected="selected">Select...</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
			</select>
		</div>
		
		<div id="dynamic">
			<!-- 
			<fieldset>
				<legend>Tree Type 1</legend>
				<div>
					<label>Tree Type:</label>
					<select id="tree-type" name="tree-type" required="required">
						<option value="" disabled="disabled" selected="selected">Select...</option>
						<option value="almond">Almond</option>
						<option value="apple">Apple</option>
						<option value="apricot">Asian Pear</option>
						<option value="blueberry">Blueberry</option>
						<option value="other">Other</option>
					</select>
				</div>
				
				<div>
					<label>Quantity:</label>
					<input name="tree-count" type="text" size="4" pattern="[1-9][0-9]*" required="required" />
				</div>
				
				<div>
					<label>Tree Height:</label>
					<input name="tree-height" type="text" size="4" pattern="[1-9][0-9]*" required="required" />
				</div>
			</fieldset>
			 -->
		</div>

		<fieldset>
			<legend>Register</legend>
			<input id="submit" type="submit" value="Register as Grower" disabled="disabled"/> <!--onclick="this.disabled='disabled';" /-->
		</fieldset>
	</form>
</div>

<script>
	/* Show and hide tree entry form using jQuery */
	function changeTreeCount(s) {
		var dynamic = document.getElementById('dynamic')
		dynamic.innerHTML = ''; // clear
		var count = (s.options[s.selectedIndex].value);
		
		var array = [];
		
		for (var i=1; i<=count; i++) {
			
			var fieldset = document.createElement('fieldset');
			var legend = document.createElement('legend');
			$(legend).text('Tree Type ' + i);
			
			var type = '<div> <label>Tree Type* (Orange, Apple, etc.)</label> <select name="trees[tree'+i+'][type]" required="required"> <option value="" disabled="disabled" selected="selected">Select...</option>';
			for (var j=0; j<tree_types.length; j++) {
				var o = tree_types[j];
				type += '<option value="'+o.id+'">'+o.name+'</option>';
			}
			type += '</select> </div>';
			
			var varietal = '<div> <label>Fruit Varietal (if known)</label> <input name="trees[tree'+i+'][varietal]" type="text" /> </div>';
			var quantity = '<div> <label>Number of trees of this type*</label> <input name="trees[tree'+i+'][quantity]" type="number" min="1" required="required" /> </div>';
			
			var height = '<div> <label>Tree Height*</label> <select name="trees[tree'+i+'][height]" required="required"> <option value="" disabled="disabled" selected="selected">Select...</option>';//'<div> <label>Tree Height*</label> <input name="trees[tree'+i+'][height]" type="text" size="4" pattern="[1-9][0-9]*" required="required" /> </div>';
			for (var j=0; j<tree_heights.length; j++) {
				var o = tree_heights[j];
				height += '<option value="'+o.id+'">'+o.name+'</option>';
			}
			height += '</select> </div>';
			
			var month = '<div> <label>Harvest Months</label> <table><tr>';
			//<input type="checkbox" name="trees[tree'+i+'][month]" value="1" /> Jan <input type="checkbox" name="trees[tree'+i+'][month]" value="2" /> Feb <input type="checkbox" name="trees[tree'+i+'][month]" value="3" /> Mar <input type="checkbox" name="trees[tree'+i+'][month]" value="4" /> Apr<br />  </div>';
			for (var j=0; j<months.length; j++) {
				var o = months[j];
				month += '<td> <input type="checkbox" name="trees[tree'+i+'][month][]" value="'+o.id+'" />' + o.name + '</td>';
				if ((j+1)%4 == 0)
					month += '</tr>';
			}
			month += '</table></div>';
			
			var disease = '<div> <label>Does the tree(s) have any fungus, disease, or pest issues?</label> <input type="text" name="trees[tree'+i+'][disease]" /> </div>';
			var pruned = '<div> <label>Has the tree(s) been pruned in the past three years? By whom?</label> <input type="text" name="trees[tree'+i+'][pruned]" /> </div>';
			var chemical = '<div> <label>Has the tree(s) been sprayed in the past 3 years? With what and when?</label> <input type="text" name="trees[tree'+i+'][chemical]" /> </div>';
			
			//var chemical = '<div> <input type="checkbox" name="trees[tree'+i+'][chemical]" value="1" /> I use chemicals</div>';
			
			$(fieldset).append(legend)
				.append(type)
				.append(varietal)
				.append(quantity)
				.append(height)
				.append(month)
				.append(disease)
				.append(pruned)
				.append(chemical);
			
			//var selectType = document.createElement('select');
			
			array.push(fieldset);
		}
		
		$(dynamic).append(array); // append tree forms
		document.getElementById('submit').disabled = '';
	}
</script>

</body>
</html>
