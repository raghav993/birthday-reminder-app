# Birthday Reminder

A PHP project to remind users of birthdays.

## Structure

- `config/` - Configuration files
- `includes/` - Common includes
- `uploads/` - Uploaded member images
- `cron/` - Scheduled scripts
- `assets/` - CSS, JS, images

## Usage

1. Configure your database in `config/db.php`.
2. Set up mail settings in `config/mail.php`.
3. Import `database.sql` to your MySQL server.
4. Use `add-member.php` to add members.
5. The cron job in `cron/birthday_mailer.php` sends birthday emails.
