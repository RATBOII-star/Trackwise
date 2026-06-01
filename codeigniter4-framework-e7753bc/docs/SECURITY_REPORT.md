# TRACKWISE Security Report

## Cross-Site Request Forgery (CSRF)

CSRF attacks trick a logged-in user’s browser into submitting unwanted requests (for example, changing a password or posting data) to a site where they are already authenticated. The attacker does not need the victim’s password; they only need the victim to visit a malicious page while a session cookie is active.

### Countermeasures implemented

1. **Global CSRF filter** — Enabled in `app/Config/Filters.php` under `$globals['before']` using the `csrf` alias. Every `POST`, `PUT`, `PATCH`, and `DELETE` request is checked unless excluded.
2. **`csrf_field()` on forms** — All TRACKWISE POST forms (login, register, study log save, security demo, forgot password reset) include `<?= csrf_field() ?>`, which outputs a hidden input with a token tied to the user session.
3. **403 demonstration** — The Security page (`/trackwise/security`) includes a form that submits without a token; CodeIgniter responds with **403 Forbidden**, proving the filter blocks forged requests.
4. **How the token helps** — The server stores a secret hash in the session and expects the same value in the POST body. External sites cannot read that value because of the same-origin policy, so forged requests lack a valid token and are rejected.

## Cross-Site Scripting (XSS)

XSS occurs when untrusted input is echoed back in HTML without encoding, allowing attackers to inject `<script>` tags or event handlers. **Stored XSS** persists malicious content in the database (for example, in study session notes) and executes for every user who views the page.

### Countermeasures implemented

1. **`esc($variable, 'html')` on output** — Study log notes, topics, flash messages, and security demo output use `esc()` so characters like `<` and `>` are converted to entities and cannot run as script.
2. **Invalid Characters filter** — The `invalidchars` filter is enabled globally in `Filters.php` to reject dangerous character sequences in incoming requests before they reach controllers.
3. **Stored XSS demonstration** — On `/trackwise/security`, submitting `<script>alert(1)</script>` shows a “before” (raw string in a code block) vs “after” (escaped output) comparison. The escaped version displays as text and does not execute JavaScript.
4. **Secure headers** — The `secureheaders` filter runs after responses to add browser hardening headers.

## Related application security

- **File uploads** — Study log images are validated for MIME type and size (max 2MB), renamed with `getRandomName()`, and stored under `writable/uploads/`, served only through `Trackwise\Uploads::image()` after login check.
- **Passwords** — Registration stores a single bcrypt hash via `UserModel::hashPassword` (fixed double-hashing bug that previously broke login).
- **Sessions** — Login sets `isLoggedIn` and `userId`; protected controllers redirect unauthenticated users to the login page.

## Conclusion

TRACKWISE demonstrates defense in depth: CSRF tokens for state-changing requests, output encoding for XSS, input filtering, and secure file handling. Together these align with CodeIgniter 4 best practices for production-ready web applications.
