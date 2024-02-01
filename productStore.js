fetch('../php/get_products.php')
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    console.log(data);
    processProducts(data);
  })
  .catch(error => {
    console.error('There was a problem with the fetch operation:', error);
  });
function processProducts(products) {
}
