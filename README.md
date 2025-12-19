# Support Tracker System (Laravel)

## Project Overview
This is a Laravel-based system developed to track the daily activities of an application
support team. The system enables activity creation, status updates with remarks, and
provides clear handover visibility between personnel.

## Key Features
- User authentication (Laravel Auth)
- Activity creation and daily tracking
- Status updates (Pending / In Progress / Done)
- Remarks captured per update
- Timestamped updates for shift handover
- Reporting by custom date ranges

## Bio Details Capture
Each activity update records:
- The user who made the update
- The update timestamp
This enables accountability and clear operational handover.

## Technology Stack
- Laravel 12
- PHP 8.2
- MySQL
- Bootstrap 5

## Setup Instructions
1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env`
4. Configure database credentials
5. Run `php artisan migrate`
6. Run `php artisan serve`

## Notes
- New users default to the role `staff`
- Admin role can be assigned manually
- The system is designed for internal support operations

## Author
Evlin Devalor Bengba-madozin
