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
		<div class="column-1">

	  <ul class="price">
	    <li class="header">Terms of Purchase</li>

	    <li class="bullet">GCMS Basic
    	
    	<ul>
    		<li>We send case notes released by IRCC via email at your given email ID.</li>
    		<li>Approximte delivery time is 30 to 40 days.</li>
    	</ul>
	    
	    </li>	

	    <li class="bullet">GCMS PLUS 
    	
    	<ul>
    		<li>comprise complete case file including forms and supporting documents.</li>
			<li>Delivery time varies and it is considerably longer than the standard timeframe.</li>
		</ul>

		</li>

		<li class="bullet">GCMS Super 

		<ul>
			<li>Case notes and supporting documents for your application are reviewed by our team.</li>
			<li>Delivery time varies and it is considerably longer than the standard timeframe.</li></ul>

		<li class="bullet">CBSA Notes
		<ul>
			<li>comprise information from CBSA regarding security check or screening for your application.</li>

			<li>Approximate delivery time is roughly 50 calendar days or more from the date of order.</li>
		</ul>	

	    
	  

</div>


<div class="column-2">
	
		       	
   	<div id="smart-button-container">
      <div style="text-align: center;">
        <div style="margin-bottom: 1.25rem;">
          <p>Using the drop down below, select a service you want to purchase</p>

          <select id="item-options"><option value="GCMS Basic" price="10">GCMS Basic - 10 USD</option><option value="GCMS Plus" price="15">GCMS Plus - 15 USD</option><option value="GCSM Super" price="30">GCSM Super - 30 USD</option><option value="CBSA Notes" price="30">CBSA Notes - 30 USD</option><option value="NOC Selection" price="15">NOC Selection - 15 USD</option><option value="Application Review" price="150">Application Review - 150 USD</option><option value="Document Review" price="30">Document Review - 30 USD</option></select>
          <select style="visibility: hidden" id="quantitySelect"></select>
        </div>

      <input type="checkbox"> By paying, you agree to the terms of purchase!<br><br>

      <div id="paypal-button-container"></div>
      </div>
    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=AQtpOdsWnpw9tTSTu_UjMzCYRLP8Cz0nRsc15ZcD2kJEwiD2o57z8vs-IekpKgdrnjUvHGw6S5jeiO1B&currency=USD" data-sdk-integration-source="button-factory"></script>
    <script>
      function initPayPalButton() {
        var shipping = 0;
        var itemOptions = document.querySelector("#smart-button-container #item-options");
    var quantity = parseInt();
    var quantitySelect = document.querySelector("#smart-button-container #quantitySelect");
    if (!isNaN(quantity)) {
      quantitySelect.style.visibility = "visible";
    }
    var orderDescription = 'Choose a Service';
    if(orderDescription === '') {
      orderDescription = 'Item';
    }
    paypal.Buttons({
      style: {
        shape: 'pill',
        color: 'gold',
        layout: 'vertical',
        label: 'paypal',
        
      },
      createOrder: function(data, actions) {
        var selectedItemDescription = itemOptions.options[itemOptions.selectedIndex].value;
        var selectedItemPrice = parseFloat(itemOptions.options[itemOptions.selectedIndex].getAttribute("price"));
        var tax = (0 === 0) ? 0 : (selectedItemPrice * (parseFloat(0)/100));
        if(quantitySelect.options.length > 0) {
          quantity = parseInt(quantitySelect.options[quantitySelect.selectedIndex].value);
        } else {
          quantity = 1;
        }

        tax *= quantity;
        tax = Math.round(tax * 100) / 100;
        var priceTotal = quantity * selectedItemPrice + parseFloat(shipping) + tax;
        priceTotal = Math.round(priceTotal * 100) / 100;
        var itemTotalValue = Math.round((selectedItemPrice * quantity) * 100) / 100;

        return actions.order.create({
          purchase_units: [{
            description: orderDescription,
            amount: {
              currency_code: 'USD',
              value: priceTotal,
              breakdown: {
                item_total: {
                  currency_code: 'USD',
                  value: itemTotalValue,
                },
                shipping: {
                  currency_code: 'USD',
                  value: shipping,
                },
                tax_total: {
                  currency_code: 'USD',
                  value: tax,
                }
              }
            },
            items: [{
              name: selectedItemDescription,
              unit_amount: {
                currency_code: 'USD',
                value: selectedItemPrice,
              },
              quantity: quantity
            }]
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          alert('Transaction completed by ' + details.payer.name.given_name + '!');
        });
      },
      onError: function(err) {
        console.log(err);
      },
    }).render('#paypal-button-container');
  }
  initPayPalButton();
    </script>

<br>


	
</div>	
</div>


<?php include 'footer.php';?>

</body>
</html>