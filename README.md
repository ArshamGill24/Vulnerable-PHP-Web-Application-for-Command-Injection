## Vulnerable PHP Web Application for Command Injection

### Description

This project is a PHP-based web application deliberately designed to be vulnerable to command injection. It includes a login functionality with hardcoded credentials, displays system details, and allows for pinging a target machine, showcasing potential security vulnerabilities.

### Files

- **`login.php`**: Handles user authentication using hardcoded credentials.
- **`logout.php`**: Logs out the user by destroying the session.
- **`ping.php`**: Executes a ping command to check if a target machine is online; this is vulnerable to command injection.
- **`system_details.php`**: Displays system information like memory usage, disk usage, and top processes.

### How to Use

1. Open `login.php` in your browser to log in using one of the hardcoded credentials.
2. After logging in, you will be redirected to `system_details.php`, where you can view system information.
3. Navigate to `ping.php` to ping a target machine. Enter an IP address or hostname and submit the form to see the results.

### Security Considerations

- The application is intentionally designed to be vulnerable to command injection for educational purposes.
- User input on `ping.php` is not sanitized, making it susceptible to command injection attacks.
- System details are displayed without restrictions once authenticated, potentially disclosing sensitive information in a real-world scenario.

### Recommendations

- **Sanitize and Validate Input:** Always sanitize and validate user input to prevent injection attacks.
- **Secure Session Management:** Implement proper session management and use HTTPS to protect session data.
- **Avoid Hardcoded Credentials:** Instead of hardcoding credentials, use secure databases with prepared statements.
