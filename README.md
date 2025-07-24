# Roundcube IMAP Session Decryptor

This PHP script decrypts stored IMAP session passwords from a Roundcube webmail database. It uses the encryption key found in the Roundcube configuration file to recover the original plaintext password.

---

## How It Works

Roundcube stores session passwords in a base64-encoded string in the database. This script takes the password from that session and decrypts it using the configured encryption key.

---

## Requirements

- PHP installed on your system (version 5.6+ recommended)

---

## Usage Instructions

### 1. Locate the Encrypted Session Password

Find the encrypted session password in your Roundcube database (stored in the `session` table).

### 2. Decode the Session Password

The password is stored in the base64 encoded session. Decode it using a tool of your choice, such as:

```bash
echo "<base64_sessionhere>" | base64 -d
```

### 3. Edit the Script
Open roundcubeimapdecryptor.php in a text editor and:

- Paste the decoded password into the appropriate variable.

- Paste the encryption key (usually found in config/config.inc.php as $config['des_key']) into the script.

### 4. Run the Script
```
php RoudcubeimapDecryptor.php
```

### 5. Output
The resulted output will present the decoded password.
