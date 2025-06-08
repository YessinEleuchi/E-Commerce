# YO-SHOP E-Commerce Platform

A modern and user-friendly e-commerce platform built with PHP and MySQL, featuring a responsive design and essential e-commerce functionalities.

## 🌟 Features

- **User Authentication**
  - User registration and login system
  - Admin authentication
  - Secure session management

- **Product Management**
  - Product browsing and searching
  - Product categorization
  - Detailed product views
  - Product images display

- **Shopping Experience**
  - Shopping cart functionality
  - Wishlist feature
  - Quick view product details
  - Responsive product grid

- **Admin Panel**
  - Product management
  - User management
  - Category management
  - Order management

## 🛠️ Technical Stack

- **Frontend**
  - HTML5
  - CSS3
  - JavaScript
  - Bootstrap
  - jQuery
  - Font Awesome
  - Slick Slider
  - NoUiSlider

- **Backend**
  - PHP
  - MySQL
  - Session Management

## 📁 Project Structure

```
E-Commerce/
├── admin/           # Admin panel files
├── css/            # Main stylesheets
├── css1/           # Additional styles
├── fonts/          # Font files
├── img/            # Product and UI images
├── includ/         # PHP includes and functions
├── index.php       # Main landing page
├── produit.php     # Product details page
├── connexion.php   # Login page
├── registre.php    # Registration page
├── profile.php     # User profile page
└── deconnexion.php # Logout functionality
```

## 🚀 Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/YessinEleuchi/E-Commerce.git
   ```

2. Set up the database:
   - Create a MySQL database named `ecommerce`
   - Import the database schema (if provided)

3. Configure the database connection:
   - Open `includ/functions.php`
   - Update the database credentials:
     ```php
     $servername = "localhost";
     $username = "your_username";
     $password = "your_password";
     $database = "ecommerce";
     ```

4. Set up a local server:
   - Use XAMPP, WAMP, or any PHP-compatible server
   - Place the project in the server's root directory

5. Access the website:
   - Open your browser
   - Navigate to `http://localhost/E-Commerce`

## 🔒 Security Features

- Password hashing
- SQL injection prevention
- Session management
- Input validation and sanitization

## 🎨 UI/UX Features

- Responsive design
- Modern and clean interface
- Product image zoom
- Smooth animations
- User-friendly navigation
- Mobile-friendly layout

## 👥 User Roles

1. **Visitors**
   - Browse products
   - View product details
   - Register/Login

2. **Registered Users**
   - All visitor features
   - Add to cart
   - Add to wishlist
   - Manage profile

3. **Administrators**
   - All user features
   - Manage products
   - Manage categories
   - Manage users
   - View orders

## 🔄 Database Structure

The database includes the following main tables:
- `visiteur` - User information
- `produit` - Product details
- `categorie` - Product categories
- `administarteur` - Admin accounts

## 📝 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 👨‍💻 Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request

## 📧 Support

For support, please contact yessineleuchi.embedded@gmail.com
