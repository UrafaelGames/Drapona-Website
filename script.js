function openModal(seccion) {
    const modal = document.getElementById('modal');
    const modalBody = document.getElementById('modal-body');
    const header = document.getElementById('modal-header');
    
    modal.style.display = 'block';
  
    // Contenido basado en la sección seleccionada
    if (seccion === 'cultura') {
      header.innerHTML = "Sobre Nuestra Cultura";
      modalBody.innerHTML = "<p>La cultura Wayuu es una de las más ricas y representativas de Colombia. Cada tejido cuenta historias ancestrales transmitidas de generación en generación.</p>";
    } else if (seccion === 'artesanias') {
      header.innerHTML = "Qué Representan Nuestras Artesanías";
      modalBody.innerHTML = "<p>Las mochilas Wayuu representan símbolos de protección, fortaleza y conexión espiritual con la naturaleza.</p>";
    } else if (seccion === 'proceso') {
      header.innerHTML = "Cómo es el Proceso de Tejido";
      modalBody.innerHTML = "<p>Tejer una mochila puede tardar semanas, comenzando con la selección de hilos y utilizando técnicas tradicionales únicas de la etnia Wayuu.</p>";
    } else if (seccion === 'economia') {
      header.innerHTML = "Sus Actividades Económicas";
      modalBody.innerHTML = "<p>Las actividades principales de los Wayuu incluyen el pastoreo, el comercio, y la producción artesanal que mantiene viva su cultura.</p>";
    } else if (seccion === 'produccion') {
      header.innerHTML = "Producción Artesanal";
      modalBody.innerHTML = "<p>La producción artesanal Wayuu combina técnicas ancestrales y diseños modernos, generando ingresos sostenibles para sus comunidades.</p>";
    } else if (seccion === 'compra') {
      header.innerHTML = "Compra tu Mochila";
      modalBody.innerHTML = "<p>Contáctanos para adquirir una mochila única, hecha a mano con amor y tradición. ¡Cada compra apoya directamente a las artesanas Wayuu!</p>";
    }
  }
  
  function closeModal() {
    const modal = document.getElementById('modal');
    modal.style.display = 'none';
  }

  let cart = [];
  
  function addToCart(id, nombre, precio) {
    let product = cart.find(item => item.id === id);
    if (product) {
      product.cantidad += 1; 
    } else {
      cart.push({ id, nombre, precio, cantidad: 1 }); 
    }
  
    updateCart();
  }
  
  // Mostrar el carrito
  function openCart() {
    const cartModal = document.getElementById('cartModal');
    const cartItems = document.getElementById('cartItems');
    const totalPrice = document.getElementById('totalPrice');
  
    cartItems.innerHTML = ''; 
    let total = 0;
  
    cart.forEach(item => {
      const div = document.createElement('div');
      div.innerHTML = `${item.nombre} - $${item.precio} x ${item.cantidad}`;
      cartItems.appendChild(div);
      total += item.precio * item.cantidad;
    });
  
    totalPrice.textContent = total;
  
    cartModal.style.display = 'block';
  }
  
  function closeCart() {
    const cartModal = document.getElementById('cartModal');
    cartModal.style.display = 'none';
  }
  
  function checkout() {
    alert("¡Gracias por tu compra!");
    cart = []; 
    updateCart();
    closeCart();
  }
  
  function updateCart() {
    const cartLink = document.querySelector('nav a[href="javascript:void(0)"][onclick="openCart()"]');
    const totalItems = cart.reduce((sum, item) => sum + item.cantidad, 0);
    cartLink.textContent = `Carrito (${totalItems})`;
  }
  