 <!DOCTYPE html>
 <html>
 <head>
 	<title>GCMS Basic</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" type="text/css" href="design.css">
 </head>
 <body>

 	<?php include 'header.php';?>
 
<div class="checkout">
	<div class="columns">
	  <ul class="price">
	    <li class="header">NOC Selection</li>
	    <li class="grey">US $15</li>
	    <li class="headline"><h6>Terms of Purchase:</h6></li>
	    <li>Approximate delivery time is XX days</li>
	    <li>GCMS Notes are delivered via email at your given email ID</li>
	    <li>By purchasing, you agree to above terms of purchase</li>
	    <li>5GB Bandwidth</li>
	    <li>
   	<script src="https://www.paypal.com/sdk/js?client-id=AVo1jLwCnTB8q1XYfdoONnWflo-JfvZ3zgySU4V1xZ-TfiTNjET5K5HbFu8_dCV7fsg_gk02iXJj36q0"></script>


  
  <div id="paypal-button-container">

 

	  <script>
	  paypal.Buttons({
	    createOrder: function(data, actions) {
	      // This function sets up the details of the transaction, including the amount and line item details.
	      return actions.order.create({
	        purchase_units: [{
	          amount: {
	            value: '0.03'
	          }
	        }]
	      });
	    }
	  }).render('#paypal-button-container');
	</script></li>
</ul>
	 </div>
	
</div>
</div>



<?php include 'footer.php';?>

</body>
</html>
