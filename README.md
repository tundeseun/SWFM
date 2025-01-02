<<<<<<< HEAD
# Version 1.1 - 07-04-2021

-   Updated : bug Fixed in backup
-   Added : Support IE

# Version 1.2 - 08-04-2021

-   Added : Footer Dynamic
-   Added : Instruction Installation In Localhost
-   Updated : Changing the Database Structure
-   Updated : bug Fixed in dark mode
-   Updated : bug Fixed in Edit Payment

# Version 1.3 - 10-04-2021

-   Updated : Improve Code
-   Updated : Improve security

# Version 1.4 - 12-04-2021

-   Added : Updated Guide
-   Updated : Fixed dropdown in purchases
-   Updated : Fixed Import Products by csv

# Version 2.0

-   Updated : Improve security
-   Added : Integration Payment Gateway ( Stripe)
-   Updated : Upgrade to laravel 8 (Support php 8)
-   Updated : The new minimum PHP version is now 7.3.0.
-   Added : Filter By Date for all reports

# Version 2.1.0 - 22-04-2021

-   Updated : Improve security
-   Updated : Fix bug Duplicate User & Customer & Product Code

# Version 2.2.0 - 02-05-2021

-   Added : SMS API (Twilio)
-   Added : Footer Dynamic
-   Updated : Fix bug in Password Database
-   Updated : Fix bug in Stock Alert

# Version 2.3.0 - 18-05-2021

-   Added : Default Customer & Warehouse in POS
-   Updated : Fix bug in editing Variants Product

# Version 2.4.0 - 02-06-2021

-   Added : Add Sale Date in invoice
-   Updated :  Fix Duplicated product in import
-   Updated :  Fix Minor bugs

# Version 2.5.0 - 08-06-2021

-   Updated :  Fix POS Receipt Printer

# Version 3.0.0 - 25-06-2021

-   Added  :  Barcode Scanner in POS
-   Updated :  Fix bug in Import Product
-   Updated :  Fix bug in download file
-   Updated :  Updated Iconsmind

# Version 3.1.0 - 28-06-2021

-   Updated :  Minor bug fixes

# Version 3.2.0 - 30-06-2021

-   Updated : Fix bug in download pdf (Support php 8)
-   Added  : Clearing cache with a click of a button
-   Updated : Fix bug in Import Product (without create warehouse)
-   Updated : Change currency symbol from the right to the left
-   Added  : Video in documentation showing you the steps on how to upgrade stocky
-   Updated : Minor bug fixes

# Version 3.3.0 - 06-07-2021

-   Added  :  Add the ability to enter the BarCode manually
-   Added  :  Barcode Scanner (All Operations)
-   Updated :  Fix bug in barcode printing
-   Added  :  Paper Size for printing barcode labels
-   Updated :  Correct some words in Spanish translation
-   Updated :  Fix bug in Editing Variants
-   Updated :  Fix bug in generate backup
-   Updated :  Improve security
-   Updated :  Documentation Updated
-   Updated :  Minor bug fixes

# Version 3.3.1 - 06-07-2021

-   Fixed  :  Fix bug in pos

# Version 3.3.2 - 12-07-2021

-   Fixed  :  bug in pos
-   Fixed  :  Design & Size receipt pos for thermal receipt printer
-   Fixed  :  Currency symbol Dynamic in input fields
-   Fixed  :  Bug Duplicate save data when click more than one times

# Version 3.4.0 - 29-07-2021

-   Added    :  Server requirements in Installation
-   Added    :  Automatically increase quantity in POS when scanning items
-   Added    :  option to choose unit when create Transaction
-   Added    :  Paid Amount & due Amount in pos receipt
-   Fixed    :  Show Items in dashboard with permissions
-   Fixed    :  if Transaction deleted the stock return to previous status
-   Fixed    :  Profit Calculation based by (price & cost)
-   Fixed    :  Report Profit And Loss
-   Fixed    :  Bug in editing Transaction 
-   Fixed    :  Bug in Units
-   Updated  :  Improve security
-   Updated  :  Documentation Updated

# Version 3.5.0 - 02-08-2021

-   Added    :  Cost of goods sold formula implemented to calculate profit
-   Added    :  received & paying Amount & change
-   Fixed    :  bug in calculate Due Amount
-   Fixed    :  migration database
-   Fixed    :  Minor bug fixes
-   Updated  :  pos receipt

# Version 3.6.0 - 08-08-2021

-   Fixed    :  Minor bug fixes
-   Updated  :  Documentation Updated

# Version 3.7.0 - 26-09-2021

-   Added    :  Choose default language from area settings
-   Added    :  Pos Settings
-   Fixed    :  bug in twillio SMS
-   Updated  :  Hide Documentation from sidebar
-   Updated  :  Improve performance
-   Updated  :  Documentation Updated
-   Fixed    :  bug fixes


# Version 3.8.0 - 28-10-2021

-   Updated  :  Report profit
-   Updated  :  Update stock without purchase product
-   Fixed    :  Bug fixes

# Version 3.9.0 - 01-01-2022

