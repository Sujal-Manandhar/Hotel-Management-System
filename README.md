# Hotel Management System

Welcome to the **Hotel Management System**, a comprehensive, visually stunning, and highly functional web application designed to manage hotel bookings, user profiles, and administrative tasks. The project features a modern, premium "Glassmorphism" design aesthetic.

---

## 🛠️ Tools & Technologies Used

This project is built using a stack of reliable and widely-used web technologies:

- **Backend / Server-Side Logic:** PHP (Core PHP)
- **Database:** MySQL (Relational Database Management System)
- **Frontend / UI:**
  - HTML5 & CSS3
  - 🖼️ Custom CSS Variables (Dark theme, Glassmorphism effects)
  - ⚡ JavaScript & jQuery
  - 📱 Bootstrap 3.4 (For responsive grid layouts)
  - 🎨 FontAwesome 4.7 (Icon Type: `<i class="fa fa-..."></i>` for beautiful UI icons)
- **Local Development Environment:** XAMPP (Apache Web Server & MariaDB/MySQL)

---

## 🚀 How to Run the Project

Follow these steps to set up and run the project on your local machine:

### Prerequisites

1.  Download and install **XAMPP**.
2.  Start the **Apache** and **MySQL** modules from the XAMPP Control Panel.

### Setup Instructions

1.  **Project Location:** Ensure the project folder (`hotel`) is placed inside the XAMPP `htdocs` directory (e.g., `C:\xampp\htdocs\hotel`).
2.  **Database Configuration:**
    - Open your browser and navigate to `http://localhost/phpmyadmin`.
    - Create a new database named `hotel`.
    - Import the project's SQL file (if provided) to create the necessary tables (`create_account`, `rooms`, `room_booking_details`, etc.).
3.  **Run the Application:**
    - You can access the website by opening your browser and going to: `http://localhost/hotel/index.php`
    - _Alternatively_, if you are using PHP's built-in server for development, open your terminal in the `hotel` directory and run: `php -S localhost:8000`. Then go to `http://localhost:8000/`.

---

## 🔒 Security Features Implemented

Security is a priority in this application to protect user data and ensure smooth operation. We continuously audit the codebase against modern security standards:

- **Authentication & Password Hashing:** User passwords are encrypted using the robust `password_hash()` PHP function (BCRYPT algorithm) before being stored. No plain-text passwords are ever saved.
- **Authorization & Secure Sessions:** The system strictly manages active states using PHP Session variables. Role separation ensures users only have access to their own dashboards, and administrative areas are properly gated.
- **Injection Prevention:** Critical database transactions (like cancellations and profile updates) utilize **Prepared Statements** to strictly separate SQL logic from user input, preventing SQL Injection attacks.
- **XSS Protection:** User-generated output on dashboards is sanitized using `htmlspecialchars()` to prevent Cross-Site Scripting vulnerabilities.
- **Business Logic Security:** Cancellation workflows include strict boundary checks so users can only cancel their own legitimate bookings. Furthermore, canceling an order updates a safe `status` flag rather than hard-deleting the database row, preserving historical data integrity.

---

## 📖 User Guidance & Features

The system is divided into two main interfaces: the **Public/User View** and the **Admin Dashboard**.

### 1. For Guests / Users

- **Registration & Login:** Users can create an account and log in securely. The system uses secure session management.
- **Browsing Rooms:** Guests can view different room types (Standard, Twin Deluxe, Suite, etc.) via the Navigation Bar or Homepage.
- **Booking a Room:**
  - On any room page, users can fill out the "Reserve Your Stay" form (Check-In, Check-Out, Guests).
  - The booking form features modern UI elements with clear calendar pickers.
- **User Dashboard:**
  - **Profile:** Users can view and update their personal details, email, and securely change their password.
  - **Booking Status:** Under their name in the navigation bar, users can click "Booking Status" to see a history of their reservations. They can see if a booking is _Pending_, _Accepted_, or _Canceled_, and they have the ability to cancel pending bookings themselves.

### 2. For Administrators

- **Admin Login:** Admins can log in via the "Admin Login" link in the navigation bar using their specific credentials.
- **Dashboard Overview:** A sleek, glassmorphic dashboard provides a quick summary of Total Rooms, Total Bookings, Registered Users, and Feedbacks.
- **Booking Management (`Reservation Log`):**
  - Admins can view all bookings made by users.
  - Admins have the authority to **Accept** or **Cancel** pending bookings to manage hotel capacity.
- **Room Management:** Admins can add new rooms, update existing room details, or remove rooms.
- **Website Content:** Admins can update the homepage slider images and view user feedback directly from the dashboard.

---

## 🎨 Design System Highlights

- **Glassmorphism:** The UI utilizes translucent backgrounds (`backdrop-filter: blur()`) to create a frosted glass effect over beautiful imagery.
- **Luxury Palette:** The primary accent color is a rich gold (`#c5a059`) set against deep, dark backgrounds (`#0a0e17`) to evoke a sense of premium hospitality.
- **Responsiveness:** The site is fully mobile-responsive, meaning it works perfectly on desktop, tablet, and mobile devices.
