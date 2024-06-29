const products = [
  {
      id: '1',
      name: 'Lavender Bliss',
      description: 'A soothing soap with the essence of lavender.',
      image: 'images/soap1.jpg'
  },
  {
      id: '2',
      name: 'Orange Zest',
      description: 'An invigorating soap with a fresh orange scent.',
      image: 'images/soap2.jpg'
  },
  {
      id: '3',
      name: 'Rose Petal',
      description: 'A romantic soap infused with rose petals.',
      image: 'images/soap3.jpg'
  }
];

function viewProduct(id) {
  const product = products.find(p => p.id === id);
  if (product) {
      window.location.href = `product.html?id=${product.id}`;
  }
}

document.addEventListener('DOMContentLoaded', function() {
  const params = new URLSearchParams(window.location.search);
  const productId = params.get('id');
  if (productId) {
      const product = products.find(p => p.id === productId);
      if (product) {
          document.getElementById('product-name').textContent = product.name;
          document.getElementById('product-image').src = product.image;
          document.getElementById('product-description').textContent = product.description;
      }
  }

  const orderForm = document.getElementById('order-form');
  if (orderForm) {
      orderForm.addEventListener('submit', function(event) {
          event.preventDefault();
          const quantity = document.getElementById('quantity').value;
          alert(`Order placed for ${quantity} unit(s) of ${product.name}`);
      });
  }
});