- Added    :  Add Korean language
- Added    :  Add Paid Amount & Due on pdf
- Added    :  Add Note on Detail transaction
- Fixed    :  Search box fixed
- Fixed    :  Bug fixes

# Version 4.0.0 - 11-04-2022

+ Added ability to assign warehouses to users
+ Added Module HRM
+ Added multi reports
+ Added Date Range in all reports
+ Update all the Node.js dependencies to their latest version
+ Documentation Updated
+ Fix issue in search box not working properly on mobile
+ Fix Print CSS
+ Make fields optional for Customers & Providers
+ Fixed npm install
+ Small Bug fixes

# Version 4.0.1

+ Added Warranty Management (IMEI & SERIAL NUMBERS)
+ Added Delivery Management
+ Added ability to assign warehouses to users
+ Added Users Report
+ Added Stock Report
+ Added Due Report to Customers
+ Added Due Report to Suppliers
+ Added Export PDF to all reports
+ Small Bug fixes

# Version 4.0.2

+ Added    : Pay all due from the customer list in one payment
+ Added    : option product not for selling
+ Added    : Nexmo (Vonage now) SMS Gateway
+ Added    : bengali language 
+ Added    : Notification for new update
+ Added    : Select Timezone in settings
+ Added    : more setting pages
+ Added    : invoice footer
+ Added    : Permission to Dashboard
+ Added    : shipping fees in pos receipt
+ Updated  : Sale return will be according to Sale reference.
+ Updated  : Purchase return will be according to Purchase reference.
+ Updated  : Renamed all routes api
+ Updated  : documentation Updated
+ Fixed    : Mail settings issue
+ Fixed    : Bug fixed when you make a payment
+ Fixed    : only admin or user who has permission "system_setting" he can upgrade the system
+ Fixed    : bug fixes

# Version 4.0.3

+ Add sum of Amount in reports
+ Add clean-webpack-plugin
+ Some bugs Fixed

# Version 4.0.4

+ Pay all sell return due from the customer list in one payment
+ Pay all Supplier due from the Supplier list in one payment
+ Pay all Purchase return due from the Supplier list in one payment
+ Fix bug in  Purchase & sale return
+ Add Brazilian Portuguese Language
+ Add Tax Number for Customers & Suppliers
+ Add Total revenue (sales - sales return)
+ Documentation Updated
+ Some bugs Fixed

# Version 4.0.5

+ Added  :  Profit Net using (FIFO METHOD)
+ Added  :  Profit Net using (Average Cost)
+ Added  :  Product report
+ Added  :  Product Sell report
+ Added  :  Product Purchase report
+ Added  :  Filter by warehouse in reports & dashboard
+ Added  :  Enable/Disable Print Invoice automatically
+ Fixed  :  Arabic language in PDF
+ Fixed  :  bug in twillio SMS
+ Fixed  :  print pos receipt
+ Some bugs Fixed

# Version 4.0.6

+ Fixed issue in Stripe
+ Showing the credit card saved for the client
+ Choose the default credit card for the client
+ Added Price & cost & code to Variants
+ Added Auto Generate barcode 
+ Added New SMS Gateway InfoBip
+ Added Custom Templates for SMS
+ Added Custom Templates for Email
+ Added Danish Language
+ Added Price in barcode printing
+ Added an option to choose if you want make a quotation 
  with items has no stock or has stock
+ Added more Permissions
+ Added logo in receipt POS
+ Added warehouse in receipt POS
+ Fixed bug in assign warehouses to users
+ Fixed bug in Import products
+ Some bugs Fixed

# Version 4.0.7

+ Enhanced support for add-ons
+ Added Feature "Accounting Module"
+ Added Feature "Deposits"
+ Added Feature "Transfer Money"
+ Added Feature "Payroll"
+ Added Feature "Sales draft"
+ Added Report Inventory Valuation Summary
+ Added Expenses Report
+ Added Deposits Report
+ Added Feature "Count Stock"
+ Updated Documentation
+ Resolved several bugs


# Version 4.0.8 Release Notes
1) New Features

+ Updated the application to Laravel 10.
+ Camera Scanner: Now available for all transactions.
+ Enhanced support for add-ons
+ Multiple Barcode Printing: Print several barcodes simultaneously.
+ Added the ability to print barcodes one by one for the stickers
+ Added Option to Sshow/Hide Price in Barcode Labels
+ Combo Product: Added the ability to create combo products.
+ Project & Task Management: New tools for managing projects and tasks.
+ More Filters in all reports
+ Filter by date in Dashboard
+ Search bar in categories & brands in POS
+ Send the Notifications with WhatsApp
+ Added a total at the bottom for all PDF exports.
+ Added a total at the bottom of Tables in Reports.
+ Added an option to show/hide the language.
+ Added an option to change the number of items displayed in the POS.
+ Import Purchases with file excel
+ Added Today's Sales in POS


2) Bug Fixes and Improvements

+ Stocky now requires PHP 8.1.0 or greater.
+ Updated some packages in Vue.js.
+ Fixed the issue with exclusive tax calculations for products.
+ Updated the documentation for better clarity.
+ Resolved several other bugs to improve performance and stability.
=======
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
>>>>>>> tundeseun/devtest
