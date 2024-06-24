body {
  font-family: Arial, sans-serif;
  background-color: #f8f9fa;
  color: #333;
  background-image: url('../images/fondo_admin.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 100vh;
}

.container {
  width: 80%;
  margin: 0 auto;
  background-color: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente para el contenido */
  padding: 20px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
  border-radius: 10px; /* Bordes redondeados */
}

h1 {
  text-align: center;
  color: #dc3545;
}

/* Center navigation menu items horizontally using Flexbox */
nav ul {
  list-style: none;
  padding: 0;
  display: flex; /* Enable Flexbox layout */
  justify-content: center; /* Center items horizontally */
  align-items: center; /* Vertically align items within container (optional) */
}

/* Remove inline styles to avoid overriding Flexbox rules */
nav ul li {
  display: inline-block; /* Change to inline-block for better spacing */
  /* margin-right: 20px; Removed to use Flexbox spacing */
}

nav ul li a {
  text-decoration: none;
  color: #007bff;
  border: 1px solid #007bff;
  padding: 5px 10px;
  border-radius: 5px;
}

nav ul li a:hover {
  background-color: #007bff;
  color: #fff;
}

form label {
  display: block;
  margin-top: 10px;
}

form input[type="text"], form input[type="file"] {
  width: 100%;
  padding: 8px;
  margin-top: 5px;
}

form input[type="submit"] {
  margin-top: 20px;
  padding: 10px 15px;
  background-color: #28a745;
  color: #fff;
  border: none;
  border-radius: 5px;
}

form input[type="submit"]:hover {
  background-color: #218838;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

table, th, td {
  border: 1px solid #dee2e6;
}

th, td {
  padding: 10px;
  text-align: left;
}

th {
  background-color: #e9ecef;
}

/* Estilos adicionales para la confirmación del pedido */
.confirm-container {
  background-color: rgba(255, 255, 255, 0.9);
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
  margin: 20px auto;
  width: 50%;
  text-align: center;
}

.confirm-container h2 {
  color: #333;
}

.confirm-container p {
  color: #555;
}

.confirm-container ul {
  list-style-type: none;
  padding: 0;
}

.confirm-container ul li {
  background-color: #f9f9f9;
  margin: 5px 0;
  padding: 10px;
  border-radius: 5px;
}

.confirm-form {
  margin-top: 20px;
}

.confirm-form input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

.confirm-form input[type="submit"]:hover {
  background-color: #0056b3;
}

.message {
  margin: 20px 0;
  padding: 10px;
  border-radius: 5px;
  text-align: center;
}

.message.success {
  background-color: #d4edda;
  color: #155724;
}

.message.error {
  background-color: #f8d7da;
  color: #721c24;
}
