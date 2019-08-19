## **What is phpMussel?**

An ideal solution for shared hosting environments, where it's often not possible to utilise or install conventional anti-virus protection solutions, phpMussel is a PHP script designed to **detect trojans, viruses, malware and other threats** within files uploaded to your system wherever the script is hooked, based on the signatures of [ClamAV](https://www.clamav.net/) and others.

---


## **What's this repository for?**

This repository, "plugin-notifications", is the repository for a phpMussel plugin that allows you to receive email notifications from phpMussel whenever a file upload is blocked (requires PHP "mail" function to be correctly configured).

The core phpMussel repository: [phpMussel](https://github.com/phpMussel/phpMussel).

This repository: [plugin-notifications](https://github.com/phpMussel/plugin-notifications).

---


## **How to install?**

If you're installing it manually, add the following section to your configuration file (`config.ini`) and edit accordingly:

```
[notifications]
; "to_addr" is the email address for sending notifications to.
to_addr='username@domain.tld'
; "from_addr" is the email address cited as the origin for all sent notifications.
from_addr='username@domain.tld'
```

After that, you'll need to upload the "notifications" directory of this repository and all its contents to the "plugins" directory of your phpMussel installation.

Otherwise, if you're installing it via the front-end updates page, you can modify your configuration accordingly via the front-end configuration page (all necessary files will be installed automatically).

That's everything! :-)

---


Last Updated: 19 August 2019 (2019.08.19).
