<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Drapona | Artesanía Wayuu con Propósito</title>

  <!-- Fuentes -->
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
  
  <!-- Estilos -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Drapona</h1>
    <p>Artesanía Wayuu que cuenta historias</p>
  </header>

  <!-- Menú de navegación -->
  <nav>
    <a href="javascript:void(0)" onclick="openModal('cultura')">Sobre Nuestra Cultura</a>
    <a href="javascript:void(0)" onclick="openModal('artesanias')">Qué Representan Nuestras Artesanías</a>
    <a href="javascript:void(0)" onclick="openModal('proceso')">Cómo es el Proceso de Tejido</a>
    <a href="javascript:void(0)" onclick="openModal('economia')">Sus Actividades Económicas</a>
    <a href="javascript:void(0)" onclick="openModal('produccion')">Producción Artesanal</a>
    <a href="javascript:void(0)" onclick="openCart()">Carrito (0)</a> 
  </nav>

  <section class="hero">
    <h1>Descubre el arte detrás de cada puntada</h1>
    <p>Cada diseño Wayuu representa cultura, identidad y lucha</p>
  </section>

  <section class="contenido">
    <h2>Galería de Artesanías</h2>
    <div class="galeria">
      <div class="producto" data-id="1" data-nombre="Mochila Wayuu tradicional" data-precio="30">
        <img src="images/mochila1.jpg" alt="Mochila Wayuu tradicional">
        <p>Mochila con patrón de tortuga ancestral - símbolo de protección.</p>
        <button onclick="addToCart(1, 'Mochila Wayuu tradicional', 30)">Añadir al carrito</button>
      </div>
      <div class="producto" data-id="2" data-nombre="Manilla tejida" data-precio="15">
        <img src="images/imagen9.jpg" alt="Manilla tejida">
        <p>Manilla color cielo - símbolo de esperanza y espiritualidad.</p>
        <button onclick="addToCart(2, 'Manilla tejida', 15)">Añadir al carrito</button>
      </div>
    </div>
  </section>

  <!-- Modal del carrito -->
  <div id="cartModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeCart()">&times;</span>
      <h2>Carrito de Compras</h2>
      <div id="cartItems"></div>
      <p>Total: $<span id="totalPrice">0</span></p>

      <!-- Formulario de compra -->
      <form id="purchaseForm" action="procesar_compra.php" method="POST">
        <label for="nombre_cliente">Nombre:</label>
        <input type="text" id="nombre_cliente" name="nombre_cliente" required>

        <label for="email_cliente">Correo electrónico:</label>
        <input type="email" id="email_cliente" name="email_cliente" required>

        <input type="hidden" id="productos" name="productos">
        <input type="hidden" id="total" name="total">

        <button type="submit">Finalizar Compra</button>
      </form>
    </div>
  </div>

  <footer>
    <p>¡Gracias por apoyar el arte y la cultura Wayuu!</p>
  </footer>

  <!-- Scripts -->
  <script src="script.js"></script>
</body>
</html>
