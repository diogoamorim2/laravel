## 2024-05-18 - Prevent TypeError DoS with query parameters

**Vulnerability:** Array Payload Denial of Service (TypeError)
**Learning:** Using `request()->input('page')` directly in math operations can trigger an unhandled `TypeError` (resulting in a 500 server error) if an attacker passes an array payload like `?page[]=1`, because PHP 8+ throws an exception for array/int arithmetic.
**Prevention:** Always explicitly cast query parameters used in math operations to an integer (e.g., `(int) request()->input('page', 1)`) or validate input strictly using FormRequests before processing.
