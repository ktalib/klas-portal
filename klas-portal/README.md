# Legal Search System

This project is a Legal Search System that allows users to search for legal records, process payments for accessing search results, and generate reports. The system integrates with Paystack for payment processing.

## Features

- Search for legal records by file number.
- Advanced search options for detailed queries.
- Payment processing through Paystack for a ₦10,000 fee.
- Generation of search reports with transaction history.
- User-friendly interface built with Blade templates.

## Project Structure

```
klas-portal
├── app
│   ├── Http
│   │   ├── Controllers
│   │   │   └── LegalSearchController.php
│   ├── Models
│       ├── LegalSearch.php
│       └── Payment.php
├── config
│   └── paystack.php
├── resources
│   ├── views
│   │   └── legal-search
│   │       ├── index.blade.php
│   │       ├── payment.blade.php
│   │       ├── results.blade.php
│   │       └── report.blade.php
├── routes
│   └── web.php
├── .env
├── composer.json
└── README.md
```

## Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   ```

2. Navigate to the project directory:
   ```
   cd klas-portal
   ```

3. Install dependencies using Composer:
   ```
   composer install
   ```

4. Set up your environment variables in the `.env` file. Make sure to include your Paystack API keys.

5. Run the migrations to set up the database:
   ```
   php artisan migrate
   ```

6. Start the local development server:
   ```
   php artisan serve
   ```

## Usage

- Navigate to `http://localhost:8000/legal-search` to access the legal search form.
- Enter the file number to search for legal records.
- If records are found, proceed to the payment page to process the ₦10,000 fee.
- After successful payment, you will be redirected to the search results page where you can view or download your report.

## License

This project is licensed under the MIT License. See the LICENSE file for details.