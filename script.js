// Get a reference to the category select element
const categorySelect = document.getElementById('category-select');

// Get references to all product cards
const productCards = document.querySelectorAll('.product-card');

// Add event listener to the category select
categorySelect.addEventListener('change', filterProducts);

function filterProducts() {
  const selectedCategory = categorySelect.value;

  // Loop through each product card and check if it matches the selected category
  productCards.forEach((card) => {
    const dataCategory = card.getAttribute('data-category');
    if (selectedCategory === 'all' || selectedCategory === dataCategory) {
      card.style.display = 'block'; // Display the matching product card
      
    } else {
      card.style.display = 'none'; // Hide non-matching product cards
    }
  });
}

function generateUniqueID() {
  return Math.floor(Math.random() * 1000000); // You can adjust the range as needed
}

// Wait for the HTML document to load
document.addEventListener(onload(), function() {
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

