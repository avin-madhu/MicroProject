

function generateUniqueID() {
  return Math.floor(Math.random() * 1000000); // You can adjust the range as needed
}

// Wait for the HTML document to load
document.addEventListener('onload', function() {
  // Get a reference to the <p> element
  var pElement = document.getElementById('hidden-id');

  // Generate the unique ID
  var uniqueID = generateUniqueID();

  // Insert the unique ID into the <p> element's text content
  pElement.textContent = uniqueID;
});


    function getProductId() {
        var productDescLinks = document.querySelectorAll('.more-link');

        productDescLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var product_id = this.getAttribute('href').split('product_id=')[1];
                // You can now use the product_id to perform actions or navigate to productDesc.php with the product_id
                window.location.href = 'productDesc.php?product_id=' + product_id;
            });
        });
    }

    // Call the function to set up event listeners
    getProductId();

    // 

//document.getElementById('quantityinput').addEventListener('change', updatePrice());

    var updatedPrice =0;
    var initialPrice = parseFloat(document.getElementById('productDescPrice').innerText.replace('$ ', ''));
    function updatePrice() {
      // Get the quantity input value
      var quantity = parseFloat(document.getElementById('quantityinput').value);
      console.log(quantity);

      // Assuming the initial price is 19.99, update it based on the quantity
      
      
      updatedPrice = initialPrice * quantity;

      // Display the updated price
      document.getElementById('productDescPrice').innerText = '$ ' + updatedPrice.toFixed(2);
  }


  document.getElementById('purchasenowbtn').addEventListener('click', ()=>{
          alert("Successfully Purchased!  🎉  🎉 ")
  })
  