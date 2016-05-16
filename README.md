# SMS-Gateway-Interface
This is a web based interface class between a WIN plc SMS Gateway Server and PHP. 

If you have access to an SMS Gateway with credentials from a supplier such as IMImobile/WIN plc, you can use this PHP interface class to craft XML url encoded post data to send your text messages.

## Usage

The PHP file called SMS.php contains the class `SMSGateway` which takes four parameters when initialising.

Url, Username, Password, and From.

* **Url** - The SMS gateway API address.
* **Username** - Your username to authenticate your Gateway Login.
* **Password** - Your password to authenticate your Gateway Login.
* **From** - The display name you wish the sent message to display from. From testing, I have found this needs to be one word.
e.g. `Bespoke`