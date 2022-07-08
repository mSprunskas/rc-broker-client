# RC Broker Client
Script for communication with [https://ws.registrucentras.lt/broker/](https://ws.registrucentras.lt/broker/) API.

## Usage
- Modify `index.php` to your needs
- Run `php index.php`

## Key generation
- Modify `keys/csrf.conf` file as fits
- `cd keys`
- `openssl genrsa -out private.pem 2048`
- `openssl req -new -x509 -days 1000 -nodes -sha256 -key private.pem -config csr.conf > certificate.pem`
