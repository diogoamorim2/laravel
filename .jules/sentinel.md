## 2024-05-23 - CSP Tightening
**Vulnerability:** The Content Security Policy (CSP) used a wildcard `https:` in `script-src`, allowing execution of scripts from any HTTPS domain. This weakens protection against XSS if an attacker can inject a script tag pointing to a malicious CDN or their own HTTPS server.
**Learning:** Default or example CSPs often use `https:` for convenience to support CDNs without listing them all. However, modern security requires whitelisting specific trusted domains.
**Prevention:** Avoid `https:` in `script-src`. Always list specific allowed domains (e.g., `https://www.google.com`) or use nonces/hashes. Periodically review and tighten CSP headers.

## 2024-05-24 - Honeypot Audit Logging
**Vulnerability:** While a honeypot field (`fax`) existed to reject spam submissions, these attempts were silently discarded (via validation error). This prevented visibility into the volume and source of automated attacks.
**Learning:** Security controls like honeypots or rate limits should not just block attacks but also log them. Without logs, we cannot analyze attack patterns or block persistent offenders at the network level.
**Prevention:** Implement explicit logging for security control failures (e.g., honeypot triggers, validation failures on critical fields). Use structured logging to capture context like IP and User-Agent.
