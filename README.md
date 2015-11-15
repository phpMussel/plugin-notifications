## **What is phpMussel?**

An ideal solution for shared hosting environments, where it's often not possible to utilise or install conventional anti-virus protection solutions, phpMussel is a PHP script designed to **detect trojans, viruses, malware and other threats** within files uploaded to your system wherever the script is hooked, based on the signatures of [ClamAV](http://www.clamav.net/) and others.

## **What's this repository for?**

This repository, "phpMussel-plugin-notifications", is the repository for a phpMussel plugin that allows you to receive email notifications from phpMussel whenever a file upload is blocked (requires PHP "mail" function to be correctly configured).

The main repository: [phpMussel](https://github.com/Maikuolan/phpMussel).

This repository: [phpMussel-plugin-notifications](https://github.com/Maikuolan/phpMussel-plugin-notifications).

## **How to install?**

Add the following section to your `phpmussel.ini` file and edit accordingly:

```
[notifications]
; "to_addr" is the email address for sending notifications to.
to_addr='username@domain.tld'
; "from_addr" is the email address cited as the origin for all sent notifications.
from_addr='username@domain.tld'
```

Upload the "notifications" directory of this repository and all its contents to the "plugins" directory of your phpMussel installation (the "plugins" directory is a sub-directory of the "vault" directory).

That's everything! :-)

*This file, "README.md", last edited: 15th November 2015 (2015.11.15).*
